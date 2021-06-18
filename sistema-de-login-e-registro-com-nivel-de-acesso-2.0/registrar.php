<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="box-form-registro">
        <?php if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>
        <form id="form" action="php/config-registro.php" method="post">
            <label for="email">
                <span>Nome:</span>
                <input type="nome" name="nome" id="nome" placeholder="Nome" required>
            </label>
                <label for="email">
                <span>Email:</span>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </label>
            <label for="senha">
                <span>Senha:</span>
                <input type="password" name="senha" id="senha" placeholder="Senha" required>
            </label>
            <label for="nivel">
                <span>nivel:</span>
                <input type="number" name="nivel" id="nivel" placeholder="nivel de acesso" required>
            </label>

            <input type="submit" id="custon-buttom" name="cadastrar" title="Cadastre-se" value="Cadastre-se">
             <span id="registro" title="Registrar"><a href="index.php">Login</a></span>
        </form>
    </div>
</body>
</html>