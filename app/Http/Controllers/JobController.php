<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;
use App\Models\Job;

class JobController extends Controller
{
    use DisableAuthorization;
    protected $model = Job::class;
}
