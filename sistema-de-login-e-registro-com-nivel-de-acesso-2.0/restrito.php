<?php
  include ('php/logout.php');
  // A sessão precisa ser iniciada em cada página diferente
  if (!isset($_SESSION)) session_start();

  $nivel_necessario = 10;

  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] <$nivel_necessario)) {
      // Destrói a sessão por segurança
      session_destroy();
      // Redireciona o visitante de volta pro login
      header("Location: index.php"); exit;
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tecnologi</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="infor">
        <h1>AREA RESTRITA</h1>
        <h2>Nivel de acesso: <?php echo ($_SESSION['UsuarioNivel']); ?></h2>
        <h3>Nome: <?php echo ($_SESSION['UsuarioNome']); ?></h3>
    </div><br/>
    <span id="sair"><a href="?acao=sair">sair</a></span>

</body>
</html>