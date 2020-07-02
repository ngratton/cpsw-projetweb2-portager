@extends('admin.master')

@section('title')
    {{ $user->first_name }} {{ $user->last_name }} | Administation | Portager
@endsection

@section('content')

    <div class="row mt-5 mb-3">
        <div class="col">
        <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>
        </div>
    </div>

    <h4>Information utilisateur</h4>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Type</th>
            <th scope="col">Description</th>
            <th scope="col">Photo</th>
            <th scope="col">Visites</th>
            <th scope="col">Notes</th>
            <th scope="col">Actif?</th>
            <th scope="col">Partagé?</th>
            <th scope="col">Lien Portager</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plants as $plant)
                <tr>
                    <th scope="row">{{ $plant->id }}</th>
                    <td>{{ $plant->type_id }}</td>
                    <td>{{ $plant->description }}</td>
                    <td><img src="{{ $plant->photo_mini }}" style="max-width: 60px;"/></td>
                    <td>{{ $plant->plants_visits }}</td>
                    <td>{{ $plant->note_moy }}</td>
                    <td>{{ date('d/m/Y H:i', strtotime($plant->created_at)) }}</td>
                    <td>
                        @if($plant->est_actif == 1)
                            Oui
                        @else
                            Non
                        @endif
                    </td>
                    <td>
                        @if($plant->est_partagé == 1)
                            Oui
                        @else
                            Non
                        @endif
                    </td>
                    <td scope="col">
                        <a href="/plant/{{ $plant->id }}" target="_blank">
                            Voir plant
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Profil</h4>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Photo</th>
            <th scope="col">Bio</th>
            <th scope="col">Jardine depuis</th>
            <th scope="col">Type de jardinier</th>
            <th scope="col">Visites sur le profil</th>
            <th scope="col">Noye moyenne</th>
            <th scope="col">Date création</th>
            <th scope="col">Statut</th>
            <th scope="col">Lien</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ $profile->id }}</th>
                <td><img src="{{ $profile->photo_mini }}" style="max-width: 100px"></td>
                <td>{{ $profile->bio }}</td>
                <td>{{ $profile->jardine_depuis }}</td>
                <td>{{ $profile->tags_jardiniers }}</td>
                <td>{{ $profile->profile_visits }}</td>
                <td>{{ $profile->note_moy }}</td>
                <td>{{ date('d/m/Y H:i', strtotime($profile->created_at)) }}</td>
                <td>
                    @if($user->est_actif == 1)
                        <button class="btn btn-danger">Désactiver</button>
                    @else
                        <button class="btn btn-success">Réactiver</button>
                    @endif
                </td>
                <td scope="col">
                    <a href="/profile/{{ $user->id }}" target="_blank">
                        Voir profile
                    </a>
                </td>
            </tr>
        </tbody>
    </table>

    <h4>Potager</h4>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Adresse complète</th>
            <th scope="col">Image</th>
            <th scope="col">Type de potager</th>
            <th scope="col">Visites</th>
            <th scope="col">Note moyenne</th>
            <th scope="col">Création</th>
            <th scope="col">Status</th>
            <th scope="col">Lien Portager</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ $potager->id }}</th>
                <td>
                    <p>{{ $potager->address_1 }}</p>
                    <p>{{ $potager->address_2 }}</p>
                    <p>{{ $potager->city }}, {{ $potager->prov }}</p>
                    <p>{{ $potager->country }}</p>
                    <p>{{ $potager->postal_code }}</p>
                </td>
                <td><img src="{{ $potager->photos_path }}" /></td>
                <td>{{ $potager->tags_potagers }}</td>
                <td>{{ $user->potager_visits }}</td>
                <td>{{ $user->note_moy }}</td>
                <td>{{ date('d/m/Y H:i', strtotime($user->created_at)) }}</td>
                <td>
                    @if($user->est_actif == 1)
                        <button class="btn btn-danger">Désactiver</button>
                    @else
                        <button class="btn btn-success">Réactiver</button>
                    @endif
                </td>
                <td scope="col">
                    <a href="/potager/{{ $potager->id }}" target="_blank">
                        Voir potager
                    </a>
                </td>
            </tr>
        </tbody>
    </table>

    <h4>Plants</h4>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Courriel</th>
            <th scope="col">Rôle</th>
            <th scope="col">Inscription</th>
            <th scope="col">Statut</th>
            <th scope="col">Profil</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->user_role }}</td>
                <td>{{ date('d/m/Y H:i', strtotime($user->created_at)) }}</td>
                <td>
                    @if($user->est_actif == 1)
                        <button class="btn btn-danger">Désactiver</button>
                    @else
                        <button class="btn btn-success">Réactiver</button>
                    @endif
                </td>
                <td scope="col">
                    <a href="/profile/{{ $user->id }}" target="_blank">
                        Voir profile
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
