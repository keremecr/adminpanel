<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Dersler;
class Gruplar extends Model
{
    use HasFactory;
    protected $table="gruplar";
    protected $fillable=['name'];
    public function lessons(){
      return $this->belongsToMany(Dersler::class,'dersgruplari','grup_id','ders_id');
    }
}
