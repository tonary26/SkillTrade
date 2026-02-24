<?php

namespace App\Http\Controllers\Api\V1\Skill;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Resources\SkillResource;
use App\Http\Requests\Skill\SkillStoreRequest;
use App\Http\Requests\Skill\SkillUpdateRequest;

class SkillController extends BaseController
{
    public function index()
    {
        $skills = $this->service->index();

        return SkillResource::collection($skills);
    }

    public function store(SkillStoreRequest $request)
    {
        $data = $request->validated();
        $skill = $this->service->store(array_merge($data, [
            'user_id' => $request->user()->id
        ]));

        return new SkillResource($skill);
    }

    public function show(Skill $skill)
    {
        $skill = $this->service->show($skill);

        return new SkillResource($skill);
    }

    public function update(SkillUpdateRequest $request, Skill $skill)
    {
        $data = $request->validated();
        $this->service->update($skill, $data);

        return new SkillResource($skill);
    }

    public function destroy(Skill $skill)
    {
        $this->service->destroy($skill);

        return response()->json([
            'message' => 'Skill deleted.'
        ]);
    }
}
