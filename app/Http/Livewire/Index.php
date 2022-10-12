<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Activite;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class Index extends Component
{

    public $activite_id;
    public $byuser=null;
    public $durum=null;

    public function render()
    {
        if(auth()->user()->type=='admin'){
          if($this->byuser AND $this->durum){
            $activities=Activite::where('user_id',$this->byuser)->where('status',$this->durum)->get();
          }
          else if($this->byuser){
            $activities=Activite::where('user_id',$this->byuser)->get();
          }
          else if($this->durum){
            $activities=Activite::where('status',$this->durum)->get();
          }
          else{
              $activities=Activite::all();
          }

        }
        else{          
          $activities=Activite::where('user_id',auth()->user()->id)->get();
        }
        $users=User::all();
        return view('livewire.index',compact('activities'),compact('users'));
    }
}
