<!DOCTYPE html>
<html>
<head>
    <title>Lista de guias</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<br/>
<h1 class="card-title" align="center">Lista de Guías</h1>
    <br/>

    <table class="table">
  <thead class="bg-primary">
    <tr>
      <th scope="col" class="text-white">#</th>
      <th scope="col" class="text-white">Codigo Guia</th>
      <th scope="col" class="text-white">Codigo Cliente</th>
      <th scope="col" class="text-white">Codigo Pedido</th>
      <th scope="col" class="text-white">Fecha Despacho</th>
      <th scope="col" class="text-white">Fecha Entrega</th>
      <th scope="col" class="text-white">Pais</th>
      <th scope="col" class="text-white">Ciudad</th>
      <th scope="col" class="text-white">Dirección</th>
    </tr>
  </thead>
        @foreach ($guias as $guias)
        
  <tbody>
    <tr>
      <th scope="row">{{ $guias->id_guia }}</th>
      <td scope="row">{{ $guias->cod_guia }}</td>
      <td scope="row">{{ $guias->cod_cliente }}</td>
      <td scope="row">{{ $guias->cod_pedido }}</td>
      <td scope="row">{{ $guias->fecha_despacho }}</td>
      <td scope="row">{{ $guias->fecha_entrega}}</td>
      <td scope="row">{{ $guias->pais }}</td>
      <td scope="row">{{ $guias->ciudad }}</td>
      <td scope="row">{{ $guias->direccion }}</td>
    </tr>
  </tbody>
  
        @endforeach
    </table>
    <br/><br/>
   <div align="center"> <a href="{{ route('guia.createform') }}" class="font-semibold text-white-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 btn btn-primary">Crear Guía</a></div>

</body>
</html>