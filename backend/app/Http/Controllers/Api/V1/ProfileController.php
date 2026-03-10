<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileEditController;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

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

    public function search(Request $request)
    {
        $query = $request->query('query');

        $users = User::query()
            ->with('skills')
            ->when($query, function ($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%");
        })->get();

        return response()->json([
            'users' => $users
        ]);
    }

    public function get(User $user)
    {
        return response()->json([
            'user' => $user->load('skills')
        ]);
    }
}
