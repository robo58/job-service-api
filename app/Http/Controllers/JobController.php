<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;
use App\Models\Job;

class JobController extends Controller
{
    use DisableAuthorization;

    /**
     * The relations that are allowed to be included together with a resource.
     *
     * @return array
     */
    public function includes(): array
    {
        return ['skills', 'employee', 'recruiter', 'applications'];
    }

    public function filterableBy(): array
    {
        return ['id', 'skills', 'recruiter.id', 'employee.id', 'created_at'];
    }

    public function importFromXml()
    {
        $xml_object = simplexml_load_file('D:\projects\faks\job-service-api\app\Http\Controllers\jobs.xml');
        $objects = [];
        foreach ($xml_object as $LDAPzapis) {
            $xml_array = [];
            foreach ($LDAPzapis as $attribute) {
                $attrs = (array)$attribute;
                if (array_key_exists($attrs['@attributes']['name'], $xml_array)) {
                    $old = $xml_array[$attrs['@attributes']['name']];
                    if (is_array($old)) {
                        $xml_array[$attrs['@attributes']['name']][] = $attrs[0];
                    } else {
                        unset($xml_array[$attrs['@attributes']['name']]);
                        $xml_array += [$attrs['@attributes']['name'] => array($old, $attrs[0])];
                    }
                }
                $xml_array += [$attrs['@attributes']['name'] => $attrs[0]];
            }
            $objects[] = $this->createModelFromArray(Job::class, $xml_array, Job::$relationships, Job::$keys);
        }
        return $objects;
    }

    public function createModelFromArray($class, $array, $relations = [], $keys = [])
    {
        $obj = new $class();
        $attachments = [];
//    if keys are equal to properties
        if (count($keys) == 0) {
            foreach ($array as $key => $value) {
                //  check if key ends in _id, then its a foreign key
                if (isset($relations[$key])) {
                    $result = $this->manageRelations($key, $value, $relations);
                    if ($result[0] != 'success')
                        return 'error';
                    if (is_array($result[1])) {
                        $attachments[] = [$key => $result[1]];
                    } else {
                        $obj[$key] = $result[1];
                    }
                    //  else the key is not a foreign key, just set the value
                } else {
                    $obj[$key] = $value;
                }
            }
//  if keys are different from properties
        } else {
            foreach ($array as $key => $value) {
                //  check if key ends in _id, then its a foreign key
                if (isset($relations[$keys[$key]])) {
                    $result = $this->manageRelations($keys[$key], $value, $relations);
                    if ($result[0] != 'success')
                        return 'error';
                    if (is_array($result[1])) {
                        $attachments[] = [$keys[$key] => $result[1]];
                    } else {
                        $obj[$keys[$key]] = $result[1];
                    }
                    //  else the key is not a foreign key, just set the value
                } else {
                    $obj[$keys[$key]] = $value;
                }
            }
        }

        $obj->save();

        foreach ($attachments as $attachment) {
            foreach ($attachment as $key => $value) {
                $obj->$key()->attach($value);
            }
        }

        return $obj;
    }

    public function manageRelations($key, $value, $relations): array
    {
        $relation = $relations[$key][0];
        $relationCol = $relations[$key][1];

        $values = (array)$value;
        $ids = [];
        foreach ($values as $value) {
            $relationObj = $relation::firstOrCreate(
                [$relationCol => $value]
            );
            $ids[] = $relationObj->id;
        }
        //    one to many
        if (preg_match('/_id/i', $key)) {
            return ['success', $ids[0]];
            // many to many
        } else {
            return ['success', $ids];
        }
    }


    protected $model = Job::class;
}
