<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use Orion\Concerns\DisableAuthorization;

use App\Models\Job;

class JobRecruiterController extends RelationController
{
    use DisableAuthorization;

    /**
     * The relations that are allowed to be included together with a resource.
     *
     * @return array
     */
    public function includes() : array
    {
        return ['recruiterJobs', 'finished_jobs', 'recruiterReviews'];
    }

    protected $model = Job::class;

    protected $relation = 'recruiter';
}
