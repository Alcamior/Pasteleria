<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;

class Empleado extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    
    public $timestamps = false;
    protected $table="empleado";
    protected $guard_name = 'web';
    
    // Define las columnas que quieres usar para la autenticación
    protected $fillable = ['nombre', 'ap', 'am', 'telefono', 'email', 'contrasena'];

    // Define el campo que usarás como contraseña
    protected $hidden = ['contrasena'];

    // Si el campo de la contraseña no se llama 'password', ajusta la columna que se usa para la autenticación:
    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}
