<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Examtype;
use App\Models\Exam;

class Examcreate extends Component
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
    public $messages = [
    'exam.type_id.required' => 'Sınav tipi gereklidir',
    'exam.name.required' => 'Sınav adı gereklidir',
    'exam.date.required' => 'Sınav tarihi gereklidir',
    ];

    public function mount(){
      $this->exam=new Exam();
    }
    public function insertExam(){
        $this->validate();
        $exam=new Exam();
        $exam->type_id=$this->type_id;
        $exam->name=$this->name;
        $exam->date=$this->date;
        $this->exam->save();
        session()->flash('message','Sınav başarıyla oluşturuldu');
        return redirect()->route('exams');
    }
    public function render()
    {
        $examtypes=Examtype::all();
        return view('livewire.examcreate',compact('examtypes'));
    }
}
