<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cite extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle_cite',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
