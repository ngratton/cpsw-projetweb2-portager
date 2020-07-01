@extends('admin.master')

@section('title')
    Administation | Portager
@endsection

@section('content')

    <div class="row mt-5 mb-3">
        <div class="col">
        <h2>Tableau de bord</h2>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md">
            <div class="dashboard-cluster">
                <h5>Utilisateurs</h5>
                <div class="flex flex-column align-items-center">
                    <span>Total</span>
                    <span class="lg-num">{{ $total_users }}</span>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="dashboard-cluster">
                <h5>Plants</h5>
                <div class="flex flex-column align-items-center">
                    <span>Total</span>
                    <span class="lg-num">{{ $total_plants }}</span>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="dashboard-cluster">
                <h5>Échanges</h5>
                <div class="flex flex-column align-items-center">
                    <span>Total</span>
                    <span class="lg-num">{{ $total_echanges }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md">
            <div class="dashboard-cluster">
                <h5>Visites</h5>
                <div class="flex flex-column align-items-center">
                    <span>Total</span>
                    <span class="lg-num">{{ $page_populaire }}</span>
                </div>
            </div>
        </div>
    </div>

@endsection
