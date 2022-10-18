<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    use HasFactory;
    public function fundacions(){
        return $this->hasMany('App\Models\Fundaciones');
     }
}
