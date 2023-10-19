<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuiaTransporte;

class GuiaTransporteController extends Controller
{
    public function index()
    {
        // Recuperar y mostrar una lista de guías de transporte
        $guias = GuiaTransporte::all();
        return view('guias.index', compact('guias'));
    }

    public function create()
    {
        // Mostrar el formulario para crear una nueva guía de transporte
        return view('guia.create');
    }

    public function store(Request $request)
    {
        // Validar y almacenar una nueva guía de transporte en la base de datos
        $data = $request->validate([
            'cod_guia' => 'required',
            'cod_cliente' => 'required',
            'cod_pedido' => 'required',
            'fecha_despacho' => 'required',
            'pais' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
        ]);

        GuiaTransporte::createGuia($data);

        return redirect()->route('guia.index')->with('success', 'Guía de transporte creada exitosamente.');
    }

    public function show($id)
    {
        // Mostrar los detalles de una guía de transporte específica
        $guia = GuiaTransporte::find($id);
        return view('guias.show', compact('guia'));
    }

    // Otros métodos como edit, update y destroy aquí...

    public function createRemision($id)
    {
        // Mostrar el formulario para crear una nueva remisión asociada a una guía de transporte
        $guia = GuiaTransporte::find($id);
        return view('remisiones.create', compact('guia'));
    }
    public function createForm()
    {
        return view('guias.createform');
    }
}

