<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use App\Models\User;

class UserJobsController extends RelationController
{
    protected $model = User::class;

    protected $relation = 'jobs';
}
