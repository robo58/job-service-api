<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use App\Models\Recruiter;

class RecruiterUserController extends RelationController
{
    protected $model = Recruiter::class;

    protected $relation = 'user';
}
