<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Profile\ProfileEditController;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user()->load('skills');

        return response()->json([
            'user' => $user
        ]);
    }

    public function update(User $user, ProfileEditController $request)
    {
        $data = $request->validated();
        $user->update($data);

        return response()->json([
            'user' => $user
        ]);
    }
}
