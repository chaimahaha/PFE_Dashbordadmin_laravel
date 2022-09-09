<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;

class Search extends Component
{
    public $search='';
    public function render()
    {
        $result=[];
        $result=User::where('id','nom','prenom',$this->$search)->get();
        return view('livewire.search');
    }
}
