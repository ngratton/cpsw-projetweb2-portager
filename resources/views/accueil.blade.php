@extends('master')
@section('contenu')

    <div class="container">
        <div class="row" id="header">
            <div class="col-9">
                <img src="images/portager_noir.svg">
            </div>
            <div class="col-3" id="signup">
                <a href="#">Déjà inscrit?</a>
                <button type="button" class="btn btn-secondary">Se connecter</button>
            </div>
        </div>
        <div class="row" id="banner">
            <div class="col">
                <h2>Nam urna erat,<br>tempor at auctor</h2>
                <button type="button" class="btn btn-primary">S'enregistrer</button>
            </div>
        </div>
    </div>
@endsection
