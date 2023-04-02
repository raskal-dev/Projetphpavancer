<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_cli',
        'prenom_cli',
        'tel_cli',
        'email_cli'
    ];

    public function achat()
    {
        return $this->hasMany(Achat::class);
    }
}
