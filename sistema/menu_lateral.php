<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav" <?php  ?>>
                <div class="sb-sidenav-menu-heading">Servi&ccedil;os</div>
                <!---Aqui ficam os links da barra de navegçãi todos então como extensão .jso
                        Lembrando que qualquer alteração feita nessa parte gera um código de erro 404 do xammp
                        não será localizado nenhum arquivo
                        --> <?php if ($_SESSION["tipo_usuario"] == "gerente" || $_SESSION["tipo_usuario"] == "Gerente") { ?>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#controleusu" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Conta
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="controleusu" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="gerencia.php">Gerenciamento de conta</a>
                        </nav>
                    </div>
                    <!--Programar nome de usuario-->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Usuarios" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Usuarios
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="Usuarios" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="cad_usuarioG.php">Cadastro de usuario</a>
                            <a class="nav-link" href="Cad_enderecoG.php">Cadastro de Endereco</a>
                        </nav>
                    </div>


                    <!--Programar nome de usuario-->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Planos" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Planos
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="Planos" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="Cad_planos.php">Gerenciar Planos</a>
                        </nav>
                    </div>
                <?php } elseif ($_SESSION["tipo_usuario"] == "Cliente" || $_SESSION["tipo_usuario"] == "cliente") { ?>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#controleus" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Conta
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="controleus" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="gerenciamento_conta.php">Gerenciamento de conta cliente </a>
                            <a class="nav-link" href="cad_endereco.php">Gerenciamento de Plano cliente </a>
                        </nav>
                    </div>
                    <!--Programar nome de usuario-->

                    <div class="collapse" id="controleusu" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">

                        </nav>
                    </div>
                <?php } else { ?>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#controleus" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Conta
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="controleus" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="gerenciamento_conta.php">Gerenciamento de conta Ong </a>
                            <a class="nav-link" href="cad_endereco.php">Gerenciamento de Plano Ong </a>
                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cadong" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Cadastro
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="cadong" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="cad_animal.php">Cadastro de Animal </a>
                            <a class="nav-link" href="cad_endereco.php">Cadastrar Endereco </a>
                        </nav>
                    </div>
                    <!--Programar nome de usuario-->

                    <div class="collapse" id="controleusu" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">

                        </nav>
                    </div>
                <?php } ?>
            </div>

        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Bem vindo :</div>
            <!--Programar nome de usuario-->
            <?php echo $_SESSION["nome_fantasia"]; ?>
        </div>
    </nav>
</div>