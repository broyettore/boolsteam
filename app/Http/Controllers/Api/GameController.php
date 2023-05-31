<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::with('editor', 'genres')->take(7)->get();
        return response()->json([
            'success' => true,
            'results' => $games
        ]);
    }

    public function relevant()
    {
        $game = Game::where('relevant', true)->with('editor', 'genres')->first();

        return response()->json([
            'success' => true,
            'results' => $game
        ]);
    }

    public function top3()
    {

        $games = Game::orderByDesc('discount')->take(3)->get();
        return response()->json([
            'success' => true,
            'results' => $games
        ]);
    }
}
