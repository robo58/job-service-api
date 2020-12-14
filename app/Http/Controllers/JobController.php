<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use App\Models\Job;

class JobController extends Controller
{
    protected $model = Job::class;
}
