<?php
include 'banco.php';
if (isset($_POST["localizar"])) {
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$query = $conexao->query("SELECT * FROM funcionario WHERE email = '" . $email . "'");
    
    if($query->num_rows > 0) {
        
    
        header("Location: Esqueci_Senha.php?sucesso=1");
    
    } else {
    
        header("Location: Esqueci_Senha.php?erroloc=1");
    
    }
}

if (isset($_POST["atualizar"])) {
                                               
    //$email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $nsenha = $_POST['nsenha'];
    $sql = "UPDATE funcionario set senha = '$_POST[nsenha]' where  email = '$_POST[email]'";
   $resul = $conexao->query($sql);
 //  var_dump($sql)
    $linhasAfetadas = $conexao->affected_rows;
    if ($linhasAfetadas > 0) {
        header("Location: Esqueci_Senha.php?sucesso=2");
        mysqli_close($conexao);
        
    } else { 
        header("Location: Esqueci_Senha.php?erro=2");   
        mysqli_close($conexao);
        
    }
} 