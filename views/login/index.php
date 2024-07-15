<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="public/css/login.css">
</head>
<body>
  <style>
    /* Reset some basic styles */
/* Reset some basic styles */
body, html {
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100%;
    font-family: Arial, sans-serif;
    background: #f1f1f1;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-box {
    width: 300px;
    padding: 40px;
    position: relative;
    background: #fff;
    text-align: center;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
    border-radius: 10px;
}

.login-box h2 {
    margin: 0 0 30px;
    padding: 0;
    color: #333;
    text-transform: uppercase;
}

.textbox {
    position: relative;
    margin-bottom: 30px;
}

.textbox input {
    width: 100%;
    padding: 10px;
    background: #f1f1f1;
    border: none;
    outline: none;
    color: #333;
    font-size: 18px;
    border-radius: 5px;
}

.textbox input::placeholder {
    color: #999;
}

.btn {
    width: 100%;
    background: #333;
    border: none;
    padding: 10px;
    cursor: pointer;
    font-size: 18px;
    color: #fff;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.btn:hover {
    background: #555;
}

.footer {
    margin-top: 20px;
}

.footer a {
    color: #333;
    text-decoration: none;
    font-size: 14px;
    transition: color 0.3s ease;
}

.footer a:hover {
    color: #555;
}


  </style>
<div class="container">
        <div class="login-box">
            <h2>Inicio de Sesión</h2>
            <form action="/dashboard/gestion%20de%20ambientes/login/login" method="POST">
                <div class="textbox">
                    <input type="text" id="login" name="login" placeholder="Correo" required>
                </div>
                <div class="textbox">
                    <input type="password" id="password" name="password" placeholder="Clave" required>
                </div>
                <input type="submit" class="btn" value="Ingresar">
                <div class="footer">
                    <a href="#">Recuperar contraseña</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>