<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use App\Models\Review;

class ReviewController extends Controller
{
    protected $model = Review::class;
}
