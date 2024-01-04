<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Http\Requests\StoreCompetitionRequest;

class CompetitionController extends Controller
{

    public function index()
    {
      $competitions = Competition::all();
      return response()->json([
        'status' => true,
        'data' => $competitions
      ]);
    }

    public function store(StoreCompetitionRequest $request)
    {
      $competition = Competition::create($request->all());
      return response()->json([
          'status' => true,
          'message' => "Competition Created successfully!",
          'data' => $competition
      ], 200);
    }

    public function show(Competition $competition)
    {
      return response()->json([
        'status' => true,
        'data' => $competition->load(['seasons.games','seasons.rosters'])
      ]);
    }

    public function seasons(Competition $competition)
    {
      return response()->json([
        'status' => true,
        'data' => $competition->with('seasons')->get(),
      ]);
    }

    public function update(StoreCompetitionRequest $request, Competition $competition)
    {  
      $competition->update($request->all());
      return response()->json([
          'status' => true,
          'message' => "Competition Updated successfully!",
          'data' => $competition
      ], 200);
    }

    public function destroy(Competition $competition)
    {
      $competition->delete();
      return response()->json([
          'status' => true,
          'message' => "Competition Deleted successfully!",
      ], 200);
    }
}
