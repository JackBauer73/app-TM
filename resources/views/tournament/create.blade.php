@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><b>Création de la fiche de tournoi</b></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">

            <div class="card-body">
                <form method="POST" action="{{ route('tournament.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="visible">Visible</label>
                        <input id="visible" type="checkbox" class="form-control" name="visible">
                    </div>

                    <div class="form-group">
                        <label for="name">Nom du tournoi</label>
                        <input id="name" type="text" class="form-control" name="name" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="debut">Date du Tournoi :</label>
                        <input type="date" id="debut" name="debut" class="form-control" required
                            placeholder="Début">
                        <input type="date" id="fin" name="fin" class="form-control" required placeholder="Fin">
                    </div>

                    <div class="form-group">
                        <label for="inscrit_debut">Date d'inscription :</label>
                        <input type="date" id="inscrit_debut" name="inscrit_debut" class="form-control"
                            placeholder="Début" required>
                        <input type="date" id="inscrit_fin" name="inscrit_fin" class="form-control" placeholder="Fin"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="maxplayers">Nombres joueurs max :</label>
                        <input type="number" id="max_players" name="max_players" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="type_tournament">Type de tournoi :</label>
                        <select id="type_tournament" name="type_tournament" class="form-control" required>
                            <option value="0">Simple</option>
                            <option value="1">Simple + Double</option>
                            <option value="2">Double</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="max_simple">Nombre de Simple :</label>
                        <input type="number" id="max_simple" name="max_simple" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="max_double">Nombre de Double :</label>
                        <input type="number" id="max_double" name="max_double" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="poster">Affiche du tournoi</label>
                        <input type="file" class="form-control-file" id="poster" name="poster" accept="image/*">
                        @error('poster')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Ajoutez ici les autres champs du formulaire selon votre besoin -->

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Créer le tournoi</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
