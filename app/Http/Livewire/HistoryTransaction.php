<?php

namespace App\Http\Livewire;

use App\Comptability;
use App\Transaction;
use Livewire\Component;

class HistoryTransaction extends Component
{


    public function render()
    {
        return view('livewire.history-transaction',['transactions'=>Comptability::paginate(3)]);
    }
}
