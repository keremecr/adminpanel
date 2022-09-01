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
}
