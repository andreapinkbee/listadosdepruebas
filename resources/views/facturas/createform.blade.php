<!DOCTYPE html>
<html>
<head>
    <title>Crear Factura</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    
    
    <div class="container" style="width: 30rem;">
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