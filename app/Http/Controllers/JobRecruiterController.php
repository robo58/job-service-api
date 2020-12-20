<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use Orion\Concerns\DisableAuthorization;

use App\Models\Job;

class JobRecruiterController extends RelationController
{
    use DisableAuthorization;

    protected $model = Job::class;

    protected $relation = 'recruiter';
}
