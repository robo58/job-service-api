<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use App\Models\Review;

class ReviewUserController extends RelationController
{
    protected $model = Review::class;

    protected $relation = 'user';
}
