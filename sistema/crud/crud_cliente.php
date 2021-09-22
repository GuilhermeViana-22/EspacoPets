<?php
include "banco.php";
# verifica se o campo ativo possui algum valor , senão ele atribui o N e salva no banco
if(isset($_REQUEST["ativo"])) {
    $ativo = $_REQUEST["ativo"];
}  else {
    $ativo = "N";
}
if(isset($_REQUEST["id_cliente"])) {
    if(isset($_REQUEST["excluir"])) {
          
        $consulta = "DELETE FROM cliente WHERE id_cliente = " . $_REQUEST["id_cliente"];
        # a variavel operacao está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
        # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
        $operacao = 3;
    } else {
        $consulta = "UPDATE cliente SET nome = '".$_REQUEST["nome"]."', sobrenome = '".$_REQUEST["sobrenome"]."', dt_nascimento = '".$_REQUEST["dt_nascimento"]."', cpf = '".$_REQUEST["cpf"]."', email = '".$_REQUEST["email"]."', sexo = '".$_REQUEST["sexo"]."', telefone = '".$_REQUEST["telefone"]."', logradouro = '".$_REQUEST["logradouro"]."', num_comp = '".$_REQUEST["num_comp"]."', cidade = '".$_REQUEST["cidade"]."', estado = '".$_REQUEST["estado"]."', ativo = '".$_REQUEST["ativo"]."', cep ='".$_REQUEST["cep"]."' WHERE id_cliente = ".$_REQUEST["id_cliente"]."";
                # a variavel operação está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
                # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
        $operacao = 2;
    }
} else {
    $consulta = "INSERT INTO cliente (nome,sobrenome,dt_nascimento,cpf,email,sexo,telefone,logradouro,num_comp,cidade,estado,ativo,cep) VALUES ('".$_REQUEST["nome"]."','".$_REQUEST["sobrenome"]."','".$_REQUEST["dt_nascimento"]."','".$_REQUEST["cpf"]."','".$_REQUEST["email"]."','".$_REQUEST["sexo"]."','".$_REQUEST["telefone"]."','".$_REQUEST["logradouro"]."','".$_REQUEST["num_comp"]."','".$_REQUEST["cidade"]."','".$_REQUEST["estado"]."','".$ativo."', '".$_REQUEST["cep"]."')";
            # a variavel operação está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
            # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
    $operacao = 1;
    
}
var_dump($consulta);
$query = $conexao->query($consulta);



#verifica se houve algum erro  do crud e concatena com a variavel local operação
if(!$query) {
    header("Location: cad_cliente.php?erro=" . $operacao); 
   
} else {
    header("Location: cad_cliente.php?sucesso=" . $operacao);
    

    
}

?>