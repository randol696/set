<!DOCTYPE html>
  <html lang="ES">
    <head>
      <title>CSS Template</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <header>
  <h2>Inadeh</h2>
</header>
<body>
  <div id="form">
      <form method="POST" action="seguridad/login_accion.php">
        <a>Acceso al sistema<br></a>
        <a>Usuario:</a>
        <input type="email" name="email" class="textbox" >
        <a>Contraseña:</a>
        <input type="password" name="password" class="textbox">
        <input id="submit" type="submit" name="Entrar">
            <footer class="clearfix">
                <p><span class="info">?</span><a href="nuevo_usuario.php">Registrate</a></p>
            </footer>
      </form>

</body>
</html>