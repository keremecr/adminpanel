<?php

namespace App\Http\Livewire\Dashboard\Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

use Livewire\Component;

class UserLogin extends Component
{
    public $email;
    public $password;

    public $rules=[
      "email"=>"required",
      "password"=>"required",
    ];

    public $messages=[
      "email.required"=>"Email alanı gereklidir",
      "password.required"=>"Şifre alanı gereklidir",
    ];
    public function render()
    {
        return view('livewire.dashboard.auth.user-login');
    }
    public function userLogin(){
      $this->validate();
      if(Auth::attempt(['email'=>$this->email,'password'=>$this->password])){
        return redirect()->route('dashboard.index');
      }
      else{
        session()->flash('message',"Giriş başarısız");
      }


    }
}
