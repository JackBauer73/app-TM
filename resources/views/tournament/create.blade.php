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
        <!-- Content BS Stepper -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Fiche Tournoi</h3>
                        </div>
                        <form method="POST" action="{{ route('tournament.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body p-0">
                                <div class="bs-stepper">
                                    <div class="bs-stepper-header" role="tablist">
                                        <!-- your steps here -->
                                        <div class="step" data-target="#informations-part">
                                            <button type="button" class="step-trigger" role="tab"
                                                aria-controls="informations-part" id="informations-part-trigger">
                                                <span class="bs-stepper-circle">1</span>
                                                <span class="bs-stepper-label">Informations</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#parametres-part">
                                            <button type="button" class="step-trigger" role="tab"
                                                aria-controls="parametres-part" id="parametres-part-trigger">
                                                <span class="bs-stepper-circle">2</span>
                                                <span class="bs-stepper-label">Paramètres</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#tableaux-part">
                                            <button type="button" class="step-trigger" role="tab"
                                                aria-controls="tableaux-part" id="tableaux-part-trigger">
                                                <span class="bs-stepper-circle">3</span>
                                                <span class="bs-stepper-label">Les Tableaux</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-content">
                                        <!-- your steps content here -->
                                        <div id="informations-part" class="content" role="tabpanel"
                                            aria-labelledby="informations-part-trigger">

                                            <!-- Champs visible -->
                                            <div class="row justify-content-center">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" name="visible" class="custom-control-input"
                                                            id="customSwitch3">
                                                        <label class="custom-control-label" data-toggle="tooltip"
                                                            data-placement="top"
                                                            title="Si vous voulez que le tournoi soit visible de tout le monde"
                                                            for="customSwitch3">Visible</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Champs nom tournoi -->
                                            <div class="row justify-content-center">
                                                <div class="form-group col-5">
                                                    <label>Nom du tournoi</label>
                                                    <input id="name" type="text" class="form-control" name="name"
                                                        required autofocus placeholder="Le Nom du Tournoi">
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="debut">Date du Tournoi</label>
                                                        <div class="form-group">
                                                            <input type="date" id="debut" name="debut"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="date" id="fin" name="fin"
                                                                class="form-control" required placeholder="Fin">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="debut">Date d'inscription</label>
                                                        <div class="form-group">
                                                            <input type="date" id="inscrit_debut" name="inscrit_debut"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="date" id="inscrit_fin" name="inscrit_fin"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <button class="btn btn-primary"
                                                onclick="validateInformationsStep()">Suivant</button>
                                        </div>
                                        <div id="parametres-part" class="content" role="tabpanel"
                                            aria-labelledby="parametres-part-trigger">
                                            <div class="row justify-content-center">
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label for="type_tournament">Type de tournoi</label>
                                                        <select id="type_tournament" name="type_tournament"
                                                            class="form-control" required>
                                                            <option value="">--Selectionnez--</option>
                                                            <option value="0">Simple</option>
                                                            <option value="1">Simple + Double</option>
                                                            <option value="2">Double</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label for="max_simple">Nombre de Simple</label>
                                                        <input type="number" id="max_simple" name="max_simple"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="max_double">Nombre de Double</label>
                                                        <input type="number" id="max_double" name="max_double"
                                                            class="form-control" required>
                                                    </div>
                                                </div>


                                            </div>
                                            <button class="btn btn-primary" onclick="stepper.previous()">Retour</button>
                                            <button class="btn btn-primary" onclick="stepper.next()">Suivant</button>

                                        </div>
                                        <div id="tableaux-part" class="content" role="tabpanel"
                                            aria-labelledby="tableaux-part-trigger">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="form-group child-repeater-table">
                                                        <table class="table table-bordered table-responsive"
                                                            id="table">
                                                            <thead>
                                                                <tr>
                                                                    {{-- <th>Visible</th> --}}
                                                                    <th>Nom</th>
                                                                    <th>Date</th>
                                                                    <th>Heure</th>
                                                                    <th>Prix</th>
                                                                    <th>Joueurs max</th>
                                                                    <th>Type Tableau</th>
                                                                    <th>Points Mini.</th>
                                                                    <th>Points Max.</th>
                                                                    <th>Couleurs</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tableBody">
                                                                <tr>
                                                                    {{-- <td>
                                                                        <input type="checkbox" checked
                                                                            data-toggle="toggle" name="visible_tab[]"
                                                                            id="visible_tab" data-onstyle="primary"
                                                                            data-onstyle="danger">
                                                                    </td> --}}
                                                                    <td> <input id="nom_tableau" type="text"
                                                                            class="form-control" name="nom_tableau[]"
                                                                            required autofocus></td>
                                                                    <td> <input type="date" id="debut"
                                                                            name="date[]" class="form-control" required>
                                                                    </td>
                                                                    <td> <input type="text" id="heure"
                                                                            name="heure[]" class="form-control" required
                                                                            placeholder="Fin">
                                                                    </td>
                                                                    <td> <input type="number" id="prix_tournoi"
                                                                            name="prix_tournoi[]" class="form-control"
                                                                            required></td>
                                                                    <td> <input type="number" id="max_joueurs"
                                                                            name="max_joueurs[]" class="form-control"
                                                                            required></td>
                                                                    <td> <select id="type_tableau" name="type_tableau[]"
                                                                            class="form-control" required>
                                                                            <option value="0">Simple</option>
                                                                            <option value="1">Double</option>
                                                                        </select></td>
                                                                    <td> <input type="number" id="points_mini"
                                                                            name="points_mini[]" class="form-control"
                                                                            required></td>
                                                                    <td> <input type="number" id="points_max"
                                                                            name="points_max[]" class="form-control"
                                                                            required>
                                                                    </td>
                                                                    <td>
                                                                        <div class="input-group">
                                                                            <input type="text" name="colors[]"
                                                                                class="form-control input-lg"
                                                                                value="#902100" />
                                                                            <span class="input-group-append">
                                                                                <span
                                                                                    class="input-group-text colorpicker-input-addon"><i></i></span>
                                                                            </span>
                                                                        </div>
                                                                    </td>

                                                                    <td><button type="button" name="add"
                                                                            class="btn btn-success"
                                                                            onclick="addRow()">+</button>
                                                                        {{-- <button type="button" name="remove" class="btn btn-danger"
                                                        onclick="removeRow(this)">-</button> --}}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" onclick="stepper.previous()">Retour</button>
                                            <button type="submit" class="btn btn-primary">Créer le tournoi</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                Visit <a href="">bs-stepper
                                    documentation</a> for
                                more examples and information about the plugin.
                            </div>
                        </form>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- script sur le type de tournoi -->
    <script>
        var typeTournament = document.getElementById('type_tournament');
        var maxSimple = document.getElementById('max_simple');
        var maxDouble = document.getElementById('max_double');
        maxSimple.disabled = true;
        maxDouble.disabled = true;

        typeTournament.addEventListener('change', function() {
            if (typeTournament.value === '0') {
                maxSimple.disabled = false;
                maxDouble.disabled = true;
                maxDouble.value = ''; // Vider le champ "Nombre de Double"
            } else if (typeTournament.value === '2') {
                maxSimple.disabled = true;
                maxDouble.disabled = false;
                maxSimple.value = ''; // Vider le champ "Nombre de Simple"
            } else {
                maxSimple.disabled = false;
                maxDouble.disabled = false;
            }
        });

        function validateInformationsStep() {
            var debut = document.getElementById('debut').value;
            var fin = document.getElementById('fin').value;
            var inscritDebut = document.getElementById('inscrit_debut').value;
            var inscritFin = document.getElementById('inscrit_fin').value;

            // Validation pour la date du tournoi
            var currentDate = new Date().toISOString().split('T')[0];
            if (debut < currentDate) {
                alert("La date de début du tournoi doit être supérieure à la date actuelle.");
                return;
            }
            if (debut > fin) {
                alert("La date de fin du tournoi doit être supérieure à la date de début.");
                return;
            }

            var tournoiDuree = (new Date(fin) - new Date(debut)) / (1000 * 3600 * 24);
            if (tournoiDuree > 3) {
                alert("Attention la durée du tournoi est supérieure à 4 jours.");
            }

            // Validation pour la date d'inscription
            if (inscritDebut > inscritFin) {
                alert("La date de fin d'inscription doit être supérieure à la date de début d'inscription.");
                return;
            }

            if (inscritFin > fin) {
                alert("La date de fin d'inscription ne peut pas dépasser la date de fin du tournoi.");
                return;
            }

            // Toutes les validations passent, passer à l'étape suivante
            stepper.next();
        };
    </script>
@endsection
