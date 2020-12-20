<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

use App\Models\Recruiter;

class RecruiterController extends Controller
{
    use DisableAuthorization;

    protected $model = Recruiter::class;
}
