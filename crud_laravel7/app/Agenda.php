<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
        'nom', 'prenom', 'tel', 'date', 'heure','end','start'
    ];
}
