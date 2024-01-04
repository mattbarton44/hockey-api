<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GameEvent;
use App\Http\Requests\StoreGameEventRequest;

class GameEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $gameEvents = GameEvent::all();
      return response()->json([
        'status' => true,
        'data' => $gameEvents
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGameEventRequest $request)
    {
      $gameEvent = GameEvent::create($request->all());
      return response()->json([
          'status' => true,
          'message' => "Game Event Created successfully!",
          'data' => $gameEvent
      ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GameEvent  $gameEvent
     * @return \Illuminate\Http\Response
     */
    public function show(GameEvent $gameEvent)
    {
      return response()->json([
        'status' => true,
        'data' => $gameEvent
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GameEvent  $gameEvent
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGameEventRequest $request, GameEvent $gameEvent)
    {
      $gameEvent->update($request->all());
      return response()->json([
          'status' => true,
          'message' => "Game Event Updated successfully!",
          'data' => $gameEvent
      ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GameEvent  $gameEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(GameEvent $gameEvent)
    {
      $gameEvent->delete();
      return response()->json([
          'status' => true,
          'message' => "Game Event Deleted successfully!",
      ], 200);
    }
}
