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
            'user' => $this->user->name,
            'user_avatar' => $this->user->avatar_url,
            'user_id' => $this->user->id,
            'title' => $this->title,
            'description' => $this->description,
            'category_id' => $this->category->id,
            'category' => $this->category->title,
            'type' => $this->type,
            'created_at' => $this->created_at->format('d.m.Y H:i'),
        ];
    }
}
