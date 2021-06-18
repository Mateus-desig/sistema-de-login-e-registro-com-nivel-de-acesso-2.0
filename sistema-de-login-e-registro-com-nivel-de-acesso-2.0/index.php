<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="box-form">
    <?php if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>
        <form id="form" action="php/config.php" method="post">
            <label for="email">
                <span>Email:</span>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </label>
            <label for="senha">
                <span>Senha:</span>
                <input type="password" name="senha" id="senha" placeholder="Senha" required>
            </label>

            <input type="submit" id="custon-buttom" name="entrar" title="Entrar" value="Entrar">
             <span id="registro" title="Registrar"><a href="registrar.php">Registrar</a></span>
        </form>
    </div>
</body>
</html>