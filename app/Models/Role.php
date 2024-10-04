<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Role extends Model
{
    use HasFactory;
        // Especifica los atributos que se pueden asignar de forma masiva
        protected $fillable = ['name', 'guard_name'];

        // Definir la relación muchos a muchos con Permission
        public function permissions()
        {
            return $this->belongsToMany(Permission::class, 'permission_role');
        }
}
