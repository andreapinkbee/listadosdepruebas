<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuiaTransporte extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'guiaTransporte';
    protected $fillable = [
        'cod_guia',
        'cod_cliente',
        'cod_pedido',
        'fecha_despacho',
        'fecha_entrega',
        'pais',
        'ciudad',
        'direccion',
    ];

    // Relación: una guía de transporte puede tener muchas remisiones
    public function remisiones()
    {
        return $this->hasMany(Remision::class, 'id_guia');
    }

    // Método para insertar una nueva guía de transporte en la base de datos
    public static function createGuia($data)
    {
        return self::create($data);
    }
}
