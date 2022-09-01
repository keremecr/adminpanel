<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Dersler;
use App\Models\Gruplar;
use App\Models\Dersgruplari;

class Lessongroupupdate extends Component
{
    public Dersgruplari $lessongroup;
    public $ders;
    public $dersname;
    public $rules=[
      'lessongroup.ders_id'=>'required',
      'lessongroup.katsayi'=>'required',
      'lessongroup.grup_id'=>'required'
    ];
    public function mount($id,$name)
    {
      $dersname=Dersler::find($id)->name;
      $ders=Dersler::find($id)->groups()->where('name',$name)->first();
      $this->ders=$ders;
      $lessongroup=Dersgruplari::where('ders_id',$id)->where('grup_id',$this->ders->id)->first();
      $this->lessongroup=$lessongroup;
    }
    public function render()
    {
      $groups=Gruplar::all();
      $lessons=Dersler::all();
      return view('livewire.lessongroupupdate',compact('groups','lessons'));
    }
    public function updateLessongroup(){
      $this->validate();
      $this->dersgrup->save();
      return redirect()->route('lessongroups');
    }
}
