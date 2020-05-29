<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location = Location::orderBy('created_at', 'desc')->get();
        // $location = Location::all();
        
        return response($location);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $location = new Location;
        $location->name = $request->input('name');
        $location->address = $request->input('address');
        $location->nameManager = $request->input('nameManager');
        $location->save();

        return response('location added success full',201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($location)
    {
        $location = Location::findOrfail($location);

        return response( $location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $location)
    {
        $location = Location::findOrfail($location);
        $location->update($request->all());
        return response('Location updated sucessfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy( $location)
    {
        Location::findOrfail($location)->delete();

        return response('Location Deleted successfull');
    }
}
