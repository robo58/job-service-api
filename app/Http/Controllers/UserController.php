<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class UserController extends Controller
{
    use DisableAuthorization;

    /**
     * The relations that are allowed to be included together with a resource.
     *
     * @return array
     */
    protected function includes() : array
    {
        return ['skills', 'roles', 'userReviews', 'userJobs', 'active_jobs','finished_jobs'];
    }

    protected $model = User::class;
}
