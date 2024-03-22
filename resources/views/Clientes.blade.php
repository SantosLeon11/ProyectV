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
        <h1 class= "text-center p-3">Clientes</h1>
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

        <!--Modal para crear un cliente -->
        <div class="modal fade" id="registrarCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{route("cliente.create")}}" method="POST">
                  @csrf

                  <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Razon social</label>
                    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtrazonsocial">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">RFC</label>
                    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtrfc">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Contacto</label>
                    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtcontacto">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Direccion</label>
                    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtdireccion">
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
          <btn class="btn btn-success" data-bs-toggle="modal" data-bs-target="#registrarCliente">Registrar cliente</btn>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Razon social</th>
                <th scope="col">RFC</th>
                <th scope="col">Contacto</th>
                <th scope="col">Direccion</th>
                <th></th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach($datos as $item)
              <tr>
                <th>{{$item->ID}}</th>
                <td>{{$item->Razon_social}}</td>
                <td>{{$item->Rfc}}</td>
                <td>{{$item->Contacto}}</td>
                <td>{{$item->Direccion}}</td>
                <td><a href="" data-bs-toggle="modal" data-bs-target="#editarCliente{{$item->ID}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="{{route("cliente.delete", $item->ID)}}" onclick="return res()" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a></td>

<!-- Modal para modificar datos-->
<div class="modal fade" id="editarCliente{{$item->ID}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar datos de cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route("cliente.update")}}" method="post">
          @csrf
          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Codigo de cliente</label>
            <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtcodigo" value="{{$item->ID}}" readonly>
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Razon social</label>
            <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtrazonsocial" value="{{$item->Razon_social}}">
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">RFC</label>
            <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtrfc" value="{{$item->Rfc}}">
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Contacto</label>
            <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtcontacto" value="{{$item->Contacto}}">
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Direccion</label>
            <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textlHelp" name="txtdireccion" value="{{$item->Direccion}}">
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