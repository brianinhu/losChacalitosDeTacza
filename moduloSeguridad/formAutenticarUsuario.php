<?php
class FormAutenticarUsuario
{
    public function formAutenticarUsuarioShow()
    {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style>
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                }

                form {
                    display: flex;
                    flex-direction: column;
                    width: 200px;
                    margin: 0 auto;
                }

                label {
                    margin-top: 10px;
                }

                input {
                    margin-top: 5px;
                }

                button {
                    margin-top: 10px;
                    padding: 5px;
                    background-color: #007bff;
                    color: white;
                    border: none;
                    cursor: pointer;
                }
            </style>
        </head>

        <body>
            <h1>Autenticación de Usuario</h1>
            <form name="formAutenticar" action="moduloSeguridad/prevalidarForm.php" method="post">
                <label for="usuario">Usuario:</label>
                <input type="text" name="txtUsuario" id="usuario">
                <label for="password">Contraseña:</label>
                <input type="password" name="txtPassword" id="password">
                <button type="button" name="btnIngresar" id="btnIngresar" onclick="javascript:autenticarForm()">Ingresar</button>
            </form>
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function autenticarForm() {
                    var usuario = document.getElementById("usuario").value;
                    var password = document.getElementById("password").value;
                    $.ajax({
                        type: "POST",
                        url: "moduloSeguridad/prevalidarForm.php",
                        data: {
                            txtUsuario: usuario,
                            txtPassword: password,
                            btnIngresar: "btnIngresar"
                        },
                        success: function(response) {
                            if (response['flag'] == 1) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Éxito',
                                    text: 'Usuario autenticado',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function() {
                                    window.location.href = response['redirect'];
                                });
                            } else if (response['flag'] == 2) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response['message']
                                });
                            }
                        }
                    });

                }
            </script>

        </body>

        </html>
<?php
    }
}
?>