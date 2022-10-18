<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    use HasFactory;
    public function user() {
        return $this->BelongsTo('Appp\Models\User');
    }
    public function fundacion() {
        return $this->BelongsTo('Appp\Models\Fundaciones');
    }
}
