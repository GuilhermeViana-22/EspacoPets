<?php

$arquivo = $_FILES['arquivo'];

if($arquivo !== null){
preg_match("/\.(png|jpg|jpeg){1}$/i",$arquivo["name"],$ext);

if($ext== true){
$nome_arquivo = md5(uniqid(time())).".".$ext[1];
$caminho_aquivo = "documetos/".$nome_arquivo;

move_uploaded_file($imagens["tmp_name"],$caminho_arquivo);


$consulta = "INSERT INTO imagem (nome_imagem,id_animal) VALUES ('".$nome_arquivo."','".$_REQUEST["id_animal"]."')";
$query = $conexao->query($consulta);


}
}

if(!$query) {
    header("Location: ../cad_animal.php?erro=" . 1);
} else {
    header("Location: ../cad_animal.php?sucesso=" . 1);
}
