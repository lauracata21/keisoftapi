<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
  
    protected $fillable=['nombre', 'apellido', 'email',  'password', 'direccion']; // Permite hacer la asignacion masiva

    protected $allowIncluded = ['posts', 'posts.user']; // Lista con las posibles relaciones que podemos enviar a travez de la URL

    protected $allowFilter = ['id', 'nombre'];

    protected $allowSort = ['id', 'nombre'];

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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
 

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //RELACION INVERSA CON LA TABLA TIPO PERSONA
    
   public function productos ()
   {
   return $this->hasMany('App\Models\Producto');
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
     //ENCRIPTAR LA CONTRASEÑA
    public function setPasswordAttribute($password)
    {
        $this->attributes['password']=bcrypt($password);
    }
}
