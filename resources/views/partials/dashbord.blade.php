<div class="row p-3">
    <div class="col-md-3">
        <div class="card" id="grad">
            <div class="card-header text-center">
                CAISSE
            </div>
            <div class="card-body">
                <h2>30000</h2>
                <p>Dernière mise à jour: 24-07-2020</p>
            </div>
        </div>
    </div><div class="col-md-3">
        <div class="card" id="versement">
            <div class="card-header text-center">
               VERSEMENTS
            </div>
            <div class="card-body">
                <h2>100000</h2>
                    <div class="input-group mb-3 " style="z-index: 6">
                        <div class="input-group-append">
                            <button class="btn btn-danger btn-block" type="submit" data-toggle="modal" data-target="#exampleModal">Ajouter</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card" id="depense">
            <div class="card-header text-center">
               Depenses
            </div>
            <div class="card-body">
                <h2>70000</h2>
                <form action="{{route('addmontant')}}"  method="post">
                    <div class="input-group mb-3 " style="z-index: 6">
                        <input type="number" name="montant" class="form-control" required placeholder="Montant" aria-label="" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-danger" type="submit" id="button-addon2">Ajouter</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card" id="participant">
            <div class="card-header text-center">
                Participants
            </div>
            <div class="card-body">
                <h2>{{participant}}</h2>
            </div>
        </div>
    </div>
    </div>
</div>



