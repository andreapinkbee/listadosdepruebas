<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'dbo.factura';
    protected $fillable = ['cod_factura'];

    // Relación: una factura puede tener muchas remisiones
    public function remisiones()
    {
        return $this->hasMany(Remision::class, 'id_factura');
    }

    // Método para insertar una nueva factura en la base de datos
    public static function createFactura($data)
    {
        return self::create($data);
    }
}
