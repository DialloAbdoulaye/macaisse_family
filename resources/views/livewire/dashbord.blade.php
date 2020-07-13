<div>
    <div class="row p-3">
        <div class="col-md-3">
            <div class="card" id="grad">
                <div class="card-header text-center">
                    CAISSE
                </div>
                <div class="card-body text-center">
                    <h2>{{number_format($caisse,'0','.',',')}} <sub>Fcfa</sub></h2>
                    <p>Dernière mise à jour: 24-07-2020</p>
                </div>
            </div>
        </div><div class="col-md-3">
            <div class="card" id="versement">
                <div class="card-header text-center">
                    VERSEMENTS
                </div>
                <div class="card-body text-center">
                    <h2>{{number_format($versement,'0','.',',')}} <sub>Fcfa</sub></h2>
                    <div class="input-group mb-3 " style="z-index: 6">
                        <div class="input-group-append">
                            <button class="btn btn-secondary btn-block" type="submit" data-toggle="modal" data-target="#exampleModal">Ajouter</button>
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
                    <h2>{{number_format($retrait,'0','.',',')}} <sub>Fcfa</sub></h2>
                    <div class="input-group mb-3 " style="z-index: 6">
                        <div class="input-group-append">
                            <button class="btn btn-warning btn-block" type="submit" data-toggle="modal" data-target="#minusMontant">Ajouter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" id="participant">
                <div class="card-header text-center">
                    Participants
                </div>
                <div class="card-body text-center">
                    <h2>{{$participant}} <sub>{{$plural}}</sub></h2>
                    <div class="input-group mb-3 " style="z-index: 6">
                        <div class="input-group-append">
                            <button class="btn btn-secondary btn-block" type="submit" id="showForm">Ajouter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




</div>
