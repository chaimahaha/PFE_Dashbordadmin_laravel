<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;

class Search extends Component
{
    public $search='';
    
    public function updatedSearch()
    {
        
    }

    
    public $users=[];
    public function render()
    {
        $words = '%'. $this->search . '%';

        if(strlen($this->search) >= 2)
        { $this->users = User::where('nom', 'LIKE', $words)
        ->orWhere('prenom','LIKE',$words)
        ->get();
        }
        return view('livewire.search', ['users'=>$this->users]);
    }
}

