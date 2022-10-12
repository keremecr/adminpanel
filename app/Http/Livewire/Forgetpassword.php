<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Mail;
class Forgetpassword extends Component
{
    public $email;
    public $usercode;
    public $correctcode;
    public $name;
    public function render()
    {
        return view('livewire.forgetpassword');
    }
    public function sendcode(){
      $user=User::where('email',$this->email)->first();
      if($user==null){
        session()->flash('message','Böyle bir mail adresi yok lütfen tekrar mail adresi gir');
        return view('livewire.forgetpassword');
      }
      else{
        $this->name=$user->name;
        $name=$this->name;
        $this->correctcode=rand(1,32767);
        $correctcode=$this->correctcode;
        $email=$this->email;
        $array=[
          'name'=>$name,
          'code'=>$correctcode
        ];
        mail::send('mail.code',$array,function ($message) use ($email){
          $message->subject('Mail doğrulama kodu');
          $message->to($email);
        });
      }
    }
    public function gotoreset(){
      if($this->usercode==$this->correctcode){
        $mail=$this->email;
        return redirect()->route('changepassword',['email' => $mail]);
      }
      else{
        session()->flash('message','Yanlış kod');
      }
    }
}
