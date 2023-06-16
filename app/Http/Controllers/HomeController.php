<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClubController;




class HomeController extends Controller
{
    //
    public function redirect()
    {
        $role = Auth::user()->role;
        // $role = 'Club';
        if ($role == 'Club') {
            return view('clubs.index');
        } else if ($role == 'Player') {
            return view('players.index');
        }
    }
}
