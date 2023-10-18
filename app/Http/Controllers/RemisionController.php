<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Remision;
use Exception;

class RemisionController extends Controller
{
    public function index()
{
    $remisiones = Remision::all();
    return view('remisiones.index', compact('remisiones'));
}

    public function createRemision(Request $request)
    {
        try {
            $data = $request->validate([
                'cod_remision' => 'required',
                'id_guia' => 'required',
                'imagen' => 'required',
            ]);

            $result = Remision::createRemision($data);

            if (is_string($result)) {
                // Manejar errores y mostrar mensajes al usuario
                return redirect()->back()->with('error', $result);
            }

            return redirect()->route('remision.show', $result->id_remision)->with('success', 'Remisión creada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateRemision(Request $request)
    {
        try {
            $data = $request->validate([
                'cod_remision' => 'required',
                'cod_factura' => 'required',
            ]);

            list($codRemision, $codFactura) = array_values($data);

            $result = Remision::updateRemision($codRemision, $codFactura);

            if (is_string($result)) {
                // Manejar errores y mostrar mensajes al usuario
                return redirect()->back()->with('error', $result);
            }

            return redirect()->route('remision.show', $result->id_remision)->with('success', 'Remisión actualizada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

