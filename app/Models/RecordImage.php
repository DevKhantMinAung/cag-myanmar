<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordImage extends Model
{
    /** @use HasFactory<\Database\Factories\RecordImageFactory> */
    use HasFactory;

    protected $fillable = ['image'];

    public function record()
    {
        return $this->belongsTo(Record::class);
    }
}
