<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $table="cliente";
    protected $primaryKey = 'idcli';

    protected $guard_name = 'web';
    
    //columnas que quieres usar para la autenticación
    protected $fillable = ['email','nombre','contrasena','google_id'];

    // campos que se usarán como contraseña
    protected $hidden = ['contrasena'];
    protected $authPasswordName = 'contrasena';

    //Esto se utiliza para recuperar la contraseña
    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}
