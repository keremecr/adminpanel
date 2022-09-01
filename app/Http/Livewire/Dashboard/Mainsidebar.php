<?php

namespace App\Http\Livewire\Dashboard;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Activite;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class Mainsidebar extends Component
{
    public function render()
    {
        return view('livewire.dashboard.mainsidebar');
    }
    public function userLogout(){
      Auth::logout();
      session()->flash('message','Başarıyla çıkış yaptınız');
      return redirect()->route('login');
    }
    public function getActivities(){
      return redirect()->route('index');
    }
    public function getLessons(){
      return redirect()->route('lessons');
    }
    public function getGroups(){
      return redirect()->route('groups');
    }
    public function getLessongroups(){
      return redirect()->route('lessongroups');
    }

}
