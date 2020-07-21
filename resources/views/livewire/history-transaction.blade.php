<div>
        <div class="card">
            <div class="card-header">
                <h3>Les dernières transactions</h3>
            </div>
            <div class="body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Type de transaction</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Date </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                            @if($transaction->type_transaction=="debiter")
                                <tr>
                                    <td class="alert alert-danger">{{$transaction->type_transaction}}</td>
                                    <td class="alert alert-danger">{{$transaction->transaction_amount}}</td>
                                    <td class="alert alert-danger">{{date('d-m-Y',strtotime($transaction->created_at))}}</td>
                                </tr>
                            @endif
                            @if($transaction->type_transaction=="crediter")
                                <tr>
                                    <td class="alert alert-success">{{$transaction->type_transaction}}</td>
                                    <td class="alert alert-success">{{$transaction->transaction_amount}}</td>
                                    <td class="alert alert-success">{{date('d-m-Y',strtotime($transaction->created_at))}}</td>
                                </tr>
                            @endif

                        @endforeach
                    </tbody>
                </table>
                {{$transactions->links() }}
            </div>
        </div>
</div>
