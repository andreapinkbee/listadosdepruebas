<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Remision;
use Exception;
use Illuminate\Support\Facades\Storage;
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
                'cod_guia' => 'required',
            ]);

            $result = Remision::createRemision($data);
            

            if (is_string($result)) {
                // Manejar errores y mostrar mensajes al usuario
                return redirect()->back()->with('error', $result);
            }

            return redirect()->route('remision.index', $result->id_remision)->with('success', 'Remisión creada exitosamente.');
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
                'cod_guia'=>'required',
                'fecha_entrega'=>'required',
                'imagen2' => 'required|image',  
            ]);

            $imageDt= $request->file('imagen2')->store('public');
            $urlImage=Storage::url($imageDt);
                list($codRemision, $codFactura, $codGuia, $fecha_entrega, $imagen) = array_values($data);
                $remision = new Remision;
                if ($urlImage!==null) {
                $result = $remision->updateRemision($codRemision, $codFactura, $codGuia, $fecha_entrega, $urlImage);
                return redirect()->route('remision.index')->with('success', 'Remision actualizada exitosamente.');
                }
                if (is_string($result)) {
                    // Manejar errores y mostrar mensajes al usuario
                    
                    return redirect()->back()->with('error', $result);
                }   

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function createForm()
    {
        return view('remisiones.createform');
    }

    public function editForm()
{
   
    return view('remisiones.editform');
}
}

