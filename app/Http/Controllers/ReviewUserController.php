<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use Orion\Concerns\DisableAuthorization;

use App\Models\Review;

class ReviewUserController extends RelationController
{
    use DisableAuthorization;

    protected $model = Review::class;

    protected $relation = 'user';
}
