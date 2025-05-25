<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genero extends Model
{
    public function videojuegos(): BelongsToMany
    {
        return $this->belongsToMany(Videojuego::class, 'videojuego_genero');
    }
}