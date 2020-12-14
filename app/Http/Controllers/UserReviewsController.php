<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use App\Models\User;

class UserReviewsController extends RelationController
{
    protected $model = User::class;

    protected $relation = 'reviews';
}
