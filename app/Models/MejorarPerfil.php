<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MejorarPerfil extends Model
{
    use HasFactory;

    protected $table = 'mejorar_perfil';

    protected $fillable = [
        'user_id',
        'descripcion',
        'cv',
    ];

    /**
     * Relación con el modelo User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
