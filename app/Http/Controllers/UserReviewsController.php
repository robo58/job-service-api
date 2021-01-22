<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use App\Models\User;
use Orion\Concerns\DisableAuthorization;

class UserReviewsController extends RelationController
{
    use DisableAuthorization;

    /**
     * The relations that are allowed to be included together with a resource.
     *
     * @return array
     */
    protected function includes() : array
    {
        return ['recruiter', 'user'];
    }

    protected $model = User::class;

    protected $relation = 'userReviews';
}
