<!DOCTYPE html>
<html>
<head>
    <title>Lista de Remisiones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<br/>
<h1 class="card-title" align="center">Lista de Remisiones</h1>
    <br/>

    <table class="table">
  <thead class="bg-primary">
    <tr>
      <th scope="col" class="text-white">#</th>
      <th scope="col" class="text-white">Codigo Remisión</th>
      <th scope="col" class="text-white">Codigo Guía</th>
      <th scope="col" class="text-white">Codigo Factura</th>
      <th scope="col" class="text-white">Imagen</th>
    </tr>
  </thead>
        @foreach ($remisiones as $remisiones)
        
  <tbody>
    <tr>
      <th scope="row">{{ $remisiones->id_remision }}</th>
      <td scope="row">{{ $remisiones->cod_remision }}</td>
      <td scope="row">{{ $remisiones->getGuiaTransporteCod($remisiones->id_guia)}}</td>
      <td scope="row">{{ $remisiones->getFacturaCod($remisiones->id_factura)}}</td>
      <td scope="row">{{ $remisiones->imagen2 }}</td>
  </tbody>
        @endforeach
    </table>
<br>
   <div align="center"> <a href="{{ route('remision.createform') }}" class="font-semibold text-white-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 btn btn-primary">Crear Remision</a>
   <a href="{{ route('remision.editform') }}" class="font-semibold text-white-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 btn btn-primary">Editar Remision</a>
  </div>
 

  </body>
</html>