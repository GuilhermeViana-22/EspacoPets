<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet" />
    <title>Tabela de frete</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="images/lanzara_icon.png" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <?php
    #nestes includes temos todos os estados e municipios do brasil na nossa aplicação, como isso ficaria dispensioso e sujando nosso codigo
    #está sendo utilizado um array em outro arquivo que carrega todas essas informações
    #ArrayLIst com os inputs do select
    # é necessario um ArrayList para utilizar ter um conjunto de valores selecionaveis
    $TipoCarga = array(
        "Não_Selecionado" => "---SELECIONE---",
        "Granel_Sólido" => "Granel_Sólido",
        "Granel_Líquido" => "Granel_Líquido",
        "Frigrorificada" => "Frigrorificada",
        "Conteineirizada" => "Conteineirizada",
        "Carga_Geral" => "Carga_Geral",
        "Neogranel" => "Neogranel",
        "Perigosa(granel_Sólido)" => "Perigosa(granel_Sólido)",
        "Perigosa(granel_Líquido)" => "Perigosa(granel_Líquido)",
        "Perigosa(carga_frigrorificada)" => "Perigosa(carga_frigrorificada)",
        "Perigosa(conteineirizada)" => "Perigosa(conteineirizada)",
        "Perigosa(carga_geral)" => "Perigosa(carga_geral)"
    );
    $Coeficiente = array(
        "Não_Selecionado" => "---SELECIONE---",
        "Deslocamento(CCD)" => "Deslocamento(CCD)",
        "Carga_e_Descarga(CC)" => "Carga_e_Descarga(CC)"

    );
    $Unidd = array(
        "Não_Selecionado" => "---SELECIONE---",
        "R$/KM" => "R$/KM",
        "R$" => "R$"
    );
    ?>
</head>

