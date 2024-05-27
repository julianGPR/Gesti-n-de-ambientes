<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Clave</title>
    <link rel="stylesheet" href="Estilos/estilos.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
            border-radius: 10px;
        }

        .login-form {
            text-align: center;
            margin-top: 20px;
            width: 100%;
        }

        .add-button {
            background-color: #28c530;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        .add-button:hover {
            background-color: #4caf50;
        }

        #clave {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #instrucciones, #info-bd {
            margin-top: 30px;
            text-align: center;
        }

        #instrucciones h3, #info-bd p {
            font-size: 16px;
            margin: 10px 0;
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

        @media (max-width: 600px) {
            body {
                padding: 10px;
            }

            .container {
                width: 100%;
                box-shadow: none;
                background-color: transparent;
            }

            .login-form h2, #instrucciones h3, #info-bd p {
                font-size: 14px;
            }

            .add-button {
                font-size: 14px;
                padding: 8px 16px;
            }

            #clave {
                font-size: 14px;
            }

            .logo {
                width: 80px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <img src="Imagenes/logoSena1.png" alt="Logo" class="logo">
    <div class="login-form">
        <h2>Bienvenido al Sistema de Gestión y Control de Ambientes de Formación CDM</h2>
        <p>Por favor, ingrese su clave para acceder al sistema.</p>
        <form method="post" action="validar_clave.php" id="form-ingreso">
            <label for="clave">Clave:</label>
            <div class="form-control">
                <input type="password" name="clave" id="clave" required>
                <p></p>
            </div>
            <input type="button" value="Ingresar" class="add-button" id="ingresar">
        </form>
    </div>

    <div id="instrucciones">
        <h3>Instrucciones de Ingreso</h3>
        <p>Utilice la clave asignada para ingresar al sistema, asegurese de que el aula de formación esté debidamente marcada.</p>
    </div>

    <div id="info-bd">
        <p>Contiene información sobre ambientes de formación, computadores y reportes asociados a estos. Recuerde realizar cualquier novedad dentro del aplicativo.</p>
    </div>
</div>

<script>
    window.addEventListener('load', () => {
        const claveInput = document.getElementById('clave');
        const ingresarButton = document.getElementById('ingresar');
        const form = document.getElementById('form-ingreso');

        ingresarButton.addEventListener('click', (e) => {
            e.preventDefault();
            validaClave();
        });

        const validaClave = () => {
            const claveValor = claveInput.value.trim();

            if (claveValor !== "") {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'validar_clave.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function () {
                    if (xhr.status == 200) {
                        const response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            validaOk(claveInput);
                            alert("Clave correcta. ¡Bienvenido al sistema!");

                            const redirectUrl = response.redirect ? response.redirect : 'index.php';
                            window.location.href = redirectUrl;
                        } else {
                            validaFalla(claveInput, response.message);
                        }
                    }
                };
                xhr.send('clave=' + claveValor);
            } else {
                validaFalla(claveInput, 'Ingrese una clave');
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
