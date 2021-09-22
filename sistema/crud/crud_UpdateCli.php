 <?php
        include "banco.php";
      
        $consulta = "UPDATE usuario SET nome_fantasia = '" . $_REQUEST["nome_fantasia"] . "', cnpj = '" . $_REQUEST["cnpj"] . "', nome_Responsavel = '" . $_REQUEST["nome_Responsavel"] . "', telefone = '" . $_REQUEST["telefone"] . "', senha = '" . $_REQUEST["senha"] . "', email = '" . $_REQUEST["email"] . "'  WHERE id_usuario = " . $_SESSION["id_usuario"] ."" ;
        # a variavel operação está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
        # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel

        
        var_dump($consulta);
        $query = $conexao->query($consulta);



        #verifica se houve algum erro  do crud e concatena com a variavel local operação
        if (!$query) {
                header("Location: ../gerenciamento_conta.php?erro=" . 1);
        } else {
                header("Location: ../gerenciamento_conta.php?sucesso=" . 1);
        }
        ?>