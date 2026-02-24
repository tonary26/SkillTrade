<?php

namespace App\Services;

use App\Models\Exchange;
use Auth;

class ExchangeService
{
    public function index()
    {
        $exchanges = Exchange::all();

        return $exchanges;
    }

    public function store($data)
    {
        $exchange = Exchange::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $data['receiver_id'],
            'skill_id' => $data['skill_id'],
            'status' => 'pending'
        ]);

        return $exchange;
    }


    public function destroy($exchange)
    {
        return $exchange->delete();
    }
}
