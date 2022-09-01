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
    
}
