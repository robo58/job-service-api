<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use App\Models\Job;
use Orion\Concerns\DisableAuthorization;

class JobApplicationsController extends RelationController
{
    use DisableAuthorization;

    /**
     * The relations that are allowed to be included together with a resource.
     *
     * @return array
     */
    public function includes() : array
    {
        return ['skills', 'roles', 'userReviews', 'userJobs', 'active_jobs','finished_jobs', 'applications'];
    }

    protected $model = Job::class;

    protected $relation = 'applications';
}
