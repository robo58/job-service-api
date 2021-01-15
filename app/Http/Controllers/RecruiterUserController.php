<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use Orion\Concerns\DisableAuthorization;

use App\Models\Recruiter;

class RecruiterUserController extends RelationController
{
    use DisableAuthorization;

    /**
     * The relations that are allowed to be included together with a resource.
     *
     * @return array
     */
    protected function includes() : array
    {
        return ['skills', 'roles', 'recruiter', 'reviews', 'jobs', 'active_jobs','finished_jobs'];
    }

    protected $model = Recruiter::class;

    protected $relation = 'user';
}
