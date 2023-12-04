<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>:: Gestion de Productos ::</h1>
    <form action="{{url('producto') }}" method="post">
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
                    <option value="{{$item->id}}">{{$item ->categoria}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div>
                <button type="submit">Registrar</button>
            </div> 
<br><br>
    <table border="1">
        <thead>
            <tr>
                <th>Item</th>
                <th>NombreProducto</th>
                <th>FechaVencimiento</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Categoria</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productoss as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nombreproducto}}</td>
                <td>{{$item->fechavencimiento}}</td>
                <td>{{$item->precio}}</td>
                <td>{{$item->cantidadStock}}</td>
                <td>{{$item->categoria}}</td>
                <td>
                  <div>
                    <form action="{{url ('producto', $item->id)}}" method="post">
                      @method('delete')
                      @csrf
                      <button type="submit" >Eliminar</button>
                    </form>
                  </div>
                </td>
            </tr>
            @endforeach
    </table> 
    </form>

    <br>
    <a href="{{url('cat')}}">Gestionar Categoria</a>
</body>
</html>