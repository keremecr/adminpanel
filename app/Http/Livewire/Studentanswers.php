<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Exam;

class Studentanswers extends Component
{
  public $name;
  public function mount($exam)
  {
    $this->name=$exam;
  }
    public function render()
    {
        $examanswers=Exam::where('name',$this->name)->with('students')->first();
        $exam=$this->name;
        return view('livewire.studentanswers',compact('examanswers','exam'));
    }
}
