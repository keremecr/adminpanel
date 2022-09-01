<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dersgruplari extends Model
{
    use HasFactory;
    protected $table="dersgruplari";
    protected $fillable=['ders_id','grup_id','katsayi'];
    public function exams(){
      return $this->belongsToMany(Exam::class,'answerkeys','dersgrup_id','exam_id')->withPivot(['correctanswer','katsayi','subject','kitapcik']);
    }
}
