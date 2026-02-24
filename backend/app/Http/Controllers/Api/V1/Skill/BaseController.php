<?php

namespace App\Http\Controllers\Api\V1\Skill;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SkillService;

class BaseController extends Controller
{
    public $service;

    public function __construct(SkillService $service)
    {
        $this->service = $service;
    }
}
