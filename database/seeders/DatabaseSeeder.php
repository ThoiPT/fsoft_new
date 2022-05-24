<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\CV;
use App\Models\Department;
use App\Models\Recruit;
use App\Models\RecruitSkill;
use App\Models\Skill;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $arr_skill = ['CSS', 'HTML', 'JS', 'PHP', 'NodeJs', 'Laravel', 'Python', 'Java', 'C', 'C++', 'C#', 'Ruby'];
        foreach($arr_skill as $v){
            Skill::factory()->create([
                'name' => $v
            ]);
        }

        Department::factory(10)->create();

        User::factory()->create([
            'name' => 'Administrator',
            'role' => UserRole::Admin,
            'email' => 'admin@gmail.com'
        ]);

        User::factory(10)->create();

        $arr_vacancy = ['Fron End', 'HTML', 'JS', 'PHP', 'NodeJs', 'Laravel', 'Python', 'Java', 'C', 'C++', 'C#', 'Ruby'];
        foreach($arr_vacancy as $v){
            Vacancy::factory()->create([
                'name' => $v
            ]);
        }
        Vacancy::factory(10)->create();

        Recruit::factory(10)->create();
        RecruitSkill::factory(10)->create();
        CV::factory(10)->create();


    }
}
