<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use Orion\Concerns\DisableAuthorization;

use App\Models\User;

class RecruiterJobsController extends RelationController
{
    use DisableAuthorization;

    /**
     * The relations that are allowed to be included together with a resource.
     *
     * @return array
     */
    public function includes() : array
    {
        return ['skills', 'employee', 'recruiter', 'applications'];
    }

    protected $model = User::class;

    protected $relation = 'recruiterJobs';
}
