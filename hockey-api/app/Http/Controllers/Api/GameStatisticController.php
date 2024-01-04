<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GameStatistic;
use App\Http\Requests\StoreGameStatisticRequest;

class GameStatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $gameStatistics = GameStatistic::all();
      return response()->json([
        'status' => true,
        'data' => $gameStatistics
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGameStatisticRequest $request)
    {
      $gameStatistic = GameStatistic::create($request->all());
      return response()->json([
          'status' => true,
          'message' => "Game Statistic Created successfully!",
          'data' => $gameStatistic
      ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GameStatistic  $gameStatistic
     * @return \Illuminate\Http\Response
     */
    public function show(GameStatistic $gameStatistic)
    {
      return response()->json([
        'status' => true,
        'data' => $gameStatistic
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GameStatistic  $gameStatistic
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGameStatisticRequest $request, GameStatistic $gameStatistic)
    {
      $gameStatistic->update($request->all());
      return response()->json([
          'status' => true,
          'message' => "Game Statistic Updated successfully!",
          'data' => $gameStatistic
      ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GameStatistic  $gameStatistic
     * @return \Illuminate\Http\Response
     */
    public function destroy(GameStatistic $gameStatistic)
    {
      $gameStatistic->delete();
      return response()->json([
          'status' => true,
          'message' => "Game Statistic Deleted successfully!",
      ], 200);
    }
}
