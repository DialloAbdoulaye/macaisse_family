<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;

use App\Comptability;
use Livewire\Component;

class Account extends Component
{
    public $account_id;
    public $type_transaction ="Depot";
    public $transaction_amount;
    public $userTransactions;
    public $userTransactionArray;
    public $account_number;
    public $userAccountNumber;



    public function render()
    {
        $allAccount = \App\Account::all();
        return view('livewire.account',[
            'allAccount'=>$allAccount
        ]);
    }


    public function getAccountId(int $id){
       $account = \App\Account::findOrfail($id);
       $this->account_id=$account->id;
       $this->account_number=$account->account_number;

    }

    public function addTransaction(){
        $this->validate([
            'transaction_amount'=>'required|min:4|numeric',
            'type_transaction'=>'required',
            'account_id'=>'required'
        ]);
        $accountId =\App\Account::findOrFail($this->account_id);
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
                    'balance'=>$dataUpdate
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
                'balance'=>$dataUpdate
            ]);
            session()->flash('success','Transaction Reuissie avec succès.!');
        }
}

    public function getUserTransanctionDetail(int $id){
        $this->userTransactions = \App\Account::whereId($id)->get();
        $this->userTransactionArray=$this->userTransactions[0];
        $this->userAccountNumber= $this->userTransactionArray->account_number;
    }

public function refresh(){
        $this->account_id='';
        $this->type_transaction='Retrait';
        $this->transaction_amount='';
}
}
