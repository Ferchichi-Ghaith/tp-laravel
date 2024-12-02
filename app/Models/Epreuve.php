<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Epreuve extends Model
{
    protected $fillable = [
        'date', 'time_begin', 'time_end', 'classroom', 'type', 'matiere_id'
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'date' => 'datetime', // Automatically cast 'date' to a Carbon instance
        'time_begin' => 'datetime:H:i', // Cast to 24-hour time format
        'time_end' => 'datetime:H:i', // Cast to 24-hour time format
    ];

    /**
     * Define the relationship with Matiere.
     */
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
}
