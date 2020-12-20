<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

use App\Models\Review;

class ReviewController extends Controller
{
    use DisableAuthorization;

    protected $model = Review::class;
}
