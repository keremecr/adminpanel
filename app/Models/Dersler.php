<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gruplar;

class Dersler extends Model
{
    use HasFactory;
    protected $table="dersler";
    protected $fillable=['name'];
    public function groups(){
      return $this->belongsToMany(Gruplar::class,'dersgruplari','ders_id','grup_id')->withPivot(['katsayi']);
    }
    public function teachers(){
      return $this->hasMany(\App\Models\Teacher::class, 'ders_id');
    }
    public function subjects(){
      return $this->hasMany(\App\Models\Subject::class, 'ders_id');
    }    
}
