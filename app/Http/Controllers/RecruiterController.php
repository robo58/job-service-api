<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use App\Models\Recruiter;

class RecruiterController extends Controller
{
    protected $model = Recruiter::class;
}
