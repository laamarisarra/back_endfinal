<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fiche extends Model
{

    protected $table = 'fiches';

    protected $fillable = [
        
         'aliment_id',
         'user_id',

      ];

      public function aliment(){
          return $this->belongsTo(Aliment::class, 'aliment_id');
      }

      public function Users(){
        return $this->belongsTo(Users::class, 'user_id');
    }
}
