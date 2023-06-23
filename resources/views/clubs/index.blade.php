@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tableaux de bord de {{ Auth::user()->name }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ Auth::user()->name }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tournaments</h3>
                </div>
                <!-- ./card-header -->
                <div class="card-body">
                    @if (count(auth()->user()->tournaments) > 0)
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Visible</th>
                                <th>Date</th>
                                <th>Poster</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(auth()->user()->tournaments as $tournament)
                            <tr data-widget="expandable-table" aria-expanded="false">
                                <td>{{ $tournament->id }}</td>
                                <td>{{ $tournament->name }}</td>
                                <td>{{ $tournament->visible ? 'Oui' : 'Non' }}</td>
                                <td>{{ \Carbon\Carbon::parse($tournament->debut)->format('d/m/Y') }}</td>
                                <td>
                                    @if($tournament->poster)
                                    <img src="{{ $tournament->poster }}" alt="Poster" width="50">
                                    @endif
                                </td>
                            </tr>
                            <tr class="expandable-body">
                                <td colspan="5">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Date</th>
                                                <th>Fin de pointage</th>
                                                <th>Prix</th>
                                                <th>Type de Tableau</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tournament->tableaux as $tableau)
                                            <tr style="background-color: {{ $tableau->colors }};">
                                                <td>{{ $tableau->nom_tableau }}</td>
                                                <td>{{ $tableau->date }}</td>
                                                <td>{{ $tableau->heure }}</td>
                                                <td>{{ $tableau->prix_tournoi }}€</td>
                                                <td>{{ $tableau->type_tableau ? 'Simple' : 'Double' }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>Aucun tournoi créé.</p>
                    @endif
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.content-wrapper -->
@endsection