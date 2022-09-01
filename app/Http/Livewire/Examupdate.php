<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Examtype;
use App\Models\Exam;

class Examupdate extends Component
{
    public Exam $exam;
    public $type_id;
    public $name;
    public $date;
    public $rules=[
      'exam.type_id'=>'required',
      'exam.name'=>'required',
      'exam.date'=>'required'
    ];
    public function mount($id)
    {
      $exam=Exam::find($id);
      $this->exam=$exam;
    }
    public function render()
    {
        $examtypes=Examtype::all();
        return view('livewire.examupdate',compact('examtypes'));
    }
    public function updateExam(){
      $this->validate();
      $this->exam->save();
      session()->flash('message','Sınav başarıyla güncellendi');
      return redirect()->route('exams');
    }
}
