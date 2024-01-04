<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Roster;
use App\Http\Requests\StoreRosterRequest;

class RosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rosters = Roster::all();
      return response()->json([
        'status' => true,
        'data' => $rosters
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRosterRequest $request)
    {
      $roster = Roster::create($request->all());
      $roster->players()->createMany($request->players);

      return response()->json([
          'status' => true,
          'message' => "Roster Created successfully!",
          'data' => $roster,
      ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Roster  $roster
     * @return \Illuminate\Http\Response
     */
    public function show(Roster $roster)
    {
      return response()->json([
        'status' => true,
        'data' => $roster->load(['players', 'season.competition'])
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roster  $roster
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRosterRequest $request, Roster $roster)
    {
      $roster->update($request->all());
      return response()->json([
          'status' => true,
          'message' => "Roster Updated successfully!",
          'data' => $roster
      ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roster  $roster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roster $roster)
    {
      $roster->delete();
      return response()->json([
          'status' => true,
          'message' => "Roster Deleted successfully!",
      ], 200);
    }
}
