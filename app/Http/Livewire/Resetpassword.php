<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class Resetpassword extends Component
{
  public User $user;
  public $rules=[
    'user.password'=>'required',
    'user.email'=>'required|email|unique'
  ];
    public $password;
    public $confirmpassword;
    public function mount($email){
      $user=User::where('email',$email)->first();
      $this->user=$user;
    }
    public function render()
    {
        return view('livewire.resetpassword');
    }
    public function changepassword(){
      if($this->password==$this->confirmpassword){
        $this->user->password=Hash::make($this->password);
        $this->user->save();
        session()->flash('message','Parola başarıyla değiştirildi');
        return view('backend.auth.login');
      }
      else{
        return dd(false);
      }
    }
}
