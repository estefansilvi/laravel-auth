<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Game;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.   PUBLICVIEW
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return redirect()->route('games.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response  PRIVATEVIEW
     */
    public function create()
    {
       return view('create');
    }

    /**
     * Store a newly created resource in storage.  PRIVATEVIEW
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $games=new Game();
        $games->fill($data);
        $games->save();
        $gameStored=Game::orderBy('id','desc')->first();
        return redirect()->route('games.show',$gameStored);
    }

    /**
     * Display the specified resource.  PUBLICVIEW
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return redirect()->route('games.show.public',compact('game'));
    }

    /**
     * Show the form for editing the specified resource. PRIVATEVIEW
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view('/edit',compact('game'));
    }

    /**
     * Update the specified resource in storage.  PRIVATEVIEW
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Game $game)
    {
        $data = $request->all();
        $game->update($data);

        return redirect()->route('games.show',compact('game'));
    }

    /**
     * Remove the specified resource from storage.  PRIVATEVIEW
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.home');
    }
}
