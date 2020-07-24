@include('head')
@include('navbar')


<body>

    <div class="container  mt-5">
        <div class="row justify-content-center">

            <form action="{{ url('/nuevo') }}" id="multiselectForm" method="POST" enctype="multipart/form-data">
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <h1 class="mb-5">Crear usuario</h1>
                <div class="alert text-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <div class="success alert alert-success" id="success">
                    Usuario creado exitosamente.!
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Nombres</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Apellido Paterno</label>
                        <input type="text" class="form-control" id="ape_paterno" name="ape_paterno">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Apellido Materno</label>
                        <input type="text" class="form-control" id="ape_materno" name="ape_materno">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">RUT</label>
                        <input type="text" class="form-control" id="rut" name="rut">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="custom-file col-6">
                    <div class="preview-uploaded-image">
                    </div>
                    <input type="file" class="custom-file-input" id="imagen" name="imagen">
                    <label class="custom-file-label" for="customFile">Subir Imagen</label>
                </div>
                <button type="submit" class="btn btn-success float-right form_submit" id="form_submit">Guardar</button>
            </form>
        </div>
</body>




@include('footer')

<script>
    /*  oculto la ventana de success, confirmación de usuario creado. */
    $('#success').hide();

    /*  llamada a mi formulario y creación de instancia formData, para despues enviar todos los parametros por ajax a la url de creación de un nuevo usuario en el controlador. */
    $('#multiselectForm').on('submit', (function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ route('mantenedor.nuevo') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            complete: function(response) {
                if ($.isEmptyObject(response.responseJSON.error)) {
                    $('.success').show(); /* mostramos un mensaje de confirmación en respuesta de retorno del controlador cuando se crea un nuevo usuario. */
                    setTimeout(function() {
                        $('#success').hide(); /* ocultamos el mensaje de confirmación de creación de un nuevo usuario cuando pase el tiempo asignado. */
                    }, 3000);

                } else {
                    printErrorMsg(response.responseJSON.error);
                }
                $('#nombre').val('');
                $('#ape_paterno').val('');
                $('#ape_materno').val('');
                $('#rut').val('');        /* vaciamos todos los inputs para no generar confusión al momento de crear nuevamente otro usuario sin problemas. */
                $('#fecha_nac').val('');
                $('#email').val('');
                $('#password').val('');
                $('#imagen').val('');
            }

        });
    }));

    function printErrorMsg(msg) {
        $(".print-error-msg").find("ul").html('');         
        $(".print-error-msg").css('display', 'block');
        $.each(msg, function(key, value) {
            $(".print-error-msg").find("ul").append('<li>' + value + '</li>');   /* buscamos y creamos una funcion para generar el mensaje con las validaciones que no pasaron en la clase asignada, generando los errores de ingresos errones*/
        });
    }

</script>
