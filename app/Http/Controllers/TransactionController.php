<?php

namespace App\Http\Controllers;
use App\Depense;
use App\Transaction;
use App\Transaction_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{

    public function addMontant(Request $request){


        $getmontant =  Session::get('montant');
        return view("livewire.index",compact('getmontant'));
    }
    public function addTransaction(Request $request){
        $this->validate($request,[
                'montant'=>"required|numeric|min:4",]
        );
        $trans = new Transaction();
        $trans->montant = $request->montant;
        $save= $trans->save();
        if($save){
            $ids = $request->values;
            foreach ($ids as $id) {
                Transaction_user::create([
                   'user_id'=>$id,
                   'transaction_id'=>$trans->id,
                    'payed'=>0
                ]);
            }
            session()->flash('success','Transaction ajoutée  avec succès!');
            return redirect('/');
        }
    }

    public function minusMontant(Request $request){
        $this->validate($request,[
                'montant'=>"required|numeric|min:4",
                'title'=>"required|min:5"]
        );
        $depense = new Depense();
        $depense->title = $request->title;
        $depense->montant = $request->montant;
        $depense->user_id=1;
        $depense->save();
        session()->flash('success','Retrait éffectué  avec succès!');

        return redirect('/');
    }
}
