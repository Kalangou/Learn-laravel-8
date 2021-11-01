<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Artist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    // L'image appartient a un poste donné
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Un poste ne peut avoir qu'une et une seule image
    public function artist()
    {
        return $this->hasOne(Artist::class);
    }
}
