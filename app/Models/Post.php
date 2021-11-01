<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Image;
use App\Models\Artist;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    // On precise que pour un poste on peut avoir plusieurs commentaires
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Polimorphic
    // public function comments()
    // {
    //     return $this->morphMany(Comment::class, 'commentable');
    // }

    // Un poste ne peut avoir qu'une et une seule image
    public function image()
    {
        return $this->hasOne(Image::class);
    }

    // Un poste peut avoir plusieurs tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // public function imageArtist()
    // {
    //     return $this->hasOneThrough(Artist::class, Image::class);
    // }

    // Recuperation du commentaire le plus recent
    public function latestComment()
    {
        return $this->hasOne(Comment::class)->latestOfMany();
    }
    
    // Recuperation du premier commentaire
    public function oldestComment()
    {
        return $this->hasOne(Comment::class)->oldestOfMany();
    }
}
