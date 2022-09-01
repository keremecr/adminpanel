<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Activite;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;


use Livewire\Component;

class UpdateActivite extends Component
{
    public Activite $activity;

    public function rules() {
      return [
        'activity.title' => 'required',
        'activity.description'=>'required|min:3',
        'activity.finished_at'=>'nullable|after:'.now(),
        'activity.status'=>'required'
      ];
    }
    public function render()
    {
      $users=User::all();
      return view('livewire.update-activite',compact('users'));
    }
    public function mount($id){
      $activity = Activite::findOrFail($id);
      $this->activity=$activity;
    }
    public function updateActivite(){
      $this->validate();
      $this->activity->save();
      return view('livewire.index')->withSuccess('Aktivite başarıyla güncellendi');
    }

}
