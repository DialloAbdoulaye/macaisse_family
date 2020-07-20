<?php

namespace App\Http\Livewire;

use App\Comptability;
use Livewire\Component;

class Account extends Component
{
    public $account_id;
    public $type_transaction;
    public $transaction_amount;
    public function render()
    {
        $account = \App\Account::all();
        return view('livewire.account',[
            'allAccount'=>$account
        ]);
    }


    public function getAccountId(int $id){
       $account = \App\Account::findOrfail($id);
       $this->account_id=$account->id;
    }

    public function addTransaction(){
        $this->validate([
            'transaction_amount'=>'required|min:4|numeric',
            'type_transaction'=>'required',
        ]);
        $accountId =\App\Account::find($this->account_id);
        if($this->type_transaction=="debiter"){
            if($accountId->balance < $this->transaction_amount){
                session()->flash('faild','Transaction échouée. Solde insuffisant!');
            }else{
                Comptability::create([
                    'account_id'=>$this->account_id,
                    'type_transaction'=>$this->type_transaction,
                    'transaction_amount'=>$this->transaction_amount
                ]);
                $dataUpdate=  (float)$accountId->balance -=$this->transaction_amount;
                $accountId->update([
                    'balace'=>$dataUpdate
                ]);
                session()->flash('success','Transaction Reuissie avec succès.!');
            }
        }else{
            Comptability::create([
                'account_id'=>$this->account_id,
                'type_transaction'=>$this->type_transaction,
                'transaction_amount'=>$this->transaction_amount
            ]);
            $dataUpdate=  (float)$accountId->balance +=$this->transaction_amount;
            $accountId->update([
                'balace'=>$dataUpdate
            ]);
            session()->flash('success','Transaction Reuissie avec succès.!');
        }
}

public function refresh(){
        $this->account_id='';
        $this->type_transaction='Retrait';
        $this->transaction_amount='';
}
}
