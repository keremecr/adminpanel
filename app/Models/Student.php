<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exam;

class Student extends Model
{
    use HasFactory;
    protected $table="students";
    protected $fillable=['name','sinif','group','fee','odenenmiktar'];
    public function teachers(){
      return $this->belongsToMany(Teacher::class,'appointments','student_id','teacher_id')->withPivot(['id','subject','start_at','finish_at','created_at']);
    }
}
