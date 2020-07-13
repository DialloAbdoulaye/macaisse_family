<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $participant;
    public $firstname;
    public $lastname;
    public $matricule;
    public $phone;
    public $values=[];

    public $montant;

    /*public function mount(){
        $this->participants = User::All();
    }*/



    public function addMontantToTransaction(){

    }



    public function show(int $id){
        $this->participant= User::findOrfail($id);
        $this->matricule = $this->participant->matricule;
        $this->firstname = $this->participant->firstname;
        $this->lastname = $this->participant->lastname;
        $this->phone = $this->participant->phone;
    }

    public function addTransaction(Request $request){
        $values = $request->values;
        dd($values);
    }



        public function render()
        {
            return view('livewire.index',[ 'participants' => User::paginate(2)]);
        }
}
