<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Genre;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();

        return view('admin.games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        return view('admin.games.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGameRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGameRequest $request)
    {
        /* $request->validated(); */

        $data = $request->validated();
        $game = new Game();

        $game->fill($data);
        $game->save();

        if(isset($data['genres']))
        {
            $game->genres()->sync($data['genres']);
        }

        return to_route('admin.games.show', $game->id)->with('message', 'Game created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return view('admin.games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        $genres = Genre::all();
        return view('admin.games.edit', compact('game', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGameRequest  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        $request->validated();
        $data = $request->all();

        $game->title = $data['title'];
        $game->description = $data['description'];
        $game->url = $data['url'];
        $game->price = $data['price'];
        $game->genres = $data['genres'];
        $game->languages = $data['languages'];
        $game->editor = $data['editor'];
        $game->developer = $data['developer'];
        $game->release = $data['release'];
        $game->pegi = $data['pegi'];
        $game->save();

        $genres = isset($data['genres']) ? $data['genres'] : [];
        $game->genres()->sync($genres);
        $game->update($data);

        return to_route('admin.games.index', $game->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('admin.games.index');
    }
}
