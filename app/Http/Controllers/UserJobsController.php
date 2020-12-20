<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use App\Models\User;
use Orion\Concerns\DisableAuthorization;

class UserJobsController extends RelationController
{
    use DisableAuthorization;

    protected $model = User::class;

    protected $relation = 'jobs';
}
