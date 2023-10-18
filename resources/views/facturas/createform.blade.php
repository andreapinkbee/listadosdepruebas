<!DOCTYPE html>
<html>
<head>
    <title>Crear Factura</title>
</head>
<body>
    <h1>Crear Factura</h1>
    
    <div class="container">
        <h1>Crear Nueva Factura</h1>
        <form action="{{ route('factura.create') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="cod_factura">Código de Factura</label>
                <input type="text" name="cod_factura" id="cod_factura" class="form-control" required>
            </div>
            <!-- Agrega más campos y estilos de formulario según tus necesidades -->
            <button type="submit" class="btn btn-primary">Crear Factura</button>
        </form>
    </div>
</body>
</html>