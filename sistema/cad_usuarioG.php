<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>System Dog World || Funcionário </title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <?php
    #ArrayLIst com os inputs do select
    # é necessario um ArrayList para utilizar ter um conjunto de valores selecionaveis
    $sexo = array(
        "" => "----Selecione----",
        "M" => "Masculino",
        "F" => "Feminino"
    );
    ?>

    <?php
    #ArrayLIst com os inputs do select
    # é necessario um ArrayList para utilizar ter um conjunto de valores selecionaveis
    $cargo = array(
        "" => "----Selecione----",
        "Gerente" => "Gerente",
        "Administrativo" => "Administrativo",
        "Atendimento" => "Atendimento",
        "Estoquista" => "Estoquista"
    );
    ?>



</head>



<body class="sb-nav-fixed" style="margin-top: 0px;">
    <script>
        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value = ("");

            document.getElementById('cidade').value = ("");
            document.getElementById('uf').value = ("");

        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value = (conteudo.logradouro);

                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('uf').value = (conteudo.uf);

            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value = "...";

                    document.getElementById('cidade').value = "...";
                    document.getElementById('uf').value = "...";


                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };
    </script>
    <?php include 'nav.php'; ?>

    <div id="layoutSidenav">

        <!--Tag de incorporação ao menu no codigo html-->
        <?php include 'menu_lateral.php'; ?>

        <!--Tag de incorporação ao menu no codigo html-->

        <div id="layoutSidenav_content">
            <main style="margin-top: -20px;">
                <div class="breadcrumb">
                    <h3>Gereciamento de Funcionários </h3>
                </div>
                <section>
                    <div class="col-md-12">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <?php


                                # $total = mysqli_query($conexao,'SELECT COUNT(id_usuario) as Total_funcionario from usuario WHERE ativo="S"');
                                #	$total_fun = $total->fetch_assoc();
                                ?>
                                <div class="col-my-4" style="height: 80px;">
                                    <h2><strong><?php #  echo $total_fun["Total_funcionario"]; 
                                                ?></strong></h2> Total de Funcionários
                                </div>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                </section>
                <section>

                    <div class="col-md-12">
                        <!-- small box -->
                        <div style="height: 105px;" class="small-box bg-yellow">
                            <div class="inner">
                                <div class="inner">
                                    <?php

                                    # $total = mysqli_query($conexao,'SELECT COUNT(id_usuario) as Total_funcionario from usuario WHERE cargo="Gerente"');
                                    #$total_fun = $total->fetch_assoc();
                                    ?>
                                    <div class="col-my-4" style="height: 80px;">
                                        <h2><strong><?php #echo $total_fun["Total_funcionario"]; 
                                                    ?></strong></h2> Administradores
                                    </div>
                                </div>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="container">
                    <div id="" class="row">
                        <div class="row w-100">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fas fa-table mr-6"></i> <strong>Lista de Funcionários</strong>
                                    </div>

                                    <form method="GET" style="margin-top:15px; font-size: 10pt;" action="cad_funcionariov2.php">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <br />
                                                    <div style="padding-left:20px;" class="col-md-3">
                                                        <p style="margin-top: 12px;"><span>Pesquisa </span></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" value="<?php if (isset($_GET["pesquisa"])) {
                                                                                        echo $_GET["pesquisa"];
                                                                                    } ?>" name="pesquisa" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="submit" class="btn btn-primary" value="pesquisar">
                                            </div>
                                        </div>
                                    </form>
                                    <form method="GET" style="margin-top:15px; font-size: 10pt;" action="cad_funcionariov2.php">
                                        <div class="card-body mr-2">
                                            <table class="table table-bordered">
                                                <tr>

                                                    <th>#</th>
                                                    <th>Nome Fantasia</th>
                                                    <th>CNPJ </th>
                                                    <th>Email</th>
                                                    <th>Nome do responsavel</th>
                                                    <th>Telefne</th>
                                                    <th>Ações</th>
                                                </tr>
                                                <?php
                                                $consultaTabela = "";
                                                if (isset($_GET["pesquisa"])) {
                                                    $pesquisa = $_GET["pesquisa"];
                                                    $consultaTabela = "SELECT * FROM usuario WHERE nome LIKE '%$pesquisa%' OR email LIKE '%$pesquisa%' OR cpf LIKE '%$pesquisa%'";
                                                } else {
                                                    $consultaTabela = "SELECT * FROM usuario";
                                                }
                                                $queryClietes = $conexao->query($consultaTabela);

                                                while ($dados = $queryClietes->fetch_assoc()) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $dados["id_usuario"]; ?></td>
                                                        <td><?php echo $dados["nome_fantasia"]; ?></td>
                                                        <td><?php echo $dados["cnpj"]; ?></td>
                                                        <td><?php echo $dados["email"]; ?></td>
                                                        <td><?php echo $dados["nome_responsavel"]; ?></td>
                                                        <td><?php echo $dados["telefone"]; ?></td>
                                                        <td><?php echo $dados["email"]; ?></td>
                                                        <td>
                                                            <a href="cad_funcionariov2.php?id_usuario=<?php echo $dados["id_usuario"]; ?>" class="btn btn-primary"><i style="font-size: 10pt;" class="fas fa-pencil-alt"></i></a>
                                                            &nbsp;&nbsp;
                                                            <a href="crud_funcionario.php?excluir=1&id_usuario=<?php echo $dados["id_usuario"]; ?>" class="btn btn-danger btn-excluir-cliente"><i class="fas fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Novo Funcionário</h3><br><br>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->

                                <div class="card">
                                    <?php if (isset($_GET["sucesso"])) { ?>

                                        <div class="alert alert-success">
                                            <?php
                                            # esse numero 1 refere-se a mensagem de sucesso exibida  no inicio da tela
                                            # se o if ficar atrelado ao primeiro laço ele estará no laço de inserir referenciado no 
                                            # crud_cliente
                                            # logo ele retorna a mensagem de cliente inserido com sucsso
                                            if ($_GET["sucesso"] == 1) {
                                                echo " inserido com sucesso !";
                                                # esse numero 2 refere-se a mensagem de sucesso exibida  no inicio da tela
                                                # se o if ficar atrelado ao segundo laço ele estará no laço de atualizar que esta referenciado no 
                                                # crud_cliente
                                                # logo ele retorna a mensagem de cliente inserido com sucsso
                                            } else if ($_GET["sucesso"] == 2) {
                                                echo "Funcionario atualizado com sucesso!";
                                            } else {
                                                echo "Funcionario excluído com sucesso!";
                                            }
                                            ?>
                                        </div>

                                    <?php } ?>

                                    <?php if (isset($_GET["erro"])) { ?>
                                        <div class="alert alert-danger">
                                            <?php
                                            if ($_GET["erro"] == 1) {
                                                echo "Erro ao inserir Funcionário!";
                                            } else if ($_GET["erro"] == 2) {
                                                echo "Erro ao atualizar Funcionário!";
                                            } else {
                                                echo "Erro ao excluir Funcionário   !";
                                            }
                                            ?>
                                        </div>
                                    <?php } ?>
                                    <form method="POST" style="margin-top:15px; font-size: 10pt;" action="crud/crud_funcionario.php" data-toggle="validator" role="form" id="form-user-create">
                                        <?php
                                        $dados;
                                        if (isset($_GET["Cod_funcionario"])) {

                                            $queryCliente = $conexao->query("SELECT * FROM funcionario WHERE Cod_funcionario = " . $_GET["Cod_funcionario"]);
                                            $dados = $queryCliente->fetch_assoc();
                                        ?>
                                            <input type="hidden" name="Cod_funcionario" value="<?php echo $_GET["Cod_funcionario"]; ?>" />
                                        <?php } ?>
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="exampleInputName">Nome</label>
                                                <input type="text" class="form-control nome" id="nome" value="<?php if (isset($_GET["Cod_funcionario"])) {
                                                                                                                    #essa função do php pega o valor do input nome
                                                                                                                    echo $dados["nome"];
                                                                                                                } ?>" placeholder="Digite o nome do funcionário" name="nome" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName">CPF</label>
                                                <input type="text" class="form-control cpf" placeholder="Ex.: 000.000.000-00" id="cpf" name="cpf" value="<?php if (isset($_GET["Cod_funcionario"])) {
                                                                                                                                                                #essa função do php pega o valor do input cpf
                                                                                                                                                                echo $dados["cpf"];
                                                                                                                                                            } ?>" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName">RG</label>
                                                <input type="text" class="form-control rg" id="exampleInputName" placeholder="Digite o registro geral do funcionário" name="rg" value="<?php if (isset($_GET["Cod_funcionario"])) {
                                                                                                                                                                                            #essa função do php pega o valor do input nome
                                                                                                                                                                                            echo $dados["rg"];
                                                                                                                                                                                        } ?>" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName">Cargo</label>

                                                <select id="cmbSexo" class="form-control py-2" name="cargo">
                                                    <?php
                                                    # A logica utilizada nos selects é diferente dos demais blocos de codigo do nosso sistema
                                                    if (isset($_GET["Cod_funcionario"])) {
                                                        foreach ($cargo as $key => $value) {
                                                            if ($dados["cargo"] == $key) {
                                                                echo "<option value=" . $key . " selected>" . $value . "</option>";
                                                            } else {
                                                                echo "<option value=" . $key . ">" . $value . "</option>";
                                                            }
                                                        }
                                                    } else {
                                                        foreach ($cargo as $key => $value) {
                                                            echo "<option value=" . $key . ">" . $value . "</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Salário</label>
                                                <input name="salario" type="text" class="form-control money2" placeholder="Ex.: 1.798.00" value="<?php if (isset($_GET["Cod_funcionario"])) {
                                                                                                                                                        #essa função do php pega o valor do input nome
                                                                                                                                                        echo $dados["salario"];
                                                                                                                                                    } ?>" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName">Horário de expediente</label>
                                                <input type="text" class="form-control time" placeholder="Ex.: 00:00:00" value="<?php if (isset($_GET["Cod_funcionario"])) {
                                                                                                                                    #essa função do php pega o valor do input nome
                                                                                                                                    echo $dados["horas"];
                                                                                                                                } ?>" placeholder="Digite o expediente" name="horas" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputBirth">Data de admissão</label>
                                                <input type="date" min="1000-10-26" max="2020-11-24" class="form-control" id="exampleInputBirth" value="<?php if (isset($_GET["Cod_funcionario"])) {
                                                                                                                                                            #essa função do php pega o valor do input nome
                                                                                                                                                            echo $dados["dt_admicao"];
                                                                                                                                                        } ?>" name="dt_admicao">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="cmbSexo">Gênero</label>

                                                <select id="cmbSexo" class="form-control py-2" name="sexo">
                                                    <?php
                                                    # A logica utilizada nos selects é diferente dos demais blocos de codigo do nosso sistema
                                                    if (isset($_GET["Cod_funcionario"])) {
                                                        foreach ($sexo as $key => $value) {
                                                            if ($dados["sexo"] == $key) {
                                                                echo "<option value=" . $key . " selected>" . $value . "</option>";
                                                            } else {
                                                                echo "<option value=" . $key . ">" . $value . "</option>";
                                                            }
                                                        }
                                                    } else {
                                                        foreach ($sexo as $key => $value) {
                                                            echo "<option value=" . $key . ">" . $value . "</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputBirth">Nascimento</label>
                                                <input type="date" min="1950-10-26" max="2020-12-25" class="form-control" id="exampleInputBirth" value="<?php if (isset($_GET["Cod_funcionario"])) {
                                                                                                                                                            #essa função do php pega o valor do input nome
                                                                                                                                                            echo $dados["dt_nascimento"];
                                                                                                                                                        } ?>" name="dt_nascimento" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Cep</label>
                                                <input name="Cep" class="form-control cep-mask" placeholder="Ex.: 00000-000" value="<?php if (isset($_GET["Cod_funcionario"])) {
                                                                                                                                        #essa função do php pega o valor do input nome
                                                                                                                                        echo $dados["Cep"];
                                                                                                                                    } ?>" placeholder="Rua Borboletas Psicodélicas" onblur="pesquisacep(this.value);">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Endereço</label>
                                                <input name="logradouro" type="text" class="form-control" id="rua" value="<?php if (isset($_GET["Cod_funcionario"])) {
                                                                                                                                #essa função do php pega o valor do input nome
                                                                                                                                echo $dados["logradouro"];
                                                                                                                            } ?>" placeholder="Rua Era uma vez Nº">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputCountry">Cidade</label>
                                                <input name="cidade" type="text" class="form-control" id="cidade" value="<?php if (isset($_GET["Cod_funcionario"])) {
                                                                                                                                #essa função do php pega o valor do input nome
                                                                                                                                echo $dados["cidade"];
                                                                                                                            } ?>" placeholder="Digite o nome da Cidade">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="exampleInputCountry">Estado</label>
                                                <input type="text" name="estado" class="form-control" id="uf" value="<?php if (isset($_GET["Cod_funcionario"])) {
                                                                                                                            #essa função do php pega o valor do input nome
                                                                                                                            echo $dados["estado"];
                                                                                                                        } ?>" placeholder="Digite o nome da estado">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Complemento</label>
                                                <input name="num_comp" type="text" class="form-control" value="<?php if (isset($_GET["Cod_funcionario"])) {
                                                                                                                    #essa função do php pega o valor do input nome
                                                                                                                    echo $dados["num_comp"];
                                                                                                                } ?>" placeholder="Apartamento, bloco" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">E-mail</label>
                                                <input type="email" class="form-control" id="1xampleInputEmail" value="<?php if (isset($_GET["Cod_funcionario"])) {
                                                                                                                            #essa função do php pega o valor do input nome
                                                                                                                            echo $dados["email"];
                                                                                                                        } ?>" placeholder="Digite o e-mail" name="email" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Telefone</label>
                                                <input type="text" class="form-control phone" id="telefone" name="telefone" placeholder="(xx) xxxx-xxxx" value="<?php if (isset($_GET["Cod_funcionario"])) {
                                                                                                                                                                    #essa função do php pega o valor do input nome
                                                                                                                                                                    echo $dados["telefone"];
                                                                                                                                                                } ?>">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Senha</label>
                                                <input type="password" class="form-control" id="exampleInputPassword" value="<?php if (isset($_GET["Cod_funcionario"])) {
                                                                                                                                    #essa função do php pega o valor do input nome
                                                                                                                                    echo $dados["senha"];
                                                                                                                                } ?>" placeholder="Crie uma senha" name="senha" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-check">
                                                <input checked type="checkbox" class="form-check-input" value="S" id="AtivoCli" name="ativo" <?php if (isset($_GET["Cod_funcionario"])) {
                                                                                                                                                    if ($dados["ativo"] == "S") {
                                                                                                                                                        echo "checked";
                                                                                                                                                    }
                                                                                                                                                } ?>>
                                                <label class="form-check-label" for="AtivoCli">Ativo</label>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-success">Salvar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include 'footer.php'; ?>
        </div>
    </div>
    <script src="js/validator.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    <script src="js/jquery.mask.js"></script>

    <script>
        jQuery(document).ready(function() {
            $('.nome').mask('A', {
                translation: {
                    A: {
                        pattern: /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ'\s]+$/g,
                        recursive: true
                    },
                },
            });
            $('.cpf').mask('000.000.000-00', {
                reverse: true
            });
            $('.money2').mask("#.##0,00", {
                reverse: true
            });
            $('.phone').mask('(00) 0000-00000');
            $('.time').mask('00:00:00');
            if ((".time") >= "10:00") {
                alert("horario invalido")
            }
            $('.rg').mask('00.000.000-0');

        })
    </script>

</body>

</html>