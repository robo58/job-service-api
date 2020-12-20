<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class SkillController extends Controller
{
    use DisableAuthorization;

    protected $model = Skill::class;
}
