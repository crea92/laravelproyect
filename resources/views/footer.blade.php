<footer>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- librerias inputmask -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/css/inputmask.min.css" rel="stylesheet" />



    <script>
        /* contiene los nombres de las imagenes con demasiado caracteres y no visualizarse fuera del input */
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        /* Agrego una mask para que se genere un formato de ingreso al rut y no generar un ingreso erroneo. */

        $(document).ready(function() {
            $("#rut").inputmask({
                mask: "9[9.999.999]-[9|K|k]",
            });


        });
        /* Eliminación de usuario con modal, llamada al modal */
        $(document).on('click', '.deleteUser', function() {
            var userID = $(this).attr('data-userid');
            $('#app_id').val(userID);
            $('#applicantDeleteModal').modal('show');

        });

    </script>

</footer>
