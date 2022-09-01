<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answerkey extends Model
{
    use HasFactory;
    protected $table='answerkeys';
    protected $fillable=['exam_id','dersgrup_id','correctanswer','katsayi','subject','kitapcik'];
    public function exam(){
      return $this->belongsTo('App\Models\Exam','exam_id');
    }
    public function lessongroup(){
      return $this->belongsTo('App\Models\Dersgruplari','dersgrup_id');
    }
}
