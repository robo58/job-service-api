<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use App\Models\User;
use Orion\Concerns\DisableAuthorization;

class UserRolesController extends RelationController
{
    use DisableAuthorization;

    /**
     * The relations that are allowed to be included together with a resource.
     *
     * @return array
     */
    public function includes() : array
    {
        return ['users'];
    }

    protected $model = User::class;

    protected $relation = 'roles';
}
