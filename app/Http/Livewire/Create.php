<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class Create extends Component
{

    public $firstname;
    public $lastname;
    public $phone;
    public $avatar;
    public $extension;
    private $matricule;
    private $mat;




    public function addParticipant(){

        $user= User::all();
        $latest= $user->last();
        if($user->last()){
            $this->mat=$latest->id+1;
        }else{
            $this->mat=1;
        }
        $this->validate([
            'firstname' => 'required|min:6',
            'lastname' => 'required|min:6',
            'phone' => 'required|min:8|numeric',
        ]);

        User::create([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'phone' => $this->phone,
            'matricule'=>'WLD#000'.$this->mat,
            'active'=>0,
            'amande'=>0,
            'avatar'=>'/image/avatar.png',
            'montant-amande'=>0
        ]);
        session()->flash('success','parcipant ajouté  avec succès!');
        $this->refresh();
    }


    public function refresh(){
        $this->firstname='';
        $this->lastname='';
        $this->phone='';
    }

    public function render()
    {
        return view('livewire.create');
    }
}
