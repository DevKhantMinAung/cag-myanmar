<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeySector extends Model
{
    /** @use HasFactory<\Database\Factories\KeySectorFactory> */
    use HasFactory;

    protected $fillable = ['title', 'intro', 'image'];
}
