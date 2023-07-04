<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\User;
use App\Models\Dossard;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use Illuminate\Http\Request;


class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('players.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Créer un nouvel utilisateur (joueur)
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->number = $request->input('number');
        $user->role = 'Player';
        $user->save();

        // Récupérer le dernier numéro de dossard pour le tournoi donné
        $lastDossard = Dossard::where('tournament_id', $request->input('tournament_id'))
            ->orderByDesc('numero_dossard')
            ->first();

        $numeroDossard = 1;
        if ($lastDossard) {
            $numeroDossard = $lastDossard->numero_dossard + 1;
        }

        // Créer un dossard associé au joueur et au tournoi
        $dossard = new Dossard();
        $dossard->tournament_id = $request->input('tournament_id');
        $dossard->player_id = $user->id;
        $dossard->numero_dossard = $numeroDossard;
        $dossard->etat = 0;
        $dossard->save();

        // Rediriger vers une autre page après la création
        return redirect()->route('tournament_show');
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlayerRequest $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        //
    }
}
