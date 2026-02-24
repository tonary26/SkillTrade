<?php

namespace App\Http\Controllers\Api\V1\Exchange;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ExchangeService;

class BaseController extends Controller
{
    public $service;

    public function __construct(ExchangeService $service)
    {
        $this->service = $service;
    }
}
