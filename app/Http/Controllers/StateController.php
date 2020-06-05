<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $state = State::all();
        // $state = State::with('buy')->get();

       return response($state);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $state = new State;
        $state->state = $request->input('state');
        $state->description = $request->input('description');
        $state->save();
        return response('state added success full',201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit( $state)
    {
        // $location = Location::findOrfail($location);
        $state = State::findOrfail($state);

        return response( $state);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $state)
    {
        // $location = Location::findOrfail($location);
        // $location->update($request->all());

        $state = State::findOrfail($state);
        $state->update($request->all());
        return response('State updated sucessfull');
        // return response($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy( $state)
    {
        State::findOrfail($state)->delete();

        return response('State Deleted successfull');
    }
}
