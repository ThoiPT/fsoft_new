<?php

namespace Database\Factories;

use App\Models\Recruit;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RecruitSkill>
 */
class RecruitSkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'recruit_id' => Recruit::all()->random()->id,
            'skill_id' => Skill::all()->random()->id,
        ];
    }
}
