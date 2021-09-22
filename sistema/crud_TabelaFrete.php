<?php
include "banco.php";
# verifica se o campo ativo possui algum valor , senão ele atribui o N e salva no banco

if(isset($_REQUEST["Cod_frete"])) {
    if(isset($_REQUEST["excluir"])) {
          
        $consulta = "DELETE FROM tbl_frete WHERE Cod_frete = " . $_REQUEST["Cod_frete"];
        # a variavel operacao está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
        # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
        $operacao = 3;
    } else {
        $consulta = "UPDATE tbl_frete SET peso = '".$_REQUEST["peso"]."', volume = '".$_REQUEST["volume"]."', regiao = '".$_REQUEST["regiao"]."', valor = '".$_REQUEST["valor"]."' WHERE Cod_frete = ".$_REQUEST["Cod_frete"]."";
                # a variavel operação está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
                # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
        $operacao = 2;
    }
} else {
    $consulta = "INSERT INTO tbl_frete (peso,volume,regiao, valor) VALUES ('".$_REQUEST["peso"]."','".$_REQUEST["volume"]."','".$_REQUEST["regiao"]."','".$_REQUEST["valor"]."')";
            # a variavel operação está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
            # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
    $operacao = 1;
    
}
var_dump($consulta);
$query = $conexao->query($consulta);
#verifica se houve algum erro  do crud e concatena com a variavel local operação
if(!$query) {
    //var_dump($operacao);
    header("Location: Tb_Frete.php?erro=" . $operacao); 
} else {
    header("Location: Tb_Frete.php?sucesso=" . $operacao);
    
}
?>