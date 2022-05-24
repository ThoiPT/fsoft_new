<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'gender',
        'address',
        'file',
        'recruit_id',
        'status'
    ];

    public function recruit()
    {
        return $this->belongsTo(Recruit::class);
    }
}
