<?php
include "banco.php";
$arquivo = $_FILES['arquivo'];

# verifica se o campo ativo possui algum valor , senão ele atribui o N e salva no banco
if (isset($_REQUEST["ativo"])) {
    $ativo = $_REQUEST["ativo"];
} else {
    $ativo = "N";
}


if ($arquivo !== null) {
    preg_match("/\.(png|jpg|jpeg){1}$/i", $arquivo["name"], $ext);

    if ($ext == true) {
        $nome_arquivo = md5(uniqid(time())) . "." . $ext[1];
        $caminho_aquivo = "img/". $nome_arquivo ;
        #move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome);
        move_uploaded_file($arquivo["tmp_name"], $caminho_aquivo);
        var_dump($caminho_arquivo);
    }
}


if (isset($_REQUEST["id_animal"])) {
    if (isset($_REQUEST["excluir"])) {

        $consulta = "DELETE FROM animal WHERE id_animal = " . $_REQUEST["id_animal"];
        # a variavel operacao está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
        # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
        $operacao = 3;
    } else {
        $consulta = "UPDATE animal SET nome_animal = '" . $_REQUEST["nome_animal"] . "', raca = '" . $_REQUEST["raca"] . "', rga = '" . $_REQUEST["rga"] . "', idade = '" . $_REQUEST["idade"] . "', tipo = '" . $_REQUEST["tipo"] . "', sexo = '" . $_REQUEST["sexo"] . "', observacao ='" . $_REQUEST["observacao"] . "', ativo = '" . $_REQUEST["ativo"] . "' , imagem = '" . $nome_arquivo . "' WHERE id_animal = " . $_REQUEST["id_animal"] . "";
        # a variavel operação está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
        # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
        $operacao = 2;
    }
} else {
    $consulta = "INSERT INTO animal (nome_animal,raca,rga,idade,tipo,sexo,observacao,ativo,imagem,id_usuario) VALUES ('" . $_REQUEST["nome_animal"] . "','" . $_REQUEST["raca"] . "','" . $_REQUEST["rga"] . "','" . $_REQUEST["idade"] . "','" . $_REQUEST["tipo"] . "','" . $_REQUEST["sexo"] . "','" . $_REQUEST["observacao"] . "','" . $_REQUEST["ativo"] . "','" . $nome_arquivo . "','" . $_SESSION["id_usuario"] . "')";
    # a variavel operação está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
    # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
    $operacao = 1;
}
var_dump($consulta);

$query = $conexao->query($consulta);

#verifica se houve algum erro  do crud e concatena com a variavel local operação
if (!$query) {
    header("Location: ../cad_animal.php?erro=" . $operacao);
} else {
   header("Location: ../cad_animal.php?sucesso=" . $operacao);
}
