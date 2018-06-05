<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artiste extends Model
{

    use SoftDeletes;
    protected $dates=['deleted_at'];
    // champ sur les quels nous pouvont faire insert
    protected $fillable = ['nom','prenom'];
//champs a cacher
//protected $hidden =[]
    
}
