<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Dersler;

class Lessoncreate extends Component
{
    public Dersler $ders;
    public $name;
    public $rules=[
      'ders.name'=>'required'
    ];
    public function mount(){
      $this->ders=new Dersler();
    }
    public function insertLesson(){
      $this->validate();
      $ders=new Dersler();
      $ders->name=$this->name;
      $this->ders->save();
      return redirect()->route('lessons');
    }
    public function render()
    {
        return view('livewire.lessoncreate');
    }

}
