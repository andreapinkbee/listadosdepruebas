<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;

class Remision extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'remision';
    protected $fillable = ['cod_remision', 'id_guia', 'id_factura', 'imagen2'];

    // Relación: una remisión pertenece a una guía de transporte
    public function guiaTransporte()
    {
        return $this->belongsTo(GuiaTransporte::class, 'id_guia', 'id_guia');
    }

    // Relación: una remisión pertenece a una factura
    public function factura()
    {
        return $this->belongsTo(Factura::class, 'id_factura', 'id_factura');
    }

    // Método para insertar una nueva remisión en la base de datos
    public static function createRemision($data)
    { 
        try{
            $guiaTransporte = GuiaTransporte::where('cod_guia', $data['cod_guia'])->first();

        // Verifica si se encontró la guía 
        
        if ($guiaTransporte) {
            $data['id_guia'] = $guiaTransporte->id_guia;
            $data2['cod_remision']=$data['cod_remision'];
            $data2['id_guia']=$data['id_guia'];
            return self::create($data);
        }
        else {
            throw new Exception("No se encontró la guía de transporte con el código ingresado");
        }
    }
    catch (Exception $e) {
    return $e->getMessage();
}
    }

    public function updateRemision($codRemision, $codFactura, $codGuiaTransporte, $fecha_entrega, $imagen)
    {
        try {
        // Busca la factura por su código
        $factura = Factura::where('cod_factura', $codFactura)->first();
        $guiaTransporte = GuiaTransporte::where('cod_guia', $codGuiaTransporte)->first();
        
        if (empty($imagen)) {
            throw new Exception("La imagen no puede estar vacía. Por favor, seleccione una imagen para la remisión.");
        }
        // Verifica si se encontró la factura
        if ($factura) {
            // Actualiza solo el campo 'id_factura' de la remisión
            Remision::where('cod_remision', $codRemision)->update(['id_factura' => $factura->id_factura]);
            
            if ($guiaTransporte) {
                    // Verifica que la guía no tenga una fecha de entrega definida o que no sea diferente
                   
                    if ($guiaTransporte->fecha_entrega === null && $fecha_entrega !== null) {

                        GuiaTransporte::where('cod_guia', $guiaTransporte->cod_guia)->update(['fecha_entrega' => $fecha_entrega]);
                        Remision::where('cod_remision', $codRemision)->update(['imagen2' => $imagen, 'id_guia' => $guiaTransporte->id_guia]);
                     }
                     else if($guiaTransporte->fecha_entrega !== null && $guiaTransporte->fecha_entrega === $fecha_entrega){
                        GuiaTransporte::where('cod_guia', $guiaTransporte->cod_guia)->update(['fecha_entrega' => $fecha_entrega]);
                      
                        Remision::where('cod_remision', $codRemision)->update(['imagen2' => $imagen, 'id_guia' => $guiaTransporte->id_guia]);
                       

                     }
            else if ($guiaTransporte->fecha_entrega !== null || $guiaTransporte->fecha_entrega !== $fecha_entrega) {

            throw new Exception("La fecha ingresada no coincide con la fecha de la guía, por favor verifique los datos e intente de nuevo");

        } 
            }
            throw new Exception("No se pudo actualizar la remisión");
        } else {
            throw new Exception("No se encontró la factura con el código ingresado");
        }
    } catch (\Exception $e) {
        return $e->getMessage();
    }
    }

public function getFacturaCod($idfactura)
{
    $intfactura = intval(trim($idfactura));
    $factura = Factura::where('id_factura', $intfactura)->first();
    if($factura){
        $codigo=$factura->cod_factura;
           
    }
    else{
        $codigo="Sin dato";
    }
    
    return $codigo;
}

public function getGuiaTransporteCod($idguia)
{
    $intguia = intval(trim($idguia));
    $guiaTransporte = GuiaTransporte::where('id_guia', $intguia)->first();
    $codigo=$guiaTransporte->cod_guia;
    if($guiaTransporte){
        $codigo=$guiaTransporte->cod_guia;  
    }
    else{
        $codigo="Sin dato"; 
        
    }
    return $codigo;
    
}
}
