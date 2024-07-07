<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="Estilos/estilos.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 10px;
            max-width: 400px;
            width: 100%;
        }

        .login-form {
            text-align: center;
            width: 100%;
        }

        .login-form h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .login-form p {
            font-size: 16px;
            color: #666;
        }

        .add-button {
            background-color: #28c530;
            color: white;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 100%;
            margin-top: 10px;
        }

        .add-button:hover {
            background-color: #4caf50;
        }

        #clave, #correo {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        #instrucciones, #info-bd {
            margin-top: 30px;
            text-align: center;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 10px;
            width: 100%;
        }

        #instrucciones h3, #info-bd p {
            font-size: 16px;
            margin: 10px 0;
            color: #333;
        }

        .form-control {
            margin-bottom: 10px;
        }

        .falla p {
            color: red;
        }

        .ok p {
            color: green;
        }

        .logo {
            width: 100px;
            margin-bottom: 20px;
        }

        .forgot-password {
            margin-top: 15px;
        }

        .forgot-password a {
            color: #007bff;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            body {
                padding: 10px;
            }

            .container {
                width: 100%;
                box-shadow: none;
                background-color: transparent;
                padding: 20px;
            }

            .login-form h2 {
                font-size: 20px;
            }

            .add-button {
                font-size: 14px;
                padding: 10px 16px;
            }

            #clave, #correo {
                font-size: 14px;
                padding: 10px;
            }

            .logo {
                width: 80px;
            }

            #instrucciones h3, #info-bd p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <img src="Imagenes/logoSena1.png" alt="Logo" class="logo">
    <div class="login-form">
        <h2>Bienvenido al Sistema de Gestión y Control de Ambientes de Formación CDM</h2>
        <p>Por favor, ingrese su correo y clave para acceder al sistema.</p>
        <form method="post" action="validar_clave.php" id="form-ingreso">
            <label for="correo">Correo:</label>
            <div class="form-control">
                <input type="email" name="correo" id="correo" required>
                <p></p>
            </div>
            <label for="clave">Clave:</label>
            <div class="form-control">
                <input type="password" name="clave" id="clave" required>
                <p></p>
            </div>
            <input type="button" value="Ingresar" class="add-button" id="ingresar">
        </form>
        <div class="forgot-password">
            <a href="recuperar_contraseña.html">¿Olvidó su contraseña?</a>
        </div>
    </div>

    <div id="instrucciones">
        <h3>Instrucciones de Ingreso</h3>
        <p>Utilice la clave asignada para ingresar al sistema, asegúrese de que el aula de formación esté debidamente marcada.</p>
    </div>

    <div id="info-bd">
        <p>Contiene información sobre ambientes de formación, computadores y reportes asociados a estos. Recuerde realizar cualquier novedad dentro del aplicativo.</p>
    </div>
</div>

<script>
    window.addEventListener('load', () => {
        const correoInput = document.getElementById('correo');
        const claveInput = document.getElementById('clave');
        const ingresarButton = document.getElementById('ingresar');
        const form = document.getElementById('form-ingreso');

        ingresarButton.addEventListener('click', (e) => {
            e.preventDefault();
            validaIngreso();
        });

        const validaIngreso = () => {
            const correoValor = correoInput.value.trim();
            const claveValor = claveInput.value.trim();

            if (correoValor !== "" && claveValor !== "") {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'validar_clave.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function () {
                    if (xhr.status == 200) {
                        const response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            validaOk(correoInput);
                            validaOk(claveInput);
                            alert("Ingreso correcto. ¡Bienvenido al sistema!");

                            const redirectUrl = response.redirect ? response.redirect : 'index.php';
                            window.location.href = redirectUrl;
                        } else {
                            validaFalla(correoInput, response.message);
                            validaFalla(claveInput, response.message);
                        }
                    }
                };
                xhr.send('correo=' + correoValor + '&clave=' + claveValor);
            } else {
                validaFalla(correoInput, 'Ingrese su correo');
                validaFalla(claveInput, 'Ingrese su clave');
            }
        }

        const validaFalla = (input, msje) => {
            const formControl = input.parentElement;
            const aviso = formControl.querySelector('p');
            aviso.innerText = msje;
            formControl.className = 'form-control falla';
        }

        const validaOk = (input) => {
            const formControl = input.parentElement;
            formControl.className = 'form-control ok';
        }
    });
</script>

</body>
</html>
