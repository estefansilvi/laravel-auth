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

    }

    /**
     * Display the specified resource.  PUBLICVIEW
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource. PRIVATEVIEW
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.  PRIVATEVIEW
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {

    }

    /**
     * Remove the specified resource from storage.  PRIVATEVIEW
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {

    }
}
