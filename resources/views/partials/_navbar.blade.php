<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="#"> <img src="{{asset('images/logo.png')}}" alt="logo" srcset="" height="100px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Acceuil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('partenaires')}}">Partenaires</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Apropos</a>
            </li>
        </ul>

    </div>
</nav>
