<?php
    //Inciar seção
    session_start();
    // Inserir conaxao com o banco de dados
    include ('conexao.php');
    //Verificar se os campos de registro estão vazio
    if(empty($_POST['email']) || empty($_POST['senha'])) {
        header("Location: ../index.php");
        exit();
    }
    // Pegar dados do formulario de resgistro
    $email = mysqli_real_escape_string($conn ,$_POST['email']);
    $senha = mysqli_real_escape_string($conn ,$_POST['senha']);

    $query = "SELECT * FROM login_tb WHERE email = '$email'";

    $result = mysqli_query($conn, $query);
        // Salva os dados encontados na variável $resultado
    $resultado = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) != 1) {
        // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
        $_SESSION['msg'] = "<div class='msg_serv_negative'><p>Email ou senha errado!</p></div>";
        header("Location: ../index.php");
    } elseif (password_verify($senha , $resultado['senha'])) { // Verificar se a senha digitada no campo de login e identica com a senha criptgrafada da banco de dados

        // Se a sessão não existir, inicia uma
        if (!isset($_SESSION)) session_start();

        // Salva os dados encontrados na sessão
        $_SESSION['UsuarioID'] = $resultado['id'];
        $_SESSION['UsuarioNome'] = $resultado['nome'];
        $_SESSION['UsuarioNivel'] = $resultado['nivel'];

        // Redirecionar o visitente
        header('Location: ../restrito.php');
    }else {
        // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
        $_SESSION['msg'] = "<div class='msg_serv_negative'><p>Email ou senha errado!</p></div>";
        header("Location: ../index.php");
    }


