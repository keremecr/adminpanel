<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Dersgruplari;
use App\Models\Dersler;
use App\Models\Gruplar;
use Illuminate\Database\Eloquent\Collection;

class Lessongroups extends Component
{
    public function render()
    {
      $lessongroups=Dersler::with('groups')->get();
      return view('livewire.lessongroups',compact('lessongroups'));
    }
    public function deleteLessongroup($id,$name){
      $ders=Dersler::find($id)->groups()->where('name',$name)->first();
      $lessongroup=Dersgruplari::where('ders_id',$id)->where('grup_id',$ders->id)->first();
      $lessongroup->delete();
      return redirect()->route('lessongroups');
    }
}
