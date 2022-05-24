<?php

namespace Database\Factories;

use App\Enums\Status;
use App\Models\Department;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recruit>
 */
class RecruitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $arr = ['Fresher', 'Intern', 'HR', 'Leader', 'Manege'];
        return [
            'title' => $this->faker->name(),
            'exp' => $this->faker->randomDigit() . "month",
            'level' => array_rand($arr),
            'numRecruit' => $this->faker->randomDigit(),
            'open_at' => $this->faker->date(),
            'close_at' => $this->faker->date(),
            'description' => $this->faker->text(),
            'status' => Status::On,
            'user_id' => User::all()->random()->id,
            'vacancy_id' => Vacancy::all()->random()->id,
            'department_id' => Department::all()->random()->id,
        ];
    }
}
