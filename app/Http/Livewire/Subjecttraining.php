<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use App\Models\Student;
use App\Models\User;
use App\Models\Subject;
use App\Models\Teacher;
use DB;
class Subjecttraining extends Component
{
  public Appointment $appointment;
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
  public function mount($subject){
    $user=User::where('id',auth()->user()->id)->first();
    $student=Student::where('name',$user->name)->first();
    $student_id=$student->id;
    $this->appointment=new Appointment();
    $this->appointment->subject=$subject;
    $this->appointment->student_id=$student_id;
  }
  public function insertAppointment(){
    $this->validate();
    $appointment=new Appointment();
    $user=User::where('id',auth()->user()->id)->first();
    $student=Student::where('name',$user->name)->first();
    $appointment->student_id=$this->student_id;
    $appointment->teacher_id=$this->teacher_id;
    $appointment->start_at=$this->start_at;
    $appointment->subject=$this->subject;
    $appointment->finish_at=$this->finish_at;
    $bolunmus=explode("T",$this->appointment->start_at);
    $date=implode(" ",$bolunmus);
    $appointment->start_at=$date;
    $bolunmusbitis=explode("T",$this->appointment->finish_at);
    $datebitis=implode(" ",$bolunmusbitis);
    $appointment->finish_at=$datebitis;
    $appoint=Appointment::where('teacher_id',$this->appointment->teacher_id)->where('start_at','<=',date($date))->where('finish_at','>=',date($date))->orWhere('finish_at','>=',date($datebitis))->where('start_at','<=',date($datebitis))->first();
    if($appoint){
      session()->flash('message','Bu aralıkta hocamızın randevusu var');
      return view('livewire.subjecttraining');
    }
    else if(date($date)>=date($datebitis)){
      session()->flash('message','Lütfen geçerli bir tarih aralığı girin');
    }
    else if(date($date)<=now() or date($datebitis)<=now()){
      session()->flash('message','Lütfen geçerli bir tarih aralığı girin');
    }
    else{
      $this->appointment->save();
      session()->flash('message','Randevu başarıyla eklendi');
      return view('livewire.examanalyze');
    }

  }
  public function render()
  {
        $sub=Subject::where('name',$this->subject)->with('lesson')->first();
        $teachers=Teacher::where('ders_id',$sub->lesson->id)->get();
        return view('livewire.subjecttraining',compact('teachers'));
  }
}
