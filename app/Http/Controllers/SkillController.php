<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use Orion\Http\Controllers\Controller;

class SkillController extends Controller
{
    protected $model = Skill::class;
}
