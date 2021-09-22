<?php
include "banco.php";
# verifica se o campo ativo possui algum valor , senão ele atribui o N e salva no banco
if(isset($_REQUEST["ativo"])) {
    $ativo = $_REQUEST["ativo"];
}  else {
    $ativo = "N";
}
if(isset($_REQUEST["Cod_funcionario"])) {
    if(isset($_REQUEST["excluir"])) {
          
        $consulta = "DELETE FROM usuario WHERE id_cliente = " . $_REQUEST["id_cliente"];
        # a variavel operacao está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
        # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
        $operacao = 3;
    } else {
        $consulta = "UPDATE usuario SET nome_fantasia = '".$_REQUEST["nome_fantasia"]."', rg = '".$_REQUEST["rg"]."', cpf = '".$_REQUEST["cpf"]."', sexo = '".$_REQUEST["sexo"]."', telefone = '".$_REQUEST["telefone"]."', dt_nascimento = '".$_REQUEST["dt_nascimento"]."', email = '".$_REQUEST["email"]."', Cep = '".$_REQUEST["Cep"]."', logradouro = '".$_REQUEST["logradouro"]."', num_comp = '".$_REQUEST["num_comp"]."', cidade = '".$_REQUEST["cidade"]."', estado = '".$_REQUEST["estado"]."', cargo ='".$_REQUEST["cargo"]."', salario ='".$_REQUEST["salario"]."', horas ='".$_REQUEST["horas"]."', dt_admicao ='".$_REQUEST["dt_admicao"]."', ativo ='".$_REQUEST["ativo"]."', senha ='".$_REQUEST["senha"]."' WHERE Cod_funcionario = '".$_REQUEST["Cod_funcionario"]."'";
                # a variavel operação está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
                # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
        $operacao = 2;
    }
} else {
    $consulta = "INSERT INTO usuario (nome,cpf,rg,sexo,telefone,dt_nascimento,email,Cep,logradouro,num_comp,cidade,estado,cargo,salario,horas,dt_admicao,ativo,senha) VALUES ('".$_REQUEST["nome"]."','".$_REQUEST["cpf"]."','".$_REQUEST["rg"]."','".$_REQUEST["sexo"]."','".$_REQUEST["telefone"]."','".$_REQUEST["dt_nascimento"]."','".$_REQUEST["email"]."','".$_REQUEST["Cep"]."','".$_REQUEST["logradouro"]."','".$_REQUEST["num_comp"]."','".$_REQUEST["cidade"]."','".$_REQUEST["estado"]."','".$_REQUEST["cargo"]."','".$_REQUEST["salario"]."','".$_REQUEST["horas"]."','".$_REQUEST["dt_admicao"]."','".$ativo."', '".$_REQUEST["senha"]."')";
            # a variavel operação está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
            # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
    $operacao = 1;
}
#var_dump($consulta);
$query = $conexao->query($consulta);

#verifica se houve algum erro  do crud e concatena com a variavel local operação
if(!$query) {
   header("Location: cad_funcionariov2.php?erro=" . $operacao);
} else {
   header("Location: cad_funcionariov2.php?sucesso=" . $operacao);
}