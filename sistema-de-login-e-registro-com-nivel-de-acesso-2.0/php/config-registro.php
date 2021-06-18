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
    $registro = $conn->query("SELECT email FROM login_tb");
    //verificar se o registro existe
    if(mysqli_num_rows($registro) >= 1){
        $_SESSION['msg'] = "<div class='msg_serv_negative'><p>Este email ja esta registrado!</p></div>";
        header("Location: ../registrar.php");
    }else{
        // Inserir dados no banco de dados
        $insert = $conn->query("INSERT INTO login_tb (nome,email,senha,nivel) VALUES ('$nome','$email','$senhaSegura','$nivel')");
        $_SESSION['msg'] = "<div class='msg_serv_positiva'><p>Registro enviado com sucesso faça login!</p></div>";
        header("Location: ../registrar.php");
    }







    // $verifi = "SELECT * FROM login_tb";
    // $result = mysqli_query($conn, $verifi);

    // if(mysqli_query($conn, $insert)){

    //     $verifi = "SELECT * FROM login_tb";
    //     $result = mysqli_query($conn, $verifi);
    //     $resultado = mysqli_fetch_assoc($result);

    //     if($email == $resultado['email']){
    //         $_SESSION['msg'] = "<div class='msg_serv_negative'><p>Este email ja esta registrado!</p></div>";
    //         header("Location: ../registrar.php");
    //     }else{
    //         $_SESSION['msg'] = "<div class='msg_serv_positiva'><p>Registro enviado com sucesso faça login!</p></div>";
    //         header("Location: ../registrar.php");
    //     }
    // }else{
    //     $_SESSION['msg'] = "<div class='msg_serv_negative'><p>Erro do servidor interno!</p></div>";
    //     header("Location: ../registrar.php");
    // }
