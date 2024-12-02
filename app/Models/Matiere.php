<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Matiere extends Model
{
    protected $fillable = ['name', 'coefficient', 'description'];

    /**
     * Indicates if the IDs are auto-incrementing.
     */
    public $incrementing = true;

    /**
     * Defines the relationship with Epreuve.
     */
    public function epreuves(): HasMany
    {
        return $this->hasMany(Epreuve::class);
    }
}
