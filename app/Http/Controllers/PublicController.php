<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
class DashboardController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
        return view('index',compact('games'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return view('/product',compact('game'));
    }
}
