<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'recruit_id',
        'skill_id',
    ];

    public function recruit()
    {
        return $this->belongsTo(Recruit::class);
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}
