<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use Orion\Concerns\DisableAuthorization;

use App\Models\User;

class RecruiterReviewsController extends RelationController
{
    use DisableAuthorization;

    /**
     * The relations that are allowed to be included together with a resource.
     *
     * @return array
     */
    public function includes() : array
    {
        return ['recruiter', 'user'];
    }

    protected $model = User::class;

    protected $relation = 'recruiterReviews';
}
