<?php

namespace App\Http\Livewire\Dashboard\Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;
use Cookie;
use Livewire\Component;

class UserLogin extends Component
{
    public $email;
    public $password;
    public $remember;

    public $rules=[
      "email"=>"required",
      "password"=>"required",
    ];

    public $messages=[
      "email.required"=>"Email alanı gereklidir",
      "password.required"=>"Şifre alanı gereklidir",
    ];
    public function mount(){
      if(Cookie::has('email')){
        $this->email=Cookie::get('email');
      }
      if(Cookie::has('password')){
        $this->password=Cookie::get('password');
      }
    }
    public function render()
    {
        return view('livewire.dashboard.auth.user-login');
    }
    public function userLogin(){
      $this->validate();
      if(Auth::attempt(['email'=>$this->email,'password'=>$this->password])){
        if($this->remember){
          Cookie::queue('email',$this->email, 1440);
          Cookie::queue('password',$this->password, 1440);
          Cookie::queue('remember', true, 1440);
        }
        if($this->remember==null){
          if(Cookie::has('email')){
            Cookie::queue(Cookie::forget('email'));
            Cookie::queue(Cookie::forget('password'));
            Cookie::queue(Cookie::forget('remember'));
          }
        }
        return redirect()->route('dashboard.index');
      }
      else{
        session()->flash('message',"Giriş başarısız");
      }


    }
}
