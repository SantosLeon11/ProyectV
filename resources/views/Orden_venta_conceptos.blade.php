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
        <h1 class= "text-center p-3">Orden venta conceptos</h1>
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
        <div class="modal fade" id="registrarOrdenventaconceptos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{route("ordenventaconceptos.create")}}" method="POST">
                  @csrf

                  <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtcantidad">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Unidad</label>
                    <input type="number" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtunidad">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Observaciones</label>
                    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtobservaciones">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Precio unitario</label>
                    <input type="number" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtpreciounitario">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">FK_orden_venta</label>
                    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtidordenventa">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">FK_articulo</label>
                    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtidarticulo">
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
          <btn class="btn btn-success" data-bs-toggle="modal" data-bs-target="#registrarOrdenventaconceptos">Registrar orden venta conceptos</btn>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Unidad</th>
                <th scope="col">Observaciones</th>
                <th scope="col">Precio unitario</th>
                <th scope="col">FK_orden_venta</th>
                <th scope="col">Titulo_ordenV</th>
                <th scope="col">FK_articulo</th>
                <th scope="col">Descripcion_articulo</th>
                <th></th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach($datos as $item)
              <tr>
                <th>{{$item->ID}}</th>
                <td>{{$item->Cantidad}}</td>
                <td>{{$item->Unidad}}</td>
                <td>{{$item->Observaciones}}</td>
                <td>{{$item->Precio_unitario}}</td>
                <td>{{$item->ID_orden_venta}}</td>
                <td>{{$item->ordenVenta ? $item->ordenVenta->Titulo : 'Sin ordenVenta asociada'}}</td>
                <td>{{$item->ID_articulo}}</td>
                <td>{{$item->articulo ? $item->articulo->Descripcion : 'Sin articulo asociado'}}</td>

                <td><a href="" data-bs-toggle="modal" data-bs-target="#editarOrdenventaconceptos{{$item->ID}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="{{route("ordenventaconceptos.delete", $item->ID)}}" onclick="return res()" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a></td>

<!-- Modal para modificar datos-->
<div class="modal fade" id="editarOrdenventaconceptos{{$item->ID}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar datos de la orden venta conceptos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route("ordenventaconceptos.update")}}" method="post">
          @csrf
          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Codigo de orden venta conceptos</label>
            <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtcodigo" value="{{$item->ID}}" readonly>
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtcantidad" value="{{$item->Cantidad}}">
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Unidad</label>
            <input type="number" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtunidad" value="{{$item->Unidad}}">
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Observaciones</label>
            <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtobservaciones" value="{{$item->Observaciones}}">
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Precio unitario</label>
            <input type="number" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtpreciounitario" value="{{$item->Precio_unitario}}">
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">FK_orden_venta</label>
            <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtidordenventa" value="{{$item->ID_orden_venta}}">
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">FK_articulo</label>
            <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtidarticulo" value="{{$item->ID_articulo}}">
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