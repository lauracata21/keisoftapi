<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fundaciones extends Model
{
  use HasFactory;
    
  protected $fillable=['nombre', 'direccion', 'telefono', 'servicio_id']; // Permite hacer la asignacion masiva

  protected $allowIncluded = ['posts', 'posts.user']; // Lista con las posibles relaciones que podemos enviar a travez de la URL

  protected $allowFilter = ['id', 'nombre', 'direccion', 'telefono', 'servicio_id'];

  protected $allowSort = ['id', 'nombre', 'direccion', 'telefono', 'servicio_id'];

  /////////////////////////////////////////////////////////////////////////////
  public function scopeIncluded(Builder $query)
  {

      if (empty($this->allowIncluded) || empty(request('included'))) {
          return;
      }
      $relations = explode(',', request('included')); //['posts','relation2']
      //return $relations;

      $allowIncluded = collect($this->allowIncluded); //colocamos en una colecion lo que tiene $allowIncluded en este caso = ['posts','posts.user']
     // return $allowIncluded;
      foreach ($relations as $key => $relationship) { //recorremos el array de $relations y los guardamos en una variable llamada relationship

          if (!$allowIncluded->contains($relationship)) { // si un elemento de la variable allowIncluded no esta dentro de $relationship 
              unset($relations[$key]);
          }
      } //
      // return $relations;
      $query->with($relations); //se ejecuta el query con lo que tiene $relations y que son los valores permitidos      
  }                                    // por la variable allowIncluded                               
  //////////////////////

  public function scopeFilter(Builder $query)
  {

      if (empty($this->allowFilter) || empty(request('filter'))) {
          return;
      }

      $filters = request('filter');
      $allowFilter = collect($this->allowFilter);

      foreach ($filters as $filter => $value) {
          if ($allowFilter->contains($filter)) {

              //$query->where($filter, $value);
              $query->where($filter,'LIKE','%'.$value.'%');
          }
      }
  }
  public function scopeSort(Builder $query)
  {

      if (empty($this->allowSort) || empty(request('sort'))) {
          return;
      }

      $sortFields = explode(',',request('sort')) ;
      $allowSort = collect($this->allowSort);

      foreach ($sortFields as $sortField) {
          
          if ($allowSort->contains($sortField)) {
              // $query->orderBy($sortField,'asc');
              $query->orderBy($sortField, 'asc');
             }
      }
  }


    //relacion uno a muchos (inversa), entidades servicios y noticias
  public function servicio()
   {
      return $this->BelongsTo('Appp\Models\Servicio');
   }

  public function fundacions ()
  {
    return $this->hasMany('App\Models\Fundaciones');
  } 
  public function reporte_abusos ()
   {
     return $this->hasMany('App\Models\ReporteAbuso');
   }

 public function adopciones()
 {
   return $this->hasMany('App\Models\Adopcion');
 }

 public function convenios()
 {
   return $this->hasMany('App\Models\Convenio');
 }

 public function donacion() 
 {
   return $this->BelongsTo('Appp\Models\Donacion');
 }
}
