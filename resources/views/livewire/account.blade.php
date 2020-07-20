<div class="p-3">

   <div class="row">
       <div class="col-md-6">
           <div wire:loading wire:target="addTransaction" class="alert alert-warning text-center">
               Ajout en cours...
           </div>
           @if(session()->has('success'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                   {{session('success')}}
               </div>
           @endif
           @if(session()->has('faild'))
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                   {{session('faild')}}
               </div>
           @endif
          <div class="col-md-12 p-1" id="transactionShow">
              <form action="" wire:submit.prevent="addTransaction">
                 <div class="row p-2 m-2 rounded  border border-warning">
                     <div class="col-md-6">
                         <div class="mb-3 form-group">
                             <select ass="form-control" id="type_transaction" wire:model="type_transaction">
                                 <option value="debiter" class="form-control" selected>Retrait</option>
                                 <option value="crediter"  class="form-control">Dépot</option>
                             </select>
                             @error('transaction_type') <div class="error alert alert-danger mt-2">{{ $message }}</div> @enderror

                         </div>
                         <input type="hidden" class="form-control" value="{{$account_id}}">
                         <input type="text" placeholder="23000" wire:model="transaction_amount" class="form-control">
                         @error('transaction_amount') <div class="error alert alert-danger mt-2">{{ $message }}</div> @enderror
                     </div>
                     <div class="col-md-6">
                         <button type="submit" class="btn btn-outline btn-primary" id="valideTransaction">Valider</button>
                     </div>
                 </div>
              </form>
          </div>
           <table class="table table-bordered">
               <thead>
               <tr>
                   <th scope="col">#</th>
                   <th scope="col">Account N°</th>
                   <th scope="col">balance</th>
                   <th scope="col" colspan=1" class="text-center">Actions</th>
               </tr>
               </thead>
               <tbody>
               @foreach($allAccount as $key=>$account)
                   <tr>
                       <th scope="row">{{$key+1}}</th>
                       <td>{{$account->account_number}}</td>
                       <td>{{number_format((float)$account->balance,'0','.',',')}}</td>
                       <td><button class="btn btn-warning btn-outline" id="type_transaction"  wire:click="getAccountId({{$account->id}})">Transaction</button>
                   </tr>
               @endforeach
               </tbody>
           </table>
       </div>
       <div class="col-md-6">
           @livewire('partenaire')
       </div>
   </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#valideTransaction').hide();
        });
    </script>
@endpush
