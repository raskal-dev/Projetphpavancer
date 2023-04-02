<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'log_id',
        'typevente_id',
        'user_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function logement()
    {
        return $this->belongsTo(Logement::class);
    }

    public function typevente()
    {
        return $this->belongsTo(Typevente::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
