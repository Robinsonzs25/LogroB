<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>:: Gestion de Categoria::</h3>
            <form action="{{url ('cate') }}" method="post">
             @csrf
              <div>
                <label for="">Categoria</label>
                <input type="text" name="categoria">
              </div>
              <br>
              <div>
                <button type="submit">Registrar</button>
              </div> 
            </form>

            <br><br>

            <table border="1">
        <thead>
            <tr>
                <th>Item</th>
                <th>Categorias</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categoriass as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->categoria}}</td>
            </tr>
            @endforeach
    </table>  

</body>
</html>