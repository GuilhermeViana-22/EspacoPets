<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet" />
    <title>Tabela de frete</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="images/" >
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>



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

                    <div class="card" style="width: 100%; margin-top:10px; ">
                        <div class="card" style="width: 100%; ">
                            <div class="card-body">
                                <?php if (isset($_GET["sucesso"]) == 1) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Atualizado!</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } else if (isset($_GET["erro"]) == 1) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Algun erro ocorrel!</strong> Verifique se os dados estao correto
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } ?>
                                <h5 class="card-title">Dados</h5>
                                <?php
                                $consultaTabela = "";

                                $consultaTabela = "SELECT * FROM usuario WHERE id_usuario = " . $_SESSION["id_usuario"];

                                $queryClietes = $conexao->query($consultaTabela);

                                $dados = $queryClietes->fetch_assoc();
                                ?>
                                <table class="table">

                                    <tbody>
                                        <tr>
                                            <th scope="row">Nome Fantasia</th>
                                            <td><?php echo $dados["nome_fantasia"]; ?></td>

                                            <th rowspan="6" style="text-align: center; "><a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="fas fa-pencil-alt"></i></a></th>
                                        </tr>
                                        <tr>
                                            <th scope="row">CNPJ</th>
                                            <td><?php echo $dados["cnpj"]; ?></td>


                                        </tr>
                                        <tr>
                                            <th scope="row">Responsavel</th>
                                            <td><?php echo $dados["nome_responsavel"]; ?></td>


                                        </tr>
                                        <tr>
                                            <th scope="row">Telefone</th>
                                            <td><?php echo $dados["telefone"]; ?></td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Senha da conta</th>
                                            <td class="campoSenha"><?php echo $dados["senha"]; ?></td>


                                        </tr>
                                        <tr>
                                            <th scope="row">E-mail</th>
                                            <td><?php echo $dados["email"]; ?></td>


                                        </tr>
                                    </tbody>
                                </table>


                            </div>
                        </div>

                    </div>
                   


                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="crud/crud_UpdateCli.php">
                                        <?php
                                        $dados;
                                        if (isset($_GET["id_usuario"])) {

                                            $queryCliente = $conexao->query("SELECT * FROM usuario WHERE id_usuario = " . $_SESSION["id_usuario"]);
                                            $dados = $queryCliente->fetch_assoc();
                                        ?>
                                            <input type="hidden" name="id_usuario" value="<?php echo $_GET["id_usuario"]; ?>" />
                                        <?php } ?>

                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Nome Fansatasia:</label>
                                            <input type="text" class="form-control" id="recipient-name" name="nome_fantasia" value="<?php {
                                                                                                                                        echo $dados["nome_fantasia"];
                                                                                                                                    } ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label"> CNPJ:</label>
                                            <input type="text" class="form-control cnpj" id="recipient-name" name="cnpj" value="<?php {
                                                                                                                                echo $dados["cnpj"];
                                                                                                                            } ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label nome"> Responsavel:</label>
                                            <input type="text" class="form-control" id="recipient-name" name="nome_Responsavel" value="<?php {
                                                                                                                                            echo $dados["nome_responsavel"];
                                                                                                                                        } ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label"> telefone:</label>
                                            <input type="text" class="form-control num" id="recipient-name" name="telefone" value="<?php {
                                                                                                                                    echo $dados["telefone"];
                                                                                                                                } ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label"> email:</label>
                                            <input type="text" class="form-control" id="recipient-name" name="email" value="<?php {
                                                                                                                                echo $dados["email"];
                                                                                                                            } ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label"> senha:</label>
                                            <input type="text" class="form-control" id="recipient-name" name="senha" value="<?php {
                                                                                                                                echo $dados["senha"];
                                                                                                                            } ?>">
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Salvar</button>
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
            $('.nome').mask('A', {
                translation: {
                    A: {
                        pattern: /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ'\s]+$/g,
                        recursive: true
                    },
                },
            });
            $('.cnpj').mask('00.000.000/0000-00', {
                reverse: true
            });
            $('.money2').mask("000", {
                reverse: true
            });
            $('.num').mask("(00)00000-0000")
            $(".campoSenha").mask("***-****");
            $(".cartao").mask("****-****-****-0000");
            $(".cvv").mask("***");
        })



        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        });
    </script>




</body>

</html>