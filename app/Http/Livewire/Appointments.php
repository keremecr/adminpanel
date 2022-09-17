<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Student;
use App\Models\Appointment;


class Appointments extends Component
{
    public function render()
    {
        $appointments=[];
        if(auth()->user()->type=='admin'){
          $appointments=Appointment::all();
        }
        else{
          $user=User::where('id',auth()->user()->id)->first();
          $student=Student::where('name',$user->name)->with('teachers')->first();
        }
        return view('livewire.appointments',compact('student','appointments'));
    }
    public function deleteAppointment($id){
      $appointment=Appointment::where('id',$id)->first();
      $appointment->delete();
      session()->flash('message','Randevu başarıyla silindi');
    }
}
