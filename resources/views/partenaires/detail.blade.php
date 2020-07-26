@extends('partenaires.acceuil')
@section('content')
 <div class="container">
     <div class="card">
         <div class="card-header">
             <h4>Detail des transactions du compte numero: {{$userAccount->account_number}}</h4>
         </div>

         <div class="card-body">
             <div class="row">
                 <div class="col-md-6">
                     <p>Nom et Prenom: <span class="bg-info text-light">{{$userAccount->firstname.' '. $userAccount->lastname}}</span></p>
                     <hr>
                     <p >Phone: <span class="bg-info text-light">{{$userAccount->phone}}</span></p>
                     <hr>
                     <p>matricule: <span class="bg-info text-light">{{$userAccount->matricule}}</span> </p>
                     <hr>
                     <p>Account number:  <span class="bg-info text-light">{{$userAccount->account_number}}</span></p>
                 </div>
                 <div class="col-md-6">
                     <table class="table table-bordered text-center table-striped table-sm">
                         <thead>
                         <tr class="bg-primary text-light">
                             <th scope="col">Type</th>
                             <th scope="col">Montant</th>
                             <th scope="col">Date</th>
                         </tr>
                         </thead>
                         <tbody>
                         @foreach($allTransactions as $transaction)
                             <tr>
                             @if($transaction->type_transaction=="debiter")
                                 <tr>
                                     <td><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down bg-danger mr-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/>
                                             <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/>
                                         </svg>{{$transaction->type_transaction}}</td>
                                     <td class="" style="color: red">{{number_format($transaction->transaction_amount,'0','.',',')}} <sup class="badge badge-info">Fcfa</sup></td>
                                     <td class="">{{date('d-m-Y',strtotime($transaction->created_at))}}</td>
                                 </tr>
                             @endif
                             @if($transaction->type_transaction=="crediter")
                                 <tr>
                                     <td><svg  width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up bg-success mr-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd" d="M4.646 9.646a.5.5 0 0 1 .708 0L8 12.293l2.646-2.647a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 0-.708z"/>
                                             <path fill-rule="evenodd" d="M8 2.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V3a.5.5 0 0 1 .5-.5z"/>
                                         </svg>{{$transaction->type_transaction}}</td>
                                     <td class="" style="color: green">{{number_format($transaction->transaction_amount,'0','.',',')}} <sup class="badge badge-info">Fcfa</sup></td>
                                     <td class="">{{date('d-m-Y',strtotime($transaction->created_at))}}</td>
                                 </tr>
                                 @endif
                                 </tr>
                                 @endforeach

                         </tbody>

                     </table>
                     <div class="text-center m-auto"> {{$allTransactions->links()}}</div>
                     <div col-md-7>
                         <hr>
                         <div class="row">
                             <div class="col-md-6 "><h6>Total Debiter</h6></div>
                             <div class="col-md-6"><h6>{{number_format($totalOfDebit,'0','.',',')}} <span ><sup class="badge badge-primary">Fcfa</sup></span></h6></div>
                         </div>
                         <hr>
                         <div class="row ">
                             <div class="col-md-6 "><h6>Total Crediter</h6></div>
                             <div class="col-md-6"><h6>{{number_format($totalOfCredit,'0','.',',')}} <span ><sup class="badge badge-primary">Fcfa</sup></span></h6></div>
                         </div>
                         <hr>
                         <div class="row">
                             <div class="col-md-6  "><h6>BALANCE</h6></div>
                             <div class="col-md-6"><h6>{{number_format($userAccount->balance,'0','.',',')}} <span ><sup class="badge badge-primary">Fcfa</sup></span></h6></div>
                         </div>

                         <div class="modal-footer">
                             <button type="button" class="btn btn-primary"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>
                                     <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                     <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                 </svg></button>
                         </div>
                     </div>
                 </div>

             </div>

     </div>
 </div>
@endsection
