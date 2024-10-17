<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class Empleado extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    
    public $timestamps = false;
    protected $table="empleado";
    protected $primaryKey = 'ide';

    protected $guard_name = 'web';
    protected $primaryKey = 'ide';
    
    // Define las columnas que quieres usar para la autenticación
    protected $fillable = ['email', 'contrasena'];

    // Define el campo que usarás como contraseña
    protected $hidden = ['contrasena'];
    protected $authPasswordName = 'contrasena';

    // Si el campo de la contraseña no se llama 'password', ajusta la columna que se usa para la autenticación:
    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    public function permisos()
        {
            return $this->belongsToMany(Permiso::class, 'empleado_permiso', 'empleado_id', 'permiso_id');
        }
    
}
