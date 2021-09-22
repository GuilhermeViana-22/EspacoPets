<?php
include "banco.php";
# verifica se o campo ativo possui algum valor , senão ele atribui o N e salva no banco
if(isset($_REQUEST["ativo"])) {
    $ativo = $_REQUEST["ativo"];
}  else {
    $ativo = "N";
}
if(isset($_REQUEST["id_endereco"])) {
    if(isset($_REQUEST["excluir"])) {
          
        $consulta = "DELETE FROM endereco WHERE id_endereco = " . $_REQUEST["id_endereco"];
        # a variavel operacao está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
        # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
        $operacao = 3;
    } else {
        $consulta = "UPDATE endereco SET  telefone = '".$_REQUEST["telefone"]."', logradouro = '".$_REQUEST["logradouro"]."', complemento = '".$_REQUEST["complemento"]."' , num = '".$_REQUEST["num"]."', cidade = '".$_REQUEST["cidade"]."', bairro = '".$_REQUEST["bairro"]."', estado = '".$_REQUEST["estado"]."', ativo = '".$_REQUEST["ativo"]."', cep ='".$_REQUEST["cep"]."' , regiao ='".$_REQUEST["regiao"]."' WHERE id_endereco = ".$_REQUEST["id_endereco"]."";
                # a variavel operação está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
                # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
        $operacao = 2;
    }
} else {
    $consulta = "INSERT INTO endereco (telefone,logradouro,num,complemento,bairro,cidade,estado,ativo,cep, regiao ,id_usuario) VALUES ('".$_REQUEST["telefone"]."','".$_REQUEST["logradouro"]."','".$_REQUEST["num"]."','".$_REQUEST["complemento"]."','".$_REQUEST["bairro"]."','".$_REQUEST["cidade"]."','".$_REQUEST["estado"]."','".$ativo."', '".$_REQUEST["cep"]."' , '".$_REQUEST["regiao"]."','".$_SESSION["id_usuario"]."')";
            # a variavel operação está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
            # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
    $operacao = 1;
    
}

var_dump($consulta);
$query = $conexao->query($consulta);



#verifica se houve algum erro  do crud e concatena com a variavel local operação
if(!$query) {
    header("Location: ../cad_endereco.php?erro=" . $operacao); 
   
} else {
    header("Location: ../cad_endereco.php?sucesso=" . $operacao);
    

    
}

?>