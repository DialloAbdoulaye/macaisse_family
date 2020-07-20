<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Str;
use Livewire\Component;

class Partenaire extends Component
{
    public $firstname;
    public $lastname;
    public $phone;
    public $avatar;
    public $extension;
    private $matricule;
    public $amount;
    private $mat;

    public function addPartenaire(){

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
            'amount'=>'required|min:4|numeric'
        ]);

       $add_user = User::create([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'phone' => $this->phone,
            'matricule'=>'WLDP#000'.$this->mat,
            'active'=>0,
            'amande'=>0,
            'avatar'=>'/image/avatar.png',
            'montant-amande'=>0,
           'type_user'=>'partenaire'
        ]);
       if($add_user){
          \App\Account::create([
               'account_number'=>Str::random(5).$add_user->id,
               'transaction_type'=>'depot',
               'balance'=>$this->amount,
               'user_id'=>$add_user->id,
               'amount'=>$this->amount
           ]);
       }

        session()->flash('success','partenaire ajouté  avec succès!');
        $this->refresh();
    }
    public function refresh(){
        $this->firstname='';
        $this->lastname='';
        $this->phone='';
        $this->amount='';
    }

    public function render()
    {

        return view('livewire.partenaire');
    }
}
