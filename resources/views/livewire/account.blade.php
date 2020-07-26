<div>
     <div class="row">
       <div class="col-md-6">
           <table class="table table-bordered">
               <thead class="bg-primary text-light">
               <tr>
                   <th scope="col">#</th>
                   <th scope="col">Account N°</th>
                   <th scope="col">balance</th>
                   <th scope="col" colspan=2" class="text-center">Actions</th>
               </tr>
               </thead>
               <tbody>
               @foreach($allAccount as $key=>$account)
                   <tr>
                       <th scope="row">{{$key+1}}</th>
                       <td>{{$account->account_number}}</td>
                       <td>{{number_format((float)$account->balance,'0','.',',')}}</td>
                       <td class="text-center"><button class="btn btn-primary" id="type_transaction"  wire:click="getAccountId({{$account->id}})" ><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                   <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4a.5.5 0 0 0-1 0v3.5H4a.5.5 0 0 0 0 1h3.5V12a.5.5 0 0 0 1 0V8.5H12a.5.5 0 0 0 0-1H8.5V4z"/>
                               </svg></button>
                       <td class="text-center">
                           <a class="btn btn-info" href="{{route('detail',['id'=>$account->id])}}" id="showDetail">
                               <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                   <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                   <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                               </svg>
                           </a></td>
                   </tr>
               @endforeach
               </tbody>
           </table>
       </div>
         <div class="col-md-6">
             <div class="border b-2 p-4">
                 <div class="card-header">

                     <h5 class="text-center">Vous éffectuez une transaction sur le compte numéro: <span class="badge badge-info">{{$account_number}}</span></h5>
                 </div>
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
                 <form  wire:submit.prevent="addTransaction">
                     <div class="row p-2 m-2 rounded  border border-warning">
                         <div class="col-md-6">
                           {{--  <div class="mb-3 form-group">
                                 <select cass="form-control" id="type_transaction" wire:model="type_transaction">Quelle transactions voulez vous effectur?

                                 </select>
                                 @error('transaction_type') <div class="error alert alert-danger mt-2">{{ $message }}</div> @enderror
                             </div>--}}
                             <div class="form-group">
                                 <label for="exampleFormControlSelect2">Type de transaction</label>
                                 <select  class="form-control" id="exampleFormControlSelect2" wire:model="type_transaction">
                                     <option value="debiter" class="form-control" selected>Retrait</option>
                                     <option value="crediter"  class="form-control">Dépot</option>
                                 </select>
                                 @error('transaction_type') <div class="error alert alert-danger mt-2">{{ $message }}</div> @enderror
                             </div>
                             <input type="hidden" class="form-control" value="{{$account_id}}">
                             <input type="text" placeholder="23000" wire:model="transaction_amount" class="form-control">
                             @error('transaction_amount') <div class="error alert alert-danger mt-2">{{ $message }}</div> @enderror
                             <div class="mt-4">  <button type="submit" class="btn btn-outline btn-primary" id="valideTransaction">Valider</button></div>
                         </div>

                     </div>
                 </form>
         </div>
         </div>
     </div>

</div>
@push('scripts')
    <script>
        $(document).ready(function() {

            $('#valideTransaction').hide();
        });

        $('#showAddForm').click(function(){
            $('#addPartenaire').show();
            $('#transactions').hide();
        });
    </script>
@endpush
