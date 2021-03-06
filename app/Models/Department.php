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
        return $this->hasMany(Recruit::class,'department_id','id');
    }

    //use: Department::find($id)->quantityRecruit();
    public function quantityRecruit(){
        return $this->recruit->count('id');
    }

    public function cv(){
        return $this->hasManyThrough(CV::class, Recruit::class);
    }

//    Department::find(1)->cv->where('status', 2)->get();

    public function list_vacancy(){
        $recruits = $this->recruit;
        $vacancies = [];

        foreach ($recruits as $recruit){
            $vacancies[] = Vacancy::find($recruit->vacancy->id);
        }

        return $vacancies;
    }

    public function count_vacancy(){
        $recruits = $this->recruit;
        $vacancies_id = [];
        foreach ($recruits as $recruit) {
            $vacancies_id[] = Vacancy::find($recruit->vacancy->id)->id;
        }

        $list_vacancy = Vacancy::all();

        foreach ($list_vacancy as $vacancy){
            $vacancy -> quantity = 0;
            foreach ($vacancies_id as $id) {
                if($vacancy->id == $id) {
                    $vacancy->quantity += 1;
                }
            }
        }

        return $list_vacancy;
    }

}
