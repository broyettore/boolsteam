<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Description;
use App\Models\Game;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Editor;
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
        $editors = Editor::all();
        $genres = Genre::all();
        $descriptions = Description::all();

        return view('admin.games.create', compact('descriptions', "genres", "editors"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGameRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGameRequest $request)
    {
        $data = $request->validated();
        $newGame = new Game();
      
        $newGame->fill($data);

        if(isset($data["image"])) {
            $newGame->image = Storage::put("uploads", $data["image"]);
        }

        $newGame->save();
      
       if(isset($data['description_id'])){
            $newGame->description_id = $data['description_id'];
        }

        if(isset($data['genres']))
        {
            $newGame->genres()->sync($data['genres']);
        }
      
        if (isset($data['editor_id'])) {
            $newGame->editor_id = $data['editor_id'];
        }

        return to_route('admin.games.show', $newGame->id)->with('message', 'Game created!');
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
      
        $editors = Editor::all();
        $genres = Genre::all();
        return view('admin.games.edit', compact('game', 'genres', "editors"));

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
        $data = $request->validated();

         if (empty($data['image'])) {

             if($game->image){
                 Storage::delete($game->image);
             }

            $game->image = Storage::put('uploads', $data['image']);
         }


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

        if($game->image){
            Storage::delete($game->image);
        }

        return redirect()->route('admin.games.index');
    }
}
