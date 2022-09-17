<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table="teachers";
    protected $fillable=['name','ders_id','email'];
    public function lesson(){
      return $this->belongsTo('App\Models\Dersler','ders_id');
    }
    public function students(){
      return $this->belongsToMany(Student::class,'appointments','teacher_id','student_id')->withPivot(['subject','start_at','finish_at']);
    }
}
