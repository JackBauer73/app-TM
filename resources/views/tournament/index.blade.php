@extends('layouts.app')


@section('content')
    <div class="card-primary">
        <div class="card-header" style="background: url('/images/photo1.png') center center;">

            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);">
            </div>

            <h3 style="text-align: center;">Tournoi {{ $tournament->name }}</h3>

            @php
                $debut = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $tournament->debut)->format('Y-m-d');
                $fin = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $tournament->fin)->format('Y-m-d');
                
            @endphp
            <h3 style="text-align: center;">du {{ \Carbon\Carbon::parse($debut)->format('d F') }} au
                {{ \Carbon\Carbon::parse($fin)->format('d F Y') }}</h3>
        </div>

    </div>

    <!-- *** Statistique du tournoi *** -->

    <div class="content mb-2 mt-4">
        {{-- <h5 class="mb-2 mt-4">Small Box</h5> --}}
        <div class="row">
            <div class="col-lg-4 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>
                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>


            <div class="col-lg-4 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>44</h3>
                        <p>Nombre d'inscrits</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="#" type="button" class="small-box-footer" data-toggle="modal" data-target="#modal-lg">
                        Ajouter un participant<i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>65</h3>
                        <p>Unique Visitors</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <a href="#" ype="button" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <!------------------------------------------------------->
    <!----------- Fiche Modal Ajout d'un joueur ------------->
    <!------------------------------------------------------->

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title">Ajout d'un joueur</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('createPlayer', $tournament->name) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="input-group mb-3">
                            <input type="number" class="form-control" name="number" placeholder="Numbero de licence"
                                id="number" value="{{ old('number') }}" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-id-card"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Full name">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!------------------------------------------------------->
    <!----- Liste des Tableau par journée de tournoi -------->
    <!------------------------------------------------------->

    @foreach ($tournament->tableaux->sortBy('date')->groupBy('date') as $date => $tableaux)
        <div class="content mb-2 mt-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $date }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                            <div id="accordion">
                                @foreach ($tableaux as $tableau)
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse"
                                                    href="#collapse{{ $tableau->id }}">
                                                    {{ $tableau->nom_tableau }}</a>
                                            </h4>
                                        </div>
                                        <div id="collapse{{ $tableau->id }}" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                m aesthetic synth nesciunt you probably haven't heard of
                                                them
                                                accusamus
                                                labore sustainable VHS.
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    @endforeach




    <!-- /.card -->
@endsection
