<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Videojuego extends Model
{
    public function generos(): BelongsToMany
    {
        return $this->belongsToMany(Genero::class, 'videojuego_genero');
    }
}
