<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;

class RoleController extends Controller
{
    protected $model = Role::class;
}
