<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Dersler;

class Lessons extends Component
{

    public function render()
    {
        $lessons=Dersler::all();
        return view('livewire.lessons',compact('lessons'));
    }
    public function deleteLesson($id){
      $ders=Dersler::find($id) ?? abort(404,'Ders bulunamadı');
      $ders->delete();
      return redirect()->route('lessons');
    }
}
