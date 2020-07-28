<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>all transactions</title>
</head>
<body>
 <div class="container">
     <table class="table table-bordered text-center table-striped table-sm">
         <thead>
         <tr class="bg-primary text-light">
             <th scope="col">Type</th>
             <th scope="col">Montant</th>
             <th scope="col">Date</th>
         </tr>
         </thead>
         <tbody>
         @foreach($transactions as $transaction)
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
                 @endforeach
         </tbody>

     </table>

     <div>
         <p>fait par lebera Inov solution</p>
     </div>
 </div>
</body>
</html>
