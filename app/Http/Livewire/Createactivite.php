<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Activite;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;


class Createactivite extends Component
{
    public Activite $activity;
    public $title;
    public $description;
    public $started_at;
    public $finished_at="";
    public $user_id;

    public function rules() {
      return [
        'activity.title' => 'required',
        'activity.description'=>'required|min:3',
        'activity.finished_at'=>'nullable|after:'.now(),
        'activity.status'=>'required'
      ];
    }
    public function insertActivite(){
      $activity=new Activite();
      $activity->title=$this->title;
      $activity->description=$this->description;
      if($this->user_id){
        $activity->user_id=$this->user_id;
      }
      else{
        $activity->user_id=auth()->user()->id;
      }
      $activity->started_at=$this->started_at;
      $activity->finished_at=$this->finished_at;
      $activity->save();
    }
    public function render()
    {
        $users=User::all();
        return view('livewire.createactivite',compact('users'));
    }
}
