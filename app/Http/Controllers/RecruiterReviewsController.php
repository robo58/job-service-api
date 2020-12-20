<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use Orion\Concerns\DisableAuthorization;

use App\Models\Recruiter;

class RecruiterReviewsController extends RelationController
{
    use DisableAuthorization;

    protected $model = Recruiter::class;

    protected $relation = 'reviews';
}
