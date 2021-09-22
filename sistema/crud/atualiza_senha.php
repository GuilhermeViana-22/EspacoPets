<?php
include 'banco.php';
if (isset($_POST["localizar"])) {

    $novasenha = substr(md5(time()), 0, 6);
    $nsenhacript = md5(md5($novasenha));

    

    $email = $_POST['email'];
    $query = $conexao->query("SELECT * FROM usuario WHERE email = '" . $email . "'");

    if ($query->num_rows > 0) {

        $dados = $query->fetch_assoc();

        header("Location: ../Esqueci_Senha.php?sucesso=1");
    } else {

        header("Location:../Esqueci_Senha.php?erroloc=1");
    }
}

if (isset($_POST["atualizar"])) {

    //$email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $nsenha = $_POST['nsenha'];
    $sql = "UPDATE usuario set senha = '$_POST[nsenha]' where  email = '$_POST[email]'";
    $resul = $conexao->query($sql);
    //  var_dump($sql)
    $linhasAfetadas = $conexao->affected_rows;
    if ($linhasAfetadas > 0) {
        header("Location: ../Esqueci_Senha.php?sucesso=2");
        mysqli_close($conexao);
    } else {
        header("Location: ../Esqueci_Senha.php?erro=2");
        mysqli_close($conexao);
    }
}
