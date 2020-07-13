<?php

namespace App\Http\Livewire;

use App\Depense;
use App\Transaction;
use App\User;
use Illuminate\Support\Str;
use Livewire\Component;

class Dashbord extends Component
{
    public $participant;
    public $caisse;
    public $versement;
    public $retrait;
    public $plural;


    public function render()
    {
        $this->participant = User::all()->count();
        $this->plural = Str::plural('participant', 2);

        $getAmountOfVersement =Transaction::all('montant')->sum('montant');
        $this->versement=$getAmountOfVersement;

        $getAmountOfDepense =Depense::all('montant')->sum('montant');
        $this->retrait=$getAmountOfDepense;

        $this->caisse = $getAmountOfVersement - $getAmountOfDepense;
        return view('livewire.dashbord');
    }
}
