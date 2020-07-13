<div class="col-md-12" id="addParticipant">

  <div class="card ">
      <div class="card-header">
         <div class="row">
             <div class="col-md-6"> <h3 class="text-center">Ajouter un participant</h3>
               </div>
             <div class="col-md-6">  <button class="btn btn-warning float-right" id="hidenForm">Fermer</button></div>
         </div>
      </div>
      <div class="card-body">
          <div wire:loading wire:target="addParticipant" class="alert alert-warning text-center">
              Ajout en cours...
          </div>
          @if(session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{session('success')}}
              </div>
          @endif
          <form class="form-group" enctype="multipart/form-data"  wire:submit.prevent="addParticipant">
             <div class="row">
                 <div class="col-md-5">
                   <div class="row">
                       <div class="col-md-4"><label>Nom:</label></div> <div class="col-md-7">
                           <input type="text" class="form-control"  wire:model="firstname">
                       @error('firstname') <div class="error alert alert-danger mt-2">{{ $message }}</div> @enderror
                       </div>
                   </div>
                 </div>
                 <div class="col-md-5">
                     <div class="row">
                         <div class="col-md-4"><label>prénoms:</label></div>
                         <div class="col-md-7"><input type="text"  class="form-control" wire:model="lastname">
                             @error('lastname') <div class="error alert alert-danger mt-2">{{ $message }}</div> @enderror
                         </div>
                     </div>
                 </div>
             </div>

             <div class="row mt-3">
                 <div class="col-md-5">
                     <div class="row">
                         <div class="col-md-4"><label>Phone:</label></div> <div class="col-md-7">
                             <input type="tel" class="form-control" wire:model="phone">

                                @error('phone') <div class="error alert alert-danger mt-2">{{ $message }}</div> @enderror
                             </div>
                     </div>
                 </div>
                 <div class="col-md-5">
                     <div class="row">
                         <div class="col-md-4"><label>avatar:</label></div> <div class="col-md-7"><input type="file" class="form-control" wire:model="avatar"></div>
                     </div>

                 </div>

             </div>
              <div class="mt-3">
                  <button type="submit" class="btn btn-outline btn-block btn-info">Enregistrer</button>
              </div>
          </form>
      </div>
  </div>
</div>
