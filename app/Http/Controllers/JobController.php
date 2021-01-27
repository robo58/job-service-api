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
    protected function includes() : array
    {
        return ['skills', 'employee', 'recruiter', 'applications'];
    }

    protected function filterableBy() : array
    {
        return ['id', 'skills', 'recruiter.id', 'employee.id', 'created_at'];
    }

    protected $model = Job::class;
}
