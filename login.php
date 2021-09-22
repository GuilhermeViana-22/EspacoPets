<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>System Dog World || Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/stylelogin.css">
    <link rel="stylesheet" href="img/incone_dogworld.jpg">
    <link rel="icon" type="/img" href="img/icon2.PNG" style="border-radius: 100%;" />
</head>
<body>

    <img src="img/pets.jpg" id="imgb">

    <div class="container">
        <img src="img/utilizador.png" width="100px" height="100px" id="imgl">
        <form action="logar.php" method="POST">
            <h1>Login</h1>
            <p id="pl">Usuario</p>
            <input type="text" id="loginu" name="email" placeholder="Digite o E-mail"><br><br>
            <p id="pl">Senha</p>
            <input type="Password" id="logins" name="senha" placeholder="Digite sua senha"><br><br>
            <input type="submit" id="entrar" value="Entrar">

        </form>
        <?php if(isset($_GET["erro"]) && $_GET["erro"] == 1) { ?>

        <div class="painel-erro">
            Erro ao fazer login.
        </div>

        <?php } else if(isset($_GET["erro"]) && $_GET["erro"] == 2) { ?>

        <div class="painel-erro">
            Você não está logado.<br/>Faça o login.
        </div>
        <?php } ?>
          <br/>
        <a href="atualizar_senha.php">Esqueci a senha </a>

    </div>
    
</body>

</html>