<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remision extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'remision';
    protected $fillable = ['cod_remision', 'id_guia', 'id_factura', 'imagen'];

    // Relación: una remisión pertenece a una guía de transporte
    public function guiaTransporte()
    {
        return $this->belongsTo(GuiaTransporte::class, 'id_guia');
    }

    // Relación: una remisión pertenece a una factura
    public function factura()
    {
        return $this->belongsTo(Factura::class, 'id_factura');
    }

    // Método para insertar una nueva remisión en la base de datos
    public static function createRemision($data)
    { 
        try{
        $guiaTransporte = GuiaTransporte::where('cod_guia', $data['cod_guia'])->first();

        // Verifica si se encontró la guía 
        if ($guiaTransporte) {
           // Verifica si la guía ya tiene una fecha de entrega definida
        if ($guiaTransporte->fecha_entrega !== $data['fecha_entrega'] || $guiaTransporte->fecha_entrega !== null) {

            throw new Exception("La fecha ingresada no coincide con la fecha de la guía, por favor verifique los datos e intente de nuevo");

        } else if ($guiaTransporte->fecha_entrega === null && $data['fecha_entrega'] !== null) {
            $guiaTransporte->update(['fecha_entrega' => $data['fecha_entrega']]);
            $data['fecha_remision'] = today();
            return self::create($data);
        }
    }
       else {
        throw new Exception("No se encontró la guía de transporte con el código ingresado");
    }
} catch (Exception $e) {
    return $e->getMessage();
}
    }

    public function updateRemision($codRemision, $codFactura)
    {
        try {
        // Busca la factura por su código
        $factura = Factura::where('cod_factura', $codFactura)->first();
        
        // Verifica si se encontró la factura
        if ($factura) {
            // Actualiza solo el campo 'id_factura' de la remisión
            Remision::where('cod_remision', $codRemision)->update(['id_factura' => $factura->id_factura]);
            throw new Exception("No se pudo actualizar la remisión");
        } else {
            throw new Exception("No se encontró la factura con el código ingresado");
        }
    } catch (\Exception $e) {
        return $e->getMessage();
    }
    }
}
