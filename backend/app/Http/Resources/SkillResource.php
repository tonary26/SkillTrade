<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

class SkillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => $this->when(Route::currentRouteName() == 'skill.show', $this->user->name),
            'user_id' => $this->user->id,
            'title' => $this->title,
            'description' => $this->when(Route::currentRouteName() == 'skill.show', $this->description),
            'category_id' => $this->category->id,
            'category' => $this->when(Route::currentRouteName() == 'skill.show', $this->category->title),
            "type" => $this->type
        ];
    }
}
