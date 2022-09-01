<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;

class Students extends Component
{
    public function render()
    {
        $students=Student::all();
        return view('livewire.students',compact('students'));
    }
}
