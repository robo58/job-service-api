<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use Orion\Concerns\DisableAuthorization;

use App\Models\Review;

class ReviewUserController extends RelationController
{
    use DisableAuthorization;

    /**
     * The relations that are allowed to be included together with a resource.
     *
     * @return array
     */
    public function includes() : array
    {
        return ['skills', 'roles', 'userReviews', 'userJobs', 'active_jobs','finished_jobs', 'applications'];
    }

    protected $model = Review::class;

    protected $relation = 'user';
}
