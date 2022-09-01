<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Dersler;
use App\Models\Gruplar;
use App\Models\Dersgruplari;
use Illuminate\Validation\Rule;
use Validator;

class Lessongroupcreate extends Component
{
    public Dersgruplari $dersgrup;
    public $dersgrupcontrol;
    public $ders_id;
    public $grup_id;
    public $katsayi;
    public $validator;
    public $rules=[
      'dersgrup.ders_id'=>'required',
      'dersgrup.grup_id'=>'required',
      'dersgrup.katsayi'=>'required'
    ];
    public $messages = [
    'dersgrup.ders_id.unique' => 'Given ip and hostname are not unique',
    ];

    public function mount(){
      $this->dersgrup=new Dersgruplari();
    }
    public function insertLessongroup(){
        $this->validate();
        $dersgrup=new Dersgruplari();
        $dersgrup->ders_id=$this->ders_id;
        $dersgrup->grup_id=$this->grup_id;
        $dersgrup->katsayi=$this->katsayi;
        if(Dersgruplari::where('ders_id',$this->dersgrup->ders_id)->where('grup_id',$this->dersgrup->grup_id)->first()){
          session()->flash('message','Böyle bir ders grubu zaten var');
          return view('livewire.lessongroupcreate');
        }
        else{
          $this->dersgrup->save();
          return redirect()->route('lessongroups');
        }
    }
    public function render()
    {
        $lessons=Dersler::all();
        $groups=Gruplar::all();
        return view('livewire.lessongroupcreate',compact('lessons'),compact('groups'));
    }
}
