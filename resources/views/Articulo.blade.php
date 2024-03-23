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
        <h1 class= "text-center p-3">Articulos</h1>
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

        <!--Modal para crear -->
        <div class="modal fade" id="registrarArticulo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{route("articulo.create")}}" method="POST">
                  @csrf

                  <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Codigo</label>
                    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtcodigo">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtdescripcion">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Unidad</label>
                    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtunidad">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">FK_plantilla</label>
                    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtidplantilla">
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
          <btn class="btn btn-success" data-bs-toggle="modal" data-bs-target="#registrarArticulo">Registrar articulo</btn>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Codigo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Unidad</th>
                <th scope="col">FK_plantilla</th>
                <th scope="col">Nombre_plantilla</th>
                <th></th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach($datos as $item)
              <tr>
                <th>{{$item->ID}}</th>
                <td>{{$item->Codigo}}</td>
                <td>{{$item->Descripcion}}</td>
                <td>{{$item->Unidad}}</td>
                <td>{{$item->ID_plantilla}}</td>
                <td>{{$item->plantilla ? $item->plantilla->Nombre : 'Sin plantilla asociada'}}</td>

                <td><a href="" data-bs-toggle="modal" data-bs-target="#editarArticulo{{$item->ID}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="{{route("articulo.delete", $item->ID)}}" onclick="return res()" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a></td>

<!-- Modal para modificar datos-->
<div class="modal fade" id="editarArticulo{{$item->ID}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar datos del articulo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route("articulo.update")}}" method="post">
          @csrf
          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Id de articulo</label>
            <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtid" value="{{$item->ID}}" readonly>
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Codigo</label>
            <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtcodigo" value="{{$item->Codigo}}">
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtdescripcion" value="{{$item->Descripcion}}">
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Unidad</label>
            <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtunidad" value="{{$item->Unidad}}">
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">FK_plantilla</label>
            <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtidplantilla" value="{{$item->ID_plantilla}}">
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