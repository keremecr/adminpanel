<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Exam;
use App\Models\User;
use App\Models\Studentanswer;
class Exams extends Component
{
    public $exam;
    public function render()
    {
      if(auth()->user()->type=='admin'){
        $exams=Exam::all();
        $this->exam=$exams;
        return view('livewire.exams',compact('exams'));
      }
      else{
        $user=User::whereId(auth()->user()->id)->with('exams')->first();
        $exams=[];
        foreach($user->exams as $exam){
          array_push($exams,$exam->name);
        }
        $exams=array_unique($exams);
        $this->exam=$exams;
        $dates=[];
        foreach($exams as $exam){
          $exam=Exam::where('name',$exam)->first();
          array_push($dates,$exam->date);
        }
        return view('livewire.exams',compact('exams','dates'));
      }
    }
    public function deleteExam($id){
      $exam=Exam::find($id) ?? abort(404,'Ders bulunamadı');
      $exam->delete();
      session()->flash('message','Sınav başarıyla silindi');
      return redirect()->route('exams');
    }
}
