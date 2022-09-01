<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;

class Studentcreate extends Component
{
  public Student $student;
  public $name;
  public $sinif;
  public $group;
  public $fee;
  public $odenenmiktar;
  public $rules=[
    'student.name'=>'required',
    'student.sinif'=>'required',
    'student.group'=>'required',
    'student.fee'=>'required',
    'student.odenenmiktar'=>'required',
  ];
  public $messages = [
  'student.name.required' => 'Öğrenci adı gereklidir',
  'student.sinif.required' => 'Öğrenci sınıfı gereklidir',
  'student.group.required' => 'Öğrenci alanı gereklidir',
  'student.fee.required' => 'Kayıt ücreti gereklidir',
  'student.odenenmiktar.required' => 'Ödenen miktar gereklidir',
  ];

  public function mount(){
    $this->student=new Student();
  }
  public function insertStudent(){
      $this->validate();
      $student=new Student();
      $student->name=$this->name;
      $student->sinif=$this->sinif;
      $student->group=$this->group;
      $student->fee=$this->fee;
      $student->odenenmiktar=$this->odenenmiktar;
      if($this->student->sinif>12 OR $this->student->sinif<9){
        session()->flash('message','Geçersiz sınıf bilgisi');
        return view('livewire.studentcreate');
      }
      else{
        $this->student->save();
        session()->flash('message','Öğrenci başarıyla eklendi');
        return redirect()->route('students');
      }
  }
  public function render()
  {
      return view('livewire.studentcreate');
  }
}
