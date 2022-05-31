<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function users()
    {
        return $this->hasMany(User::class,'department_id','id');
    }

    public function recruit(){
        return $this->hasMany(Recruit::class);
    }

    //use: Department::find($id)->quantityRecruit();
    public function quantityRecruit(){
        return $this->recruit->count('id');
    }

    public function cv(){
        return $this->hasManyThrough(CV::class, Recruit::class);
    }


}
