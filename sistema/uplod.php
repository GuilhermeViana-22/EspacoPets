 <!-- === File Upload ===
Design a file upload element. Is it the loading screen and icon? A progress element? Are folders being uploaded by flying across the screen like Ghostbusters? ;)  
-->
<!DOCTYPE html>
<html>

<head>
<link rel="icon" type="image/png" href="images/lanzara_icon.png" />
    <link href="css/cssup.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="sb-nav-fixed">
    <?php include 'nav.php'; include 'banco.php';   ?>
    <div id="layoutSidenav">
        <?php include 'menu_lateral.php'; 
        
        //variavel que vai conter a menssagem
        $msg = false;
        /**  função que verifica se existe algum arquivo com o mesmo nome no banco para nao ter erros 
         * 
         */
        if (isset($_FILES['arquivo'])) {
            $extesao = strtolower(substr($_FILES['arquivo']['name'], -4)); //linha de codigo que transforma toda a extensao do arquivo e no em letra minuscula
            $novo_nome = md5((time())) . $extesao; // linha de codido que cripta o arquivo 
            $diretorio = "upload/"; // linha de codigo para qual diretorio ira o arquivo 

            move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome); // linha de codigo que pega o arquivo da nuvem da liguagem e envia para o diretorio
            $sql_code = "insert into arquivo (	codigo_arquivo,nome_arquivo, data) values(null,'$novo_nome', NOW())"; // linha de codigo para inserir no banco de dados
            if ($conexao->query($sql_code)) { // if e else de verificação se foi inserido com sucesso 
                $msg = "Arquivo salvo!";
            } else {
                $msg = "Erro ao Salvar o Arquivo!";
            }
        }

        ?>

        <div class="wrapper">
            <div class="container">
                <h1>Anexa certificado</h1>
                <div class="upload-container">
                    <div class="border-container">
                        <div class="icons fa-4x">
                            <i class="fas fa-file-image" data-fa-transform="shrink-3 down-2 left-6 rotate--45"></i>
                            <i class="fas fa-file-alt" data-fa-transform="shrink-2 up-4"></i>
                            <i class="fas fa-file-pdf" data-fa-transform="shrink-3 down-2 right-6 rotate-45"></i>
                        </div>
                        <!--<input type="file" id="file-upload">-->

                        <form action="uplod.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Selecione o Arquivo</label>
                                <input type="file" class="form-control-file" required name="arquivo" id="exampleFormControlFile1">

                                <button type="submit" class="btn btn-secondary">Salvar</button>
                            </div>

                        </form>
                        <?php if ($msg != false) echo "<h3> $msg</h3>"; ?>
                        <p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- original pen: https://codepen.io/roydigerhund/pen/ZQdbeN  -->

    <!-- NO JS ADDED YET -->


    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>