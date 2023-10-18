<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;

class FacturaController extends Controller
{
    public function index()
    {
        // Recupera y muestra una lista de facturas
        $facturas = Factura::all();
        return view('facturas.index', compact('facturas'));
    }
    public function createFactura(Request $request)
    {
        // Valida los datos recibidos desde el formulario
        $request->validate([
            'cod_factura' => 'required|unique:factura,cod_factura|max:20',
        ]);

        // Crea una nueva factura con los datos del formulario
        $factura = Factura::createFactura([
            'cod_factura' => $request->input('cod_factura'),
        ]);

        return redirect()->route('factura.index')->with('success', 'Factura creada exitosamente.');
    }
    public function createForm()
{
    return view('facturas.createform');
}
}
