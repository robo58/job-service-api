<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use App\Models\Job;

class JobSkillsController extends RelationController
{
    protected $model = Job::class;

    protected $relation = 'skills';
}
