<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class SkillController extends Controller
{
    use DisableAuthorization;

    /**
     * The relations that are allowed to be included together with a resource.
     *
     * @return array
     */
    public function includes() : array
    {
        return ['users', 'jobs'];
    }

    protected $model = Skill::class;
}
