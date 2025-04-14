<?php

// App\Models\Aplicacion.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplicacion extends Model
{
    use HasFactory;

    protected $table = 'aplicaciones'; // <-- Esto soluciona el problema

    protected $fillable = [
        'vacante_id',
        'user_id',
    ];

    public function vacante()
    {
        return $this->belongsTo(Vacante::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
