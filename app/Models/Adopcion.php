<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adopcion extends Model
{
    use HasFactory;
    public function user() 
    {
        return $this->BelongsTo('Appp\Models\User');
    }

    public function especie() 
    {
        return $this->BelongsTo('Appp\Models\Especie');
    }
    
    public function fundacion()
     {
        return $this->BelongsTo('Appp\Models\Fundaciones');
    }
}
