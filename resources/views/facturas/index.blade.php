<!DOCTYPE html>
<html>
<head>
    <title>Lista de Facturas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<br/>
<h1 class="card-title" align="center">Lista de Facturas</h1>
    <br/>

    <table class="table">
  <thead class="bg-primary">
    <tr>
      <th scope="col" class="text-white">#</th>
      <th scope="col" class="text-white">Codigo Factura</th>
    </tr>
  </thead>
        @foreach ($facturas as $facturas)
        
  <tbody>
    <tr>
      <th scope="row">{{ $facturas->id_factura }}</th>
      <td scope="row">{{ $facturas->cod_factura }}</td>
      
    </tr>
  </tbody>
  
        @endforeach
    </table>
    <br/><br/>
   <div align="center"> <a href="{{ route('factura.createform') }}" class="font-semibold text-white-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 btn btn-primary">Crear factura</a></div>

</body>
</html>
