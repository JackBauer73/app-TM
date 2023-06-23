<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\Tableau;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests\StoreTournamentRequest;
use App\Http\Requests\UpdateTournamentRequest;
use Illuminate\Support\Facades\Validator;



class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()


    {
        $tournaments = Tournament::all();
        return view('tournaments.index', compact('tournaments'));   
        // return view('tournament.index')->with(['tournaments' => Tournament::all(), 'users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tournament.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Créer une nouvelle instance du modèle Tournament avec les données validées
        $tournament = new Tournament();


        $tournament->visible = boolval($request->input('visible'));
        $tournament->name = $request->input('name');
        $tournament->debut = $request->input('debut');
        $tournament->fin = $request->input('fin');
        $tournament->inscrit_debut = $request->input('inscrit_debut');
        $tournament->inscrit_fin = $request->input('inscrit_fin');
        $tournament->type_tournament = $request->input('type_tournament');
        $tournament->max_simple = $request->input('max_simple');
        $tournament->max_double = $request->input('max_double');
        $tournament->poster = $request->input('poster');
        $tournament->user_id = auth()->user()->id; // Utilisez l'ID de l'utilisateur connecté pour lier le tournoi au club


        // Traitement de la validation du champs poster

        $validator = Validator::make($request->all(), [
            // Vos autres règles de validation
            'poster' => 'sometimes|image|dimensions:min_width=800,min_height=800',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Téléchargement de l'image
        if ($request->hasFile('poster')) {
            $poster = $request->file('poster');
            $posterPath = $poster->store('poster', 'public');

            // Enregistrez le chemin de l'image dans votre base de données, par exemple :
            $tournament->poster = $posterPath;

            // Enregistrer le tournoi dans la base de données
        }
        $tournament->save(); // Enregistrez d'abord le tournoi dans la base de données

        // Gestion des tableaux dans la base de donnée
        // $visible_tab = $request->visible_tab;
        $nom_tableau = $request->nom_tableau;
        $max_joueurs = $request->max_joueurs;
        $prix_tournoi = $request->prix_tournoi;
        $heure = $request->heure;
        $date = $request->date;
        $points_mini = $request->points_mini;
        $points_max = $request->points_max;
        $type_tableau = $request->type_tableau;
        $colors = $request->colors;
        $tournament_id = $tournament->id; // Utilisez l'ID du tournoi connecté pour lier le tableau

        for ($i = 0; $i < count($nom_tableau); $i++) {
            $tableau = new Tableau();
            $tableau->visible_tab = 0;
            $tableau->nom_tableau = $nom_tableau[$i];
            $tableau->max_joueurs = $max_joueurs[$i];
            $tableau->prix_tournoi = $prix_tournoi[$i];
            $tableau->heure = $heure[$i];
            $tableau->date = $date[$i];
            $tableau->points_mini = $points_mini[$i];
            $tableau->points_max = $points_max[$i];
            $tableau->type_tableau = $type_tableau[$i];
            $tableau->colors = $colors[$i];
            $tableau->tournament_id = $tournament->id;
            // dd($request)->all();
            // Utilisez l'ID du tournoi connecté pour lier le tableau
            $tableau->save(); // Enregistrez le tableau dans la base de données
        }

        return redirect()->route('club')->with('success', 'Fiche de tournoi créée avec succès!');
        // return redirect()->route('club')->with('success', 'Le tournoi a été créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $tournaments = Tournament::all();
        // return view('players.index', ['tournaments' => $tournaments]);



        $tournaments = auth()->user()->tournaments()->with('tableaux')->get();
        return view('clubs.index', compact('tournaments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tournament $tournament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTournamentRequest $request, Tournament $tournament)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tournament $tournament)
    {
        //
    }
}
