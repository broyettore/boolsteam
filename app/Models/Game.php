<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $guarded = ['image'];

    public function editor()
    {
        return $this->belongsTo(Editor::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class)->withTimestamps();
    }

    // public function description(){
    //     return $this->hasOne(Description::class);
    // }
}
