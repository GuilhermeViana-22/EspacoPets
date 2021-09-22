<?php
include "banco.php";
if(isset($_REQUEST["ong"])) {
    $TipoU = $_REQUEST["ong"];
}  else {
    $TipoU = "Cliente";
}



$email_usuario = $_REQUEST["emailc"];
$verifica =  $conexao->query("SELECT email FROM usuario WHERE email = '" . $email_usuario . "'");

if ($verifica->num_rows > 0) {
    header("Location: login2.php?erroc=2");
} else {
    $consulta = "INSERT INTO usuario (nome_fantasia,cnpj,tipo_usuario, email, senha) VALUES ('" . $_REQUEST["nomec"] . "','" . $_REQUEST["cnpjc"] . "','" .$TipoU. "','" . $_REQUEST["emailc"] . "','" . $_REQUEST["senhac"] . "')";
    $query = $conexao->query($consulta);
    #verifica se houve algum erro  do crud e concatena com a variavel local operação
    if (!$query) {
        var_dump($consulta);
       header("Location: ../login2.php?erroc=" . 1);
    } else {
       header("Location: ../login2.php?sucessoc=" . 1);
    }
}
