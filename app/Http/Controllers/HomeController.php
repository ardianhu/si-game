<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function game()
    {
        $logged = auth()->user();
        // dd($loged);
        return view('clients.game', compact('logged'));
    }
}
