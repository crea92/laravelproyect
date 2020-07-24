@include('head')

<body>

    @include('navbar')

    <div class="container  mt-5">
        <div class="row justify-content-md-center">
            <div class="col-6 mb-3">
                <h5>
                    Usuarios
                </h5>
            </div>
            <div class="col-6">
                <a href="{{ route('mantenedor.nuevo') }}" type="button"
                    class="btn btn-primary float-right pl-5 pr-5">Nuevo</a>
            </div>

            @if(Session::has('flash_message'))
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('flash_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col-12 p-0">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <input type="hidden" name="urldelete" id="urldelete" value="{{ url('/eliminar') }}">
                            <input type="hidden" name="url" id="url" value="{{ url('/') }}">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">NOMBRES</th>
                                <th scope="col">APELLIDO PATERNO</th>
                                <th scope="col">APELLIDO MATERNO</th>
                                <th scope="col">RUT</th>
                                <th scope="col">FECHA NACIMIENTO</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <th scope="row"><img src="{{ url('images/' . $usuario->imagen) }}" alt=""
                                            class="rounded-circle" style="width: 50px;"></th>
                                    <td>{{ $usuario->nombre }}</td>
                                    <td>{{ $usuario->ape_paterno }}</td>
                                    <td>{{ $usuario->ape_materno }}</td>
                                    <td>{{ $usuario->rut }}</td>
                                    <td>{{ $usuario->fecha_nac }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                        <a class="text-danger" data-toggle="modal"
                                            data-target="#custom-width-modal_{{ $usuario->id }}">Eliminar</a>
                                    </td>
                                    <td>
                                        <a
                                            href="{{ $url = route('mantenedor.editar', ['id' => $usuario->id]) }}">Editar</a>
                                    </td>

                                </tr>
                                <!-- Modal mydelete -->
                                <div id="custom-width-modal_{{ $usuario->id }}" class="modal fade" tabindex="-1"
                                    role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true"
                                    style="display: none;">
                                    <div class="modal-dialog" style="width:55%;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Eliminar Usuario</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-warning">Estás seguro que deseas eliminar este
                                                    registro?</div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary"
                                                    data-dismiss="modal">Cerrar</button>
                                                <a href="{{ url('eliminar/' . $usuario->id) }}"><button type="button"
                                                        class="btn btn-danger waves-effect waves-light">Eliminar</button></a>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                            @endforeach
                        </tbody>

                    </table>
                    {{ $usuarios->render() }}
                </div>
            </div>
        </div>
    </div>
</body>

@include('footer')

</html>
