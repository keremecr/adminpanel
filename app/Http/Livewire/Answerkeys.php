<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Answerkey;
use App\Models\Exam;
use Illuminate\Database\Eloquent\Collection;

class Answerkeys extends Component
{
    public $exam_id;
    public $rules=[
      'answerkey.exam_id'=>'required',
      'answerkey.dersgrup_id'=>'required',
      'answerkey.correctanswer'=>'required',
      'answerkey.katsayi'=>'required',
      'answerkey.subject'=>'required',
      'answerkey.kitapcik'=>'required',
    ];
    public function mount($id){
      $this->exam_id=$id;
    }
    public function render(){
      $answerkeys=Answerkey::where('exam_id',$this->exam_id)->with('exam')->with('lessongroup')->get();
      $i=1;
      return view('livewire.answerkeys',compact('answerkeys','i'));
    }
}
