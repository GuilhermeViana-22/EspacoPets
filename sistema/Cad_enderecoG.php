<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PetCenter || cliente </title>
    <link href="css/styles.css" rel="stylesheet" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

    <?php
    #nestes includes temos todos os estados e municipios do brasil na nossa aplicação, como isso ficaria dispensioso e sujando nosso codigo
    #está sendo utilizado um array em outro arquivo que carrega todas essas informações

    #ArrayLIst com os inputs do select
    # é necessario um ArrayList para utilizar ter um conjunto de valores selecionaveis
    $regiao = array(
        "" => "----Selecione----",
        "Leste" => "Leste",
        "Oeste" => "Oeste",
        "Central" => "Central",
        "Note" => "Note",
        "Sul" => "Sul",
        "interior" => "interior"

    );
    ?>



</head>

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

<body class="sb-nav-fixed">

    <?php include 'nav.php'; ?>
    <div id="layoutSidenav">
        <?php include 'menu_lateral.php'; ?>
        <div id="layoutSidenav_content">
            <main>

                <div class="container-fluid">
                    <?php if (isset($_GET["sucesso"])) { ?>
                        <?php
                        # esse numero 1 refere-se a mensagem de sucesso exibida  no inicio da tela
                        # se o if ficar atrelado ao primeiro laço ele estará no laço de inserir referenciado no 
                        # crud_cliente
                        # logo ele retorna a mensagem de cliente inserido com sucsso
                        if ($_GET["sucesso"] == 1) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Endereco Cadastrado</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                        <?php } else if ($_GET["sucesso"] == 2) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong> Endereco Atualizado!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php    } else { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Endereco Excluido!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                        <?php } ?>


                    <?php } ?>

                    <?php if (isset($_GET["erro"])) { ?>
                        <?php
                        # esse numero 1 refere-se a mensagem de sucesso exibida  no inicio da tela
                        # se o if ficar atrelado ao primeiro laço ele estará no laço de inserir referenciado no 
                        # crud_cliente
                        # logo ele retorna a mensagem de cliente inserido com sucsso
                        if ($_GET["erro"] == 1) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Erro ao Cadastrado !</strong> verifique se todos os campos estao preenchido corretamente
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                        <?php } else if ($_GET["erro"] == 2) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong> Erro Ao Atualizar!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php    } else { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Erro ao Excluir o Endereco!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                        <?php } ?>


                    <?php } ?>
                    <div class="card">

                        <div class="card-body">
                            <form id="formExemplo" method="post" action="crud/crud_enderecoG.php" data-toggle="validator" role="form">
                                <?php
                                $dados;
                                if (isset($_GET["id_usuario"])) {

                                    $queryCliente = $conexao->query("SELECT * FROM usuario WHERE id_usuario = " . $_GET["id_usuario"]);
                                    $dados = $queryCliente->fetch_assoc();
                                ?>
                                    <input type="hidden" name="id_usuario" value="<?php echo $_GET["id_usuario"]; ?>" />
                                <?php } ?>

                                <?php
                                $dados;
                                if (isset($_GET["id_endereco"])) {

                                    $queryCliente = $conexao->query("SELECT * FROM endereco WHERE id_endereco = " . $_GET["id_endereco"]);
                                    $dados = $queryCliente->fetch_assoc();
                                ?>
                                    <input type="hidden" name="id_endereco" value="<?php echo $_GET["id_endereco"]; ?>" />
                                <?php } ?>

                                <div class="form-group row">

                                    <div class=" col-md-3">
                                        <label for="cep" class="small col-md-6 mb-1">Nome Fantasia</label>
                                        <input name="nome_fantasia" type="text"  class="form-control" id="cep" value="<?php if (isset($_GET["id_usuario"])) {
                                                                                                                                            echo $dados["nome_fantasia"];
                                                                                                                                        } ?>" disabled >
                                    </div>

                                    <div class=" col-md-3">
                                        <label for="cep" class="small col-md-3 mb-1">CEP</label>
                                        <input name="cep" type="text" placeholder="digite o CEP" class="form-control" id="cep" value="<?php if (isset($_GET["id_endereco"])) {
                                                                                                                                            echo $dados["cep"];
                                                                                                                                        } ?>" onblur="pesquisacep(this.value);">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress" class="small mb-1">Endereço</label>
                                        <input type="text" class="form-control py-3" id="rua" placeholder="Rua dos Bobos, nº 0" name="logradouro" value="<?php if (isset($_GET["id_endereco"])) {
                                                                                                                                                                echo $dados["logradouro"];
                                                                                                                                                            } ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress2" class="small mb-1">Numero</label>
                                        <input type="text" class="form-control " id="inputAddress" value="<?php if (isset($_GET["id_endereco"])) {
                                                                                                                echo $dados["num"];
                                                                                                            } ?>" placeholder="Apartamento, hotel, casa, etc." name="num">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress2" class="small mb-1">Complemento</label>
                                        <input type="text" class="form-control" id="inputAddress" value="<?php if (isset($_GET["id_endereco"])) {
                                                                                                                echo $dados["complemento"];
                                                                                                            } ?>" placeholder="Apartamento, hotel, casa, etc." name="complemento">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputLastName">Bairro</label>

                                            <input type="text" class="form-control" id="bairro" value="<?php if (isset($_GET["id_endereco"])) {
                                                                                                            echo $dados["bairro"];
                                                                                                        } ?>" placeholder="Digite o Bairro." name="bairro" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputLastName">Cidade</label>

                                            <input type="text" class="form-control" id="cidade" value="<?php if (isset($_GET["id_endereco"])) {
                                                                                                            echo $dados["cidade"];
                                                                                                        } ?>" placeholder="Digite a cidade." name="cidade" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputLastName">Estado</label>
                                            <input type="text" class="form-control" id="uf" value="<?php if (isset($_GET["id_endereco"])) {
                                                                                                        echo $dados["estado"];
                                                                                                    } ?>" placeholder="Digite a cidade." name="estado" required>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-0">
                                        <label class="small mb-1" for="cmbR">Regiao</label>

                                        <select id="cmbR" class="form-control py-2" name="regiao">
                                            <?php
                                            # A logica utilizada nos selects é diferente dos demais blocos de codigo do nosso sistema
                                            if (isset($_GET["id_endereco"])) {
                                                foreach ($regiao as $key => $value) {
                                                    if ($dados["regiao"] == $key) {
                                                        echo "<option value=" . $key . " selected>" . $value . "</option>";
                                                    } else {
                                                        echo "<option value=" . $key . ">" . $value . "</option>";
                                                    }
                                                }
                                            } else {
                                                foreach ($regiao as $key => $value) {
                                                    echo "<option value=" . $key . ">" . $value . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="small mb-1" for="txtTelefone">Telefone / Celular</label>
                                            <input class="form-control py-2 num" id="txtTelefone" value="<?php if (isset($_GET["id_endereco"])) {
                                                                                                                echo $dados["telefone"];
                                                                                                            } ?>" type="text" placeholder="Digite o Telefone" name="telefone" required />
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="form-check" style="margin-left:30px; margin-top: 20px; ">
                                        <input type="checkbox" class="form-check-input" value="S" id="AtivoCli" name="ativo" <?php if (isset($_GET["id_endereco"])) {
                                                                                                                                    if ($dados["ativo"] == "S") {
                                                                                                                                        echo "checked";
                                                                                                                                    }
                                                                                                                                } ?>>
                                        <label class="form-check-label" for="AtivoCli">Ativo</label>
                                    </div>
                                </div>


                                <div id="botoes" class="col-md-9 col-xs-12" style="margin-left:560px; margin: 20px; ">
                                    <div style="margin-left:560px; margin-top: 20px; " class="col-md-15">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-paw"></i> Salvar</button>
                                    </div>

                                </div>
                            </form>

                            <div class="row w-100">
                                <div class="col-xl-12 col-md-12 ">
                                    <div class="card">
                                        <div class="card-header">
                                            <i class="fas fa-table mr-6"></i> Usuarios
                                        </div>
                                        <form method="GET" style="margin-top:15px;" action="Cad_enderecoG.php">
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

                                            <table class="table table-hover">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nome Fantasia</th>
                                                    <th>CNPJ</th>
                                                  
                                                    <th>Ações</th>
                                                </tr>
                                                <?php
                                                $consultaTabela = "";
                                                if (isset($_GET["pesquisa"])) {
                                                    $pesquisa = $_GET["pesquisa"];
                                                    $consultaTabela = "SELECT * FROM endereco WHERE nome LIKE '%$pesquisa%' OR sobrenome LIKE '%$pesquisa%' OR email LIKE '%$pesquisa%' OR cpf LIKE '%$pesquisa%'";
                                                } else {
                                                    $consultaTabela = "SELECT * FROM usuario";
                                                }
                                                $queryClietes = $conexao->query($consultaTabela);

                                                while ($dados = $queryClietes->fetch_assoc()) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $dados["id_usuario"]; ?></td>
                                                        <td><?php echo $dados["nome_fantasia"]; ?></td>
                                                        <!--Converter a data para formato pt-BR-->
                                                        <td><?php echo $dados["cnpj"];; ?></td>
                                                      


                                                        <td>
                                                            <a href="Cad_enderecoG.php?id_usuario=<?php echo $dados["id_usuario"]; ?>" class="btn btn-primary"><i style="font-size: 10pt;" class="fas fa-pencil-alt"></i></a>
                                                            &nbsp;&nbsp;



                                                            <a href="crud/crud_endereco.php?excluir=1&id_usuario=<?php echo $dados["id_usuario"]; ?>" class="btn btn-danger btn-excluir-cliente"><i class="fas fa-times"></i></a>
                                                        </td>

                                                    </tr>
                                                <?php } ?>



                                            </table>
                                        </div>
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
            $('.money2').mask("000", {
                reverse: true
            });
            $('.num').mask("(00)00000-0000")
        })

        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        });
    </script>

</body>

</html>