<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use App\Models\Job;

class JobRecruiterController extends RelationController
{
    protected $model = Job::class;

    protected $relation = 'recruiter';
}
