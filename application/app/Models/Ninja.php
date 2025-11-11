<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ninja extends Model
{
    /** @use HasFactory<\Database\Factories\NinjaFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'skill',
        'bio',
        'dojo_id',
    ];

    /** Get the dojo that the ninja belongs to. */
    public function dojo()
    {
        return $this->belongsTo(Dojo::class);
    }
}
