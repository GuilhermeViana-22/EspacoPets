<?php
include "banco.php";
# verifica se o campo ativo possui algum valor , senão ele atribui o N e salva no banco
if(isset($_REQUEST["ativo"])) {
    $ativo = $_REQUEST["ativo"];
}  else {
    $ativo = "N";
}
if(isset($_REQUEST["id_plano"])) {
    if(isset($_REQUEST["excluir"])) {
          
        $consulta = "DELETE FROM planos WHERE id_plano = " . $_REQUEST["id_plano"];
        # a variavel operacao está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
        # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
        $operacao = 3;
    } else {
        $consulta = "UPDATE planos SET  nome_plano = '".$_REQUEST["nome_plano"]."', descricao = '".$_REQUEST["Descricao"]."', tempo = '".$_REQUEST["tempo"]."'  WHERE id_plano = ".$_REQUEST["id_plano"]."";
                # a variavel operação está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
                # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
        $operacao = 2;
    }
} else {
    $consulta = "INSERT INTO planos (nome_plano,descricao,tempo,ativo) VALUES ('".$_REQUEST["nome_plano"]."','".$_REQUEST["Descricao"]."','".$_REQUEST["tempo"]."','".$ativo."')";
            # a variavel operação está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
            # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
    $operacao = 1;
    
}

var_dump($consulta);
$query = $conexao->query($consulta);



#verifica se houve algum erro  do crud e concatena com a variavel local operação
if(!$query) {
    header("Location: ../Cad_planos.php?erro=" . $operacao); 
   
} else {
    header("Location: ../Cad_planos.php?sucesso=" . $operacao);
    

    
}

?>