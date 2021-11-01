<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artist extends Model
{
    use HasFactory;

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
