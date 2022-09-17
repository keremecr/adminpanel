<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use App\Models\Teacher;
use App\Models\Subject;


class Appointmentupdate extends Component
{
    public Appointment $appointment;
    public $appointment_id;
    public $student_id;
    public $teacher_id=1;
    public $subject;
    public $start_at;
    public $finish_at;

    public function rules() {
      return [
        'appointment.student_id' => 'required',
        'appointment.teacher_id'=>'required',
        'appointment.subject'=>'required',
        'appointment.start_at'=>'required',
        'appointment.finish_at'=>'required'
      ];
    }
    public function mount($id){
      $appointment=Appointment::where('id',$id)->first();
      $this->appointment_id=$id;
      $this->appointment=$appointment;
    }
    public function render()
    {
        $teacher=Teacher::where('id',$this->appointment->teacher_id)->first();
        $teachers=Teacher::where('ders_id',$teacher->ders_id)->get();
        $subjects=Subject::where('ders_id',$teacher->ders_id)->get();
        return view('livewire.appointmentupdate',compact('teachers','subjects'));
    }
    public function updateAppointment(){
      $this->validate();
      $bolunmus=explode("T",$this->appointment->start_at);
      $date=implode(" ",$bolunmus);
      $bolunmusbitis=explode("T",$this->appointment->finish_at);
      $datebitis=implode(" ",$bolunmusbitis);
      $date=date($date);
      $datebitis=date($datebitis);
      $appoints=Appointment::where('teacher_id',$this->appointment->teacher_id)->get();
      $count=0;
      foreach($appoints as $appoint){
        if(($appoint->start_at<date($date)) AND ($appoint->finish_at>=date($date))){
          $count+=1;
        }
        else if(($appoint->start_at<date($datebitis)) AND ($appoint->finish_at>=date($datebitis))){
          $count+=1;
        }
      }
      if($count>0){
        session()->flash('message','Bu aralıkta hocamızın randevusu var');
      }
      else if(date($date)>=date($datebitis)){
        session()->flash('message','Geçersiz zaman aralığı');
      }
      else{
        $this->appointment->save();
        session()->flash('message','Randevu başarıyla güncellendi');
        return redirect()->route('appointments');
      }

    }
}
