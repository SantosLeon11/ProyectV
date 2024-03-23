<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv = "X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/3cdd98c6f1.js" crossorigin="anonymous"></script>
        <title>Document</title>
    </head>
    <body>
        <h1 class= "text-center p-3">Orden venta</h1>
        @if(session("correcto"))
        <div class="alert alert-success">{{session("correcto")}}</div>
        @endif
        @if(session("incorrecto"))
        <div class="alert alert-success">{{session("incorrecto")}}</div>
        @endif
        <script>
          var res=function(){
            var not = confirm("¿Estas seguro de eliminar?");
            return not;
          }
        </script>

        <!--Modal para crear  -->
        <div class="modal fade" id="registrarOrdenventa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{route("ordenventa.create")}}" method="POST">
                  @csrf

                  <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Folio</label>
                    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtfolio">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txttitulo">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Fecha creacion</label>
                    <input type="date" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtfechacreacion">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Enviado a produccion</label>
                    <input type="bool" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtenviadoaprod">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">FK_sucursal</label>
                    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtidsucursal">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">FK_usuario</label>
                    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtidusuario">
                  </div>
                  
                  <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">FK_cliente</label>
                    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtidcliente">
                  </div>
        
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
        
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="p-5 table-responsive">
          <btn class="btn btn-success" data-bs-toggle="modal" data-bs-target="#registrarOrdenventa">Registrar orden venta</btn>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Folio</th>
                <th scope="col">Titulo</th>
                <th scope="col">Fecha de creacion</th>
                <th scope="col">Enviado a produccion</th>
                <th scope="col">FK_sucursal</th>
                <th scope="col">Nombre_sucursal</th>
                <th scope="col">FK_usuario</th>
                <th scope="col">Nombre_usuario</th>
                <th scope="col">FK_cliente</th>
                <th scope="col">Nombre_cliente</th>
                <th></th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach($datos as $item)
              <tr>
                <th>{{$item->ID}}</th>
                <td>{{$item->Folio}}</td>
                <td>{{$item->Titulo}}</td>
                <td>{{$item->Fecha_creacion}}</td>
                <td>{{$item->Enviado_a_prod}}</td>
                <td>{{$item->ID_sucursal}}</td>
                <td>{{$item->sucursal ? $item->sucursal->Nombre : 'Sin sucursal asociada'}}</td>
                <td>{{$item->ID_usuario}}</td>
                <td>{{$item->usuario ? $item->usuario->Nombre : 'Sin usuario asociado'}}</td>
                <td>{{$item->ID_cliente}}</td>
                <td>{{$item->cliente ? $item->cliente->Razon_social : 'Sin cliente asociado'}}</td>

                <td><a href="" data-bs-toggle="modal" data-bs-target="#editarOrdenventa{{$item->ID}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="{{route("ordenventa.delete", $item->ID)}}" onclick="return res()" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a></td>

<!-- Modal para modificar datos-->
<div class="modal fade" id="editarOrdenventa{{$item->ID}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar datos de la orden venta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route("ordenventa.update")}}" method="post">
          @csrf
          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Codigo de orden venta</label>
            <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtcodigo" value="{{$item->ID}}" readonly>
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Folio</label>
            <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtfolio" value="{{$item->Folio}}">
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Titulo</label>
            <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txttitulo" value="{{$item->Titulo}}">
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Fecha creacion</label>
            <input type="date" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtfechacreacion" value="{{$item->Fecha_creacion}}">
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Enviado a produccion</label>
            <input type="bool" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtenviadoaprod" value="{{$item->Enviado_a_prod}}">
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">FK_sucursal</label>
            <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtidsucursal" value="{{$item->ID_sucursal}}">
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">FK_usuario</label>
            <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtidusuario" value="{{$item->ID_usuario}}">
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">FK_cliente</label>
            <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtidcliente" value="{{$item->ID_cliente}}">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Modificar</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>