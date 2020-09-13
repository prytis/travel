<?php

namespace App\Http\Controllers;

use App\Town;
use Illuminate\Http\Request;

class TownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('town.index',['towns' => Town::orderBy('title')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = \App\Country::orderBy('title')->get();
        return view('town.create', ['countries' => $countries]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $town = new Town();
        $town->fill($request->all());
        $town->save();
    return redirect()->route('town.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function show(Town $town)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function edit(Town $town)
    {
        $countries = \App\Country::orderBy('title')->get();
        return view('town.edit', ['town' => $town],['countries' => $countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Town $town)
    {
        $town->fill($request->all());
        $town->save();
    return redirect()->route('town.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function destroy(Town $town)
    {
        $town->delete();
        return redirect()->route('town.index');
    }
}
