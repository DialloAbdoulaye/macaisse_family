<div>
    <div class="card p-3 m-3">
        <div class="d-flex justify-content-start row">
            <div class=" bd-highlight col-md-6">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center">PARTICIPANTS</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped"  id="tableOne">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Matricule</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th colspan="3" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($participants as $key =>$participant)
                                    <tr>
                                        <td>{{$participant->matricule}}</td>
                                        <td>{{$participant->firstname}}</td>
                                        <td>{{$participant->lastname}}</td>
                                        <td><button class="float-right btn btn-info" wire:click="show({{$participant->id}})">
                                                <svg class="bi bi-eye-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                </svg>
                                            </button></td>
                                        <td>modifier</td>
                                        <td>supprimer</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{ $participants->links() }}
                        </div>
                    </div>
                </div>
                <!-- /.container -->
            </div>
            <div class=" bd-highlight col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center"> Détails participant</h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-4 p-4">
                                <img src="{{asset('images/avatar.png')}}" alt="avatar" class="img-thumbnail">
                                <p>A jour : <span><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
</svg></span></p>
                                <p>Amande: <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                                        <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
                                    </svg></p>
                            </div>
                            <div class="col-md-6 p-4">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Matricule <strong>{{$matricule}}</strong></li>
                                    <li class="list-group-item">Nom  <strong>{{$firstname}}</strong></li>
                                    <li class="list-group-item">Prénoms <strong>{{$lastname}}</strong></li>
                                    <li class="list-group-item">Téléphone <strong>{{$phone}}</strong></li>
                                </ul>
                                <button  class="btn btn-info btn-block"  data-toggle="modal" data-target=".bd-example-modal-lg">Voir transactions</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Séléctionez les participants</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">Tous coché <input type="checkbox" name="verser" id="cocher"></p>
                    <form action="{{route('transaction')}}" method="post">
                        <label for="montant">Montant</label> <input type="text"  name="montant" class="form-control">
                    <div class="mt-2 p-3">
                        <table class="table table-bordered table-striped"  id="tableOne">
                            <thead class="thead-dark">
                            <tr>
                                <th>Matricule</th>
                                <th>Coché</th>
                            </tr>
                            </thead>
                                    @csrf
                                    <tbody>
                                    @foreach($participants as $key =>$participant)
                                        <tr>
                                        <td>{{$participant->lastname}}</td>
                                        <td><input type="checkbox" name="values[]" value="{{$participant->id}}" checked></td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>

                    </div>
                        <button type="submit"  class="btn btn-success btn-block">valider</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="minusMontant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header  text-center bg-info text-light">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un retrait</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('retrait')}}" method="post">
                        @csrf
                        <label for="title">Titre</label> <input type="text"  name="title" class="form-control">
                        <label for="montant">Montant</label> <input type="text"  name="montant" class="form-control mb-4" >
                        <button type="submit"  class="btn btn-success btn-block ">valider</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
