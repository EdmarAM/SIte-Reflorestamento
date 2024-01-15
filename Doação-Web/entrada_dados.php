<?php
    require_once ("conecta.php");
    $start_time = time();
    while (time() - $start_time < 3) {
    }
    if (isset($_POST['register'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = ($_POST['senha']);
    
        $sql = "INSERT INTO usuariodoador (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        if ($conn->query($sql) === TRUE) {
            // Registro bem-sucedido, redirecione para a página de login
            header("Location: Login.html");
            exit(); // Certifique-se de sair para evitar a execução adicional do código
        } else {
            echo "Erro no registro: " . $conn->error;
        }
    }
    
    session_start();
    $start_time = time();
    while (time() - $start_time < 3) {
    }

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
    
        $sql = "SELECT id, nome, senha FROM usuariodoador WHERE email='$email'";
        $result = $conn->query($sql);
    
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($senha == $row['senha']) {
                // Inicia a sessão
                $_SESSION['id'] = $row['id'];
                $_SESSION['nome'] = $row['nome'];
                
                // Redireciona para a página inicial
                header("Location: index.php");
                exit();
            } else {
                header("Location: login.html");
            }
        } else {
            header("Location: login.html");
        }
    }
    
    $conn->close();
    ?>