<body class="sb-nav-fixed">
    <?php include 'nav.php'; ?>
    <div id="layoutSidenav">
        <!--Tag de incorporação ao menu no codigo html-->
        <?php include 'menu_lateral.php'; ?>
        <!--Tag de incorporação ao menu no codigo html-->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                <div class="card">
                                    <?php if (isset($_GET["sucesso"])) { ?>

                                        <div class="alert alert-success">
                                            <?php
                                            # esse numero 1 refere-se a mensagem de sucesso exibida  no inicio da tela
                                            # se o if ficar atrelado ao primeiro laço ele estará no laço de inserir referenciado no 
                                            # crud_cliente
                                            # logo ele retorna a mensagem de cliente inserido com sucsso
                                            if ($_GET["sucesso"] == 1) {
                                                echo " Novo frete inserido com sucesso !";
                                                # esse numero 2 refere-se a mensagem de sucesso exibida  no inicio da tela
                                                # se o if ficar atrelado ao segundo laço ele estará no laço de atualizar que esta referenciado no 
                                                # crud_cliente
                                                # logo ele retorna a mensagem de cliente inserido com sucsso
                                            } else if ($_GET["sucesso"] == 2) {
                                                echo "Frete atualizado com sucesso!";
                                            } else {
                                                echo "Frete excluído com sucesso!";
                                            }
                                            ?>
                                        </div>

                                    <?php } ?>

                                    <?php if (isset($_GET["erro"])) { ?>
                                        <div class="alert alert-danger">
                                            <?php
                                            if ($_GET["erro"] == 1) {
                                                echo "Erro ao inserir novos valores na tabela!";
                                            } else if ($_GET["erro"] == 2) {
                                                echo "Erro ao atualizar valores na tabela!";
                                            } else {
                                                echo "Erro ao excluir valores na tabela !";
                                            }
                                            ?>
                                        </div>
                                    <?php } ?>
                    <div class="card">

                        <form id="tbl_frete" name="frete" data-toggle="validator" action="crud_TabelaFrete.php" role="form">
                            <?php
                            $dados;
                            if (isset($_GET["Cod_frete"])) {

                                $queryTabela = $conexao->query("SELECT * FROM tbl_frete WHERE Cod_frete = " . $_GET["Cod_frete"]);
                                $dados = $queryTabela->fetch_assoc();
                            ?>
                                <input type="hidden" name="Cod_frete" value="<?php echo $_GET["Cod_frete"]; ?>" />
                            <?php } ?>
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Tabela de Frete</h3>
                            </div>
                            <fieldset style="padding: 20px;">

                                <div style="background: #FFE4C4" class="form-group row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="small mb-1" for="txtCpf"><strong>
                                                    <h6>Peso</h6>
                                                </strong></label>
                                            <input class="form-control py-2 cpf" id="peso" type="text" placeholder="Digite o peso total da carga" name="peso" required value="<?php if (isset($_GET["Cod_frete"])) {
                                                                                                                                                                                    echo $dados["peso"];
                                                                                                                                                                                } ?>" />

                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="small mb-1" for="txtCpf"><strong>
                                                    <h6>Volume</h6>
                                                </strong></label>
                                            <input class="form-control py-2 cpf" id="volume" type="text" placeholder="Digite o volume da carga" name="volume" required value="<?php if (isset($_GET["Cod_frete"])) {
                                                                                                                                                                                    echo $dados["volume"];
                                                                                                                                                                                } ?>" />

                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="small mb-1" for="txtCpf"><strong>
                                                    <h6>Região</h6>
                                                </strong></label>
                                            <input class="form-control py-2 cpf" id="regiao" type="text" placeholder="Digite a região" name="regiao" required value="<?php if (isset($_GET["Cod_frete"])) {
                                                                                                                                                                            echo $dados["regiao"];
                                                                                                                                                                        } ?>" />

                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="small mb-1" for="txtCpf"><strong>
                                                    <h6>Valor do frete</h6>
                                                </strong></label>
                                            <input class="form-control py-2 cpf" id="valor" type="text" placeholder="Digite o valor do frete em " name="valor" required value="<?php if (isset($_GET["Cod_frete"])) {
                                                                                                                                                                    echo  $dados["valor"];
                                                                                                                                                                } ?>" />

                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div id="botoes" class="col-md-9 col-xs-12">
                                        <div style="margin-left:460px;" class="col-md-15">
                                            <button type="submit" class="btn btn-success">Executar</button>
                                        </div>
                                        <br>

                                    </div>


                                </div>
                            </fieldset>


                        </form>
                        <!---INICIO DA TABELA DE FRETE-->
                        <div class="row w-100">
                            <div class="col-xl-12 col-md-12 ">
                                <div class="card">
                                    <div class="card-header">
                                        <i style="font-size: 30px;" class="fas fa-table mr-4"> </i>
                                        <h4 class="text-center">Regiões e valores</h4>
                                    </div>
                                    <form method="GET" style="margin-top:15px;" action="Tb_Frete.php">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <br />
                                                    <div style="padding-left:25px;" class="col-md-3">
                                                        Pesquisar:
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" value="<?php if (isset($_GET["pesquisa"])) {
                                                                                        echo $_GET["pesquisa"];
                                                                                    } ?>" name="pesquisa" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="submit" class="btn btn-primary" value="pesquisar">
                                            </div>
                                        </div>
                                    </form>
                                    <div class="card-body mr-1">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="background: #FFA500">Peso</th>
                                                    <th style="background: #FFA500">volume</th>
                                                    <th style="background: #FFA500">Região</th>
                                                    <th style="background: #FFA500">valor do frete</th>
                                                    <th style="background: #FFA500">Ações </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $consultaTabela = "";
                                                if (isset($_GET["pesquisa"])) {
                                                    $pesquisa = $_GET["pesquisa"];
                                                    $consultaTabela = "SELECT * FROM tbl_frete WHERE regiao LIKE '%$pesquisa%'";
                                                } else {
                                                    $consultaTabela = "SELECT * FROM tbl_frete";
                                                }
                                                $queryTabela = $conexao->query($consultaTabela);

                                                while ($dados = $queryTabela->fetch_assoc()) {
                                                ?>
                                                    <tr>
                                                        <td style="background:#FFF5EE"><?php echo $dados["peso"]; ?></td>
                                                        <td style="background:#FFF5EE"><?php echo $dados["volume"]; ?></td>
                                                        <td style="background:#FFF5EE"><?php echo $dados["regiao"]; ?></td>
                                                        <td style="background:#FFF5EE"><strong style="padding: 2PX;">R$</strong><?php echo $dados["valor"]; ?></td>


                                                        <td style="background:#FFF5EE">
                                                            <a href="Tb_Frete.php?Cod_frete=<?php echo $dados["Cod_frete"]; ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                            &nbsp;&nbsp;



                                                            <a href="crud_TabelaFrete.php?excluir=1&Cod_frete=<?php echo $dados["Cod_frete"]; ?>" class="btn btn-danger btn-excluir-cliente"><i class="fas fa-times"></i></a>
                                                        </td style="background:#FFF5EE">

                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>


                            </div>


                        </div>

                    </div>

                </div>

            </main>
            <?php include 'footer.php'; ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    <!-- chamativa dos metodos para mascara -->
    <script src="js/jquery.mask.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            $('#regiao').mask('A', {
                translation: {
                    A: {
                        pattern: /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ'\s]+$/g,
                        recursive: true
                    },
                },
            });
            $('#peso').mask('000.000.000.000', {reverse: true});
            $('#volume').mask('000.000.000.000', {reverse: true});
            $('#valor').mask('000.000.000.000.000,00', {
                reverse: true
            });

        });
    </script>





</body>

</html>