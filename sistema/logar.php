<?php
include 'banco.php';

    $email_usuario = $_REQUEST["email"];
    $senha_usuario = $_REQUEST["senha"];
    $query = $conexao->query("SELECT * FROM usuario WHERE email = '" . $email_usuario . "' AND senha = '" . $senha_usuario . "'");
    
    if($query->num_rows > 0) {
        
        $_SESSION["email"] = $email_usuario;
        while($dados = $query->fetch_assoc()) {
            $_SESSION["nome"] = $dados["nome"];
            $_SESSION["usuario"] = $dados["usuario"];
            $_SESSION["id_usuario"] = $dados["id_usuario"];
        }
    
        header("Location: inicial.php");
    
    } else {
    
        header("Location: login2.php?erro=1");
    
    }
    ?>