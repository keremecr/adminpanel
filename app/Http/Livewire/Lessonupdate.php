<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Dersler;

class Lessonupdate extends Component
{
    public Dersler $ders;
    public $rules=[
      'ders.name'=>'required'
    ];
    public function mount($id){
      $ders=Dersler::findOrFail($id);
      $this->ders=$ders;
    }
    public function updateLesson(){
      $this->validate();
      $this->ders->save();
      return redirect()->route('lessons');
    }
    public function render()
    {
        return view('livewire.lessonupdate');
    }
}
