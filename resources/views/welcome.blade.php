<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
  <h1 class="text-center p-3">CRUD en Laravel - por Carlos Solis</h1>
  <div class="p-5 table-responsive">

    @if(session("correcto"))
    <div class="alert alert-success">{{ session("correcto") }}</div>
    @endif

    @if(session("incorrecto"))
    <div class="alert alert-danger">{{ session("incorrecto") }}</div>
    @endif

    <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Agregar producto</button>
    {{-- Modal de agregar producto  --}}
    <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar producto</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            {{-- Form --}}
            <form action="{{route("crud.create")}}" method="post">
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtNombre">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Precio</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtPrecio">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cantidad</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtCantidad">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Registrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <table class="table table-striped table-bordered table-hover">
      <thead class="bg-dark text-white">
        <tr>
          <th scope="col">CODIGO</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">PRECIO</th>
          <th scope="col">CANTIDAD</th>
          <th scope="col">ACCIONES</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        @foreach($datos as $dato)
        <tr>
          <th>{{ $dato->id }}</th>
          <td>{{ $dato->nombre }}</td>
          <td><b>$</b>{{ $dato->precio }}</td>
          <td>{{ $dato->cantidad }}</td>
          <td class="text-center">
            <a href="" data-bs-toggle="modal" data-bs-target="#modalEditar{{ $dato->id }}" class="btn btn-primary btn-sm">
              <i class="bi bi-pen-fill"></i>
            </a>
            <a href="{{route("crud.delete", $dato->id)}}" class="btn btn-danger btn-sm">
              <i class="bi bi-trash-fill"></i>
            </a>
          </td>

          {{-- Modal de moficar producto  --}}
          <div class="modal fade" id="modalEditar{{ $dato->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar datos del producto</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  {{-- Form --}}
                  <form action="{{route("crud.update")}}" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Codigo del producto</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtCodigo" value="{{ $dato->id }}" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nombre</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtNombre" value="{{ $dato->nombre }}">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Precio</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtPrecio" value="{{ $dato->precio }}">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Cantidad</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtCantidad" value="{{ $dato->cantidad }}">
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
