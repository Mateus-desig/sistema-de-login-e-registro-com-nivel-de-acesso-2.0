<?php
    // Inserir conaxao com o banco de dados
    include ('conexao.php');
    session_start();
    //Verificar se os campos de registro estão vazio
    if(empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha'])) {
        header("Location: ../registrar.php");
        exit();
    }
    // Pegar dados do formulario de resgistro
    $nome = mysqli_real_escape_string($conn ,$_POST['nome']);
    $email = mysqli_real_escape_string($conn ,$_POST['email']);
    $senha = mysqli_real_escape_string($conn ,$_POST['senha']);
    $nivel = mysqli_real_escape_string($conn ,$_POST['nivel']);
    $senhaSegura = password_hash($senha, PASSWORD_BCRYPT);

    //Pegar registro do banco de dados
    $registro = $conn->query("SELECT * FROM login_tb WHERE email = '$email'");
    //verificar se o registro existe
    if(mysqli_num_rows($registro) == 1){
        $_SESSION['msg'] = "<div class='msg_serv_negative'><p>Este email ja esta registrado!</p></div>";
        header("Location: ../registrar.php");
    }else{
        // Inserir dados no banco de dados
        $insert = $conn->query("INSERT INTO login_tb (nome,email,senha,nivel) VALUES ('$nome','$email','$senhaSegura','$nivel')");
        $_SESSION['msg'] = "<div class='msg_serv_positiva'><p>Registro enviado com sucesso faça login!</p></div>";
        header("Location: ../registrar.php");
    }
