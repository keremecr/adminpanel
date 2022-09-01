<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Activite;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class DeleteActivite extends Component
{
    public function mount($id){
      $activite=Activite::find($id) ?? abort(404,'Aktivite bulunamadı');
      $activite->delete();
    }
    public function render()
    {
      if(auth()->user()->type=='admin'){
        $activities=Activite::all();
      }
      else{
        $activities=Activite::where('user_id',auth()->user()->id)->get();
      }
      $users=User::all();
      return view('livewire.index',compact('activities'),compact('users'));
    }
}
