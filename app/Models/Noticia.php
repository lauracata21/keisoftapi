<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    // static $rules = [
    //   'fecha' => 'required',
    //   'nombre' => 'required',
    //   'hora' => 'required',
    //   'descripcion' => 'required',
    //   'foto_url' => 'required',
    //   'fundacion_id' => 'required',

    //   ];
  
    //   protected $perPage = 20;

    //   protected $fillable=['fecha', 'nombre', 'hora','descripcion','foto_url','fundacion_id'];


    public function noticia()
     {
        return $this->belongsTo('Appp\Models\Noticia');
      }

      public function images(){
        return $this->morphMany('App\Models\Image','imageable');
      }
}
