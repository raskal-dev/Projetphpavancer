<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logement extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_log',
        'prix',
        'cite_id',
        'isvendu'
    ];

    public function cite()
    {
        return $this->belongsTo(Cite::class);
    }

    public function achat()
    {
        return $this->hasMany(Achat::class);
    }
}
