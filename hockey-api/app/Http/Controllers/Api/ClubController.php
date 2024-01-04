<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Http\Requests\StoreClubRequest;

class ClubController extends Controller
{

    public function index()
    {
        $clubs = Club::all();
        return response()->json([
          'status' => true,
          'data' => $clubs
        ]);
    }

    public function store(StoreClubRequest $request)
    {
        $club = Club::create($request->all());
        return response()->json([
            'status' => true,
            'message' => "Club Created successfully!",
            'data' => $club
        ], 200);
    }

    public function show(Club $club)
    {
        return response()->json([
          'status' => true,
          'data' => $club->load('teams.rosters')
        ]);
    }

    public function update(StoreClubRequest $request, Club $club)
    {        
        $club->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "Club Updated successfully!",
            'data' => $club
        ], 200);
    }

    public function destroy(Club $club)
    {
      $club->delete();
      return response()->json([
          'status' => true,
          'message' => "Club Deleted successfully!",
      ], 200);
    }
}
