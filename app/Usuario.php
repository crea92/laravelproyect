<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $guard_name = 'api';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['imagen', 'nombre', 'ape_paterno','ape_materno','rut','fecha_nac','email','password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
}
