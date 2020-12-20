<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use App\Models\User;
use Orion\Concerns\DisableAuthorization;

class UserRolesController extends RelationController
{
    use DisableAuthorization;

    protected $model = User::class;

    protected $relation = 'roles';
}
