<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>:: Gestion de Productos ::</h1>
    <form action="{{url('libro') }}" method="post">
        @csrf
            <div>
                <label for="">Nombre del producto</label>
                <input type="text" name="nombre">
            </div>
            <div>
                <label for="">Fecha Vencimiento</label>
                <input type="Date" name="fecha">
            </div>
            <div>
                <label for="">Precio</label>
                <input type="integer" name="fecha">
            </div>
            <div>
                <label for="">Cantidad en Stock</label>
                <input type="integer" name="fecha">
            </div>
            <div>
                <label for="">Categoria</label>
                <select name="categoria">
                    @foreach($productoss as $item)
                    <option value="{{$item->id}}">{{$item ->name}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div>
                <button type="submit">Registrar</button>
            </div> 
    </form>
</body>
</html>