<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table="subjects";
    protected $fillable=['name','ders_id'];
    public function lesson(){
      return $this->belongsTo('App\Models\Dersler','ders_id');
    }
}
