@include('head')
@include('navbar')

<body>
    <div class="container  mt-5">

        <div class="row justify-content-center">

            <form action="{{ route('mantenedor.actualizar') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="{{ isset($usuarios['id']) ? $usuarios['id'] : 0 }}">
                @csrf
                <h1 class="mb-5">Editar usuario</h1>
                
                @if(isset($errors))                                        {{-- muestro los errores de validacion que no pasaron. --}}
                    @if($errors->all())
                        <div class="alert bg-blue" style="text-align: justify;">
                            @foreach($errors->all() as $content)
                                <li>{{ $content }}</li>
                            @endforeach
                        </div>
                    @endif
                @endif

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Nombres</label>
                        <input type="text" class="form-control" name="nombre"
                            value="{{ isset($usuarios['nombre']) ? $usuarios['nombre'] : '' }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Apellido Paterno</label>
                        <input type="text" class="form-control" name="ape_paterno"
                            value="{{ isset($usuarios['ape_paterno']) ? $usuarios['ape_paterno'] : '' }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Apellido Materno</label>
                        <input type="text" class="form-control" name="ape_materno"
                            value="{{ isset($usuarios['ape_materno']) ? $usuarios['ape_materno'] : '' }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">RUT</label>
                        <input type="text" class="form-control" name="rut" id="rut"
                            value="{{ isset($usuarios['rut']) ? $usuarios['rut'] : '' }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" name="fecha_nac" id="date"
                            value="{{ isset($usuarios['fecha_nac']) ? $usuarios['fecha_nac'] : '' }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Email</label>
                        <input type="text" class="form-control" name="email"
                            value="{{ isset($usuarios['email']) ? $usuarios['email'] : '' }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Contraseña</label>
                        <input type="password" class="form-control" name="password"
                            value="{{ isset($usuarios['password']) ? $usuarios['password'] : '' }}">

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <img src="{{ url('images/' . $usuarios->imagen) }}" class="rounded float-left" alt="">
                    </div>
                </div>
                <div class="custom-file col-6">
                    <input type="file" class="custom-file-input" name="imagen"
                        value="{{ isset($usuarios['imagen']) ? $usuarios['imagen'] : '' }}">

                    <label class="custom-file-label" for="customFile">Subir Imagen</label>
                </div>
                <button type="submit" class="btn btn-success float-right">Guardar</button>
            </form>

        </div>

</body>



@include('footer')
