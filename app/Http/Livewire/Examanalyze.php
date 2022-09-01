<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Exam;
use App\Models\Studentanswer;
use App\Models\Answerkey;

class Examanalyze extends Component
{
  public $name;
  public function mount($exam)
  {
    $this->name=$exam;
  }
    public function render()
    {
      $exam=Exam::where('name',$this->name)->with('students')->first();
      $studentanswerinfo=Studentanswer::where('exam_id',$exam->id)->where('student_id',auth()->user()->id)->get();
      $studentanswers=[];
      $wrongnumbers=[];
      foreach($studentanswerinfo as $answer){
        $kitapcik=$answer->kitapcik;
        array_push($studentanswers,$answer->answer);
      }
      $answerkeyinfo=Answerkey::where('exam_id',$exam->id)->where('kitapcik',$kitapcik)->get();
      $answerkeys=[];
      $coefficients=[];
      $subjects=[];
      foreach($answerkeyinfo as $answer){
        array_push($answerkeys,$answer->correctanswer);
        array_push($coefficients,$answer->katsayi);
        array_push($subjects,$answer->subject);
      }
      $point=0;
      $wrongstudentanswers=[];
      for($i=0;$i<sizeof($answerkeys);$i++){
        if($answerkeys[$i]==$studentanswers[$i]){
          $point=$point+$coefficients[$i];
        }
        else{
          array_push($wrongnumbers,($i)+1);
          array_push($wrongstudentanswers,$studentanswers[$i]);
        }
      }
      $trueanswers=[];
      $wrongsubjects=[];
      for($i=0; $i<sizeof($wrongnumbers); $i++){
        $answerkey=Answerkey::where('exam_id',$exam->id)->where('question_id',$wrongnumbers[$i])->first();
        array_push($trueanswers,$answerkey->correctanswer);
        array_push($wrongsubjects,$answerkey->subject);
      }
      $indexcount=sizeof($wrongnumbers);
      return view('livewire.examanalyze',compact('wrongnumbers','exam','trueanswers','wrongsubjects','wrongstudentanswers','kitapcik','indexcount','point'));
    }
}
