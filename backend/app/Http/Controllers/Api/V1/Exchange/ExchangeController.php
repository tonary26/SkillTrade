<?php

namespace App\Http\Controllers\Api\V1\Exchange;

use App\Http\Resources\ExchangeResource;
use Illuminate\Http\Request;
use App\Models\Exchange;
use App\Http\Requests\Exchange\ExchangeStoreRequest;
use App\Http\Requests\Exchange\ExchangeUpdateRequest;

class ExchangeController extends BaseController
{
    public function index()
    {
        $exchanges = $this->service->index();

        return ExchangeResource::collection($exchanges);
    }

    public function store(ExchangeStoreRequest $request)
    {
        $data = $request->validated();
        $exchange = $this->service->store($data);

        return new ExchangeResource($exchange);
    }

    public function destroy(Exchange $exchange)
    {
        $this->service->destroy($exchange);

        return response()->json([
            'message' => 'Exchange deleted.'
        ]);
    }
}
