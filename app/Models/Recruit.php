<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruit extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'exp',
        'level',
        'numRecruit',
        'open_at',
        'close_at',
        'description',
        'status',
        'user_id',
        'vacancy_id',
        'department_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function recruit_skill()
    {
        return $this->hasMany(RecruitSkill::class);
    }

    public function skills()
    {
        return $this->hasManyThrough(
            Skill::class,
            RecruitSkill::class,
            'recruit_id',
            'id',
            'id',
            'skill_id'
        );
    }
}
