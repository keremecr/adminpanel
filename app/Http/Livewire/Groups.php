<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Gruplar;

class Groups extends Component
{
    public function render()
    {
      $groups=Gruplar::all();
      return view('livewire.groups',compact('groups'));
    }
}
