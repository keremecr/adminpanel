<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table="exams";
    protected $fillable=['type_id','name','date'];
    public function examtype(){
      return $this->belongsTo('App\Models\Examtype','type_id');
    }
    public function lessongroups(){
      return $this->belongsToMany(Dersgruplari::class,'answerkeys','exam_id','dersgrup_id')->withPivot(['correctanswer','katsayi','subject','kitapcik']);
    }
    public function students(){
      return $this->belongsToMany(User::class,'studentanswers','exam_id','student_id')->withPivot(['answer','result','kitapcik','question_id']);
    }
}
