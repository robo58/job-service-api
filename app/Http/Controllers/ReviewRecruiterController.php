<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use Orion\Concerns\DisableAuthorization;

use App\Models\Review;

class ReviewRecruiterController extends RelationController
{
    use DisableAuthorization;

    /**
     * The relations that are allowed to be included together with a resource.
     *
     * @return array
     */
    protected function includes() : array
    {
        return ['recruiterJobs', 'finished_jobs', 'recruiterReviews'];
    }

    protected $model = Review::class;

    protected $relation = 'recruiter';
}
