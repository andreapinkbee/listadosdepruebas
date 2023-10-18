<!DOCTYPE html>
<html>
<head>
    <title>Lista de Facturas</title>
</head>
<body>
    <h1>Lista de Facturas</h1>
    
    <ul>
        @foreach ($facturas as $factura)
            <li>{{ $factura->cod_factura }}</li>
        @endforeach
    </ul>
    <a href="{{ route('factura.createform') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
</body>
</html>
