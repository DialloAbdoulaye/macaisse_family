<?php

namespace App\Http\Controllers;
use App\Depense;
use App\Transaction;
use App\Transaction_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Account;

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

    public function detailOfUserTransaction($id){
        $userAccount =DB::table('accounts')->where('accounts.id',$id)
                            ->join('users','accounts.user_id','=','users.id')
                            ->first();

        $allTransactions = DB::table('accounts')
            ->where('accounts.id',$id)
            ->join('comptabilities','accounts.id','=','comptabilities.account_id')
            ->orderBy('comptabilities.created_at','desc')
            ->paginate(3);


        $totalOfDebit =DB::table('accounts')
            ->where('accounts.id',$id)
            ->join('comptabilities','accounts.id','=','comptabilities.account_id')
            ->where('type_transaction','debiter')
            ->sum('transaction_amount');

        $totalOfCredit =DB::table('accounts')
            ->where('accounts.id',$id)
            ->join('comptabilities','accounts.id','=','comptabilities.account_id')
            ->where('type_transaction','crediter')
            ->sum('transaction_amount');

        return view('partenaires.detail',compact('userAccount','allTransactions','totalOfDebit','totalOfCredit'));
    }


}
