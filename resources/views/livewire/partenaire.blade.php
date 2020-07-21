<div>
   <div class="card" id="addPartenaire">
       <div class="card-header text-center bg-info text-light">
           Ajouteer un partenaire
       </div>
       <div class="card-body">
           <div wire:loading wire:target="addPartenaire" class="alert alert-warning text-center">
               Ajout en cours...
           </div>
           @if(session()->has('success'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                   {{session('success')}}
               </div>
           @endif
           <form  wire:submit.prevent="addPartenaire" enctype="multipart/form-data">
               @csrf
               <div class="form-group">
                   <label for="name">Nom</label>
                   <input type="text" class="form-control" wire:model="firstname" id="name" aria-describedby="emailHelp" placeholder="Entrer votre nom">
                   @error('firstname') <div class="error alert alert-danger mt-2">{{ $message }}</div> @enderror
               </div>
               <div class="form-group">
                   <label for="exampleInputPassword1">Prenom</label>
                   <input type="text" class="form-control"  wire:model="lastname" id="" placeholder="prenom">
                   @error('lastname') <div class="error alert alert-danger mt-2">{{ $message }}</div> @enderror
               </div>
               <div class="form-group">
                   <label for="phone " >Téléphone</label>
                   <input type="tel" wire:model="phone" class="form-control" id="" placeholder="telephone">
                   @error('phone') <div class="error alert alert-danger mt-2">{{ $message }}</div> @enderror
               </div>
               <div class="form-group">
                   <label for="amount">Montant</label>
                   <input type="number"  wire:model="amount" class="form-control" id="" placeholder="Montant">
                   @error('amount') <div class="error alert alert-danger mt-2">{{ $message }}</div> @enderror
               </div>
               <button type="submit" class="btn btn-primary">Ajouter</button>
           </form>
       </div>
   </div>
</div>
