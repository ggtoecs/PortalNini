<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'descripcion', 'salario', 'ubicacion', 'tipo_trabajo', 'empleador_id',
    ];

    // Relación con el modelo User (empleador)
    public function empleador()
    {
        return $this->belongsTo(User::class, 'empleador_id');
    }
    public function postulantes()
{
    return $this->belongsToMany(User::class, 'aplicaciones')->withTimestamps();
}
public function aplicaciones()
{
    return $this->hasMany(Aplicacion::class);
}

}
