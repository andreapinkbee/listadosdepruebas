<!DOCTYPE html>
<html>
<head>
    <title>Editar Remisión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
   
    
    <div class="container"  style="width: 30rem;">
    <h1 align="center">Editar Remisión</h1>
        <form action="{{ route('remision.updateRemision') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="cod_remision">Código Remisión</label>
                <input type="text" name="cod_remision" id="cod_remision" class="form-control text-primary" value="{{ $remisionObj->cod_remision }}" readonly required>
            </div>
            <div class="form-group">
                <label for="cod_guia">Código Guía</label>
                <input type="text" name="cod_guia" id="cod_guia" class="form-control" value="{{ $remisionObj->getGuiaTransporteCod($remisionObj->id_guia) }}" required>
            </div>
            <div class="form-group">
                <label for="cod_factura">Código Factura</label>
                <input type="text" name="cod_factura" id="cod_factura" class="form-control" value="{{ $remisionObj->getFacturaCod($remisionObj->id_factura) }}" required>
            </div>
            <div class="form-group">
                <label for="fecha_entrega">Fecha Entrega</label>
                <input type="date" name="fecha_entrega" id="fecha_entrega" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="imagen2">Seleccionar Imagen</label>
                <input type="file" name="imagen2" id="imagen2" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Editar Remisión</button>
        </form>
    </div>
</body>
</html>