<?php

namespace App\Services;
use App\Models\Skill;

class SkillService
{
    public function index()
    {
        $skills = Skill::with('category')->latest()->get();

        return $skills;
    }

    public function store($data)
    {
        $skill = Skill::create($data);

        return $skill;
    }

    public function show($skill)
    {
        return $skill;
    }

    public function update($skill, $data)
    {
        $skill->update($data);

        return $skill;
    }

    public function destroy($skill)
    {
        return $skill->delete();
    }
}
