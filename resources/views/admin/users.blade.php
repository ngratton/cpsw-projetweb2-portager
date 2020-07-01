@extends('admin.master')

@section('title')
    Tous les utilisateurs | Administation | Portager
@endsection

@section('content')

    <div class="row mt-5 mb-3">
        <div class="col">
        <h2>Tous les utilisateurs</h2>
        </div>
    </div>

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

            @foreach ($users as $user)
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
            @endforeach

        </tbody>
      </table>
@endsection
