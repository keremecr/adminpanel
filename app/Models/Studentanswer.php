<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentanswer extends Model
{
    use HasFactory;
    protected $table="studentanswers";
    protected $fillable=['student_id','exam_id','question_id','answer','result','kitapcik'];
}
