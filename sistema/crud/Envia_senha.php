<?php



include 'banco.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/vendor/autoload.php';



$email = $_REQUEST['email'];

if (isset($_POST["localizar"])) {

    $query = $conexao->query("SELECT * FROM usuario WHERE email = '" . $email . "'");

    if ($query->num_rows > 0) {
        $_SESSION["email"] = $email_usuario;
        while ($dados = $query->fetch_assoc()) {
            $_SESSION["nome_fantasia"] = $dados["nome_fantasia"];
            $_SESSION["cnpj"] = $dados["cnpj"];
            $_SESSION["email"] = $dados["email"];
        }
        header("Location: ../Esqueci_Senha.php?sucesso=1");
    } else {
        session_unset();
        session_destroy();
        header("Location: ../Esqueci_Senha.php?erroloc=1");
    }
    
} elseif (isset($_POST["atualizar"])) {


    $mail = new PHPMailer(true);

    $result = 0;
    $novasenha = substr(md5(time()), 0, 6);
    $nsenhacript = $novasenha;




    $mail->isSMTP(); // informa o tipo de entrada 

    $mail->Host = "smtp.gmail.com"; // smtp do servidor hostinger.com.br
    $mail->Port = 587; //porta do servido para o envio de email
    $mail->SMTPSecure = "tls"; // informa que o email é seguro 
    $mail->SMTPAuth = true; // e informa que o emaio é verificado
    $mail->Username = "elton13cdz@gmail.com"; // email do destinatario
    $mail->Password = "justino123456"; // senha do destinatrio de acesso ao email

    $mail->setFrom($mail->Username, "Usuario"); // iforma o remetente 
    $mail->addAddress($email); // emaio que vai recerber as informação(destinatario)
    $mail->Subject = "Nova senha CenterPet !"; // titulo do email (assunto)
    // abaixo contem o corpo do email com as informações 
    $conteudo_email = "<strong>A nova senha de login do Pet Center 'e</strong> $nsenhacript
      <br><br>
     ";

    $mail->isHTML(true); // informa que possui html
    $mail->Body = $conteudo_email; // coloca as infomaçoes no corpo do email 
    $resul = $mail->send();

    if ($resul) {
        $sql_code = "UPDATE usuario SET senha = '$nsenhacript' WHERE email = '$email'";
        $query = $conexao->query($sql_code);
        if ($query->num_rows > 0) {

            $resul = 1;
            session_unset();
            session_destroy();
        } else {
            $resul = 1;
            session_unset();
            session_destroy();
        }
    }


    header("Location: ../Esqueci_Senha.php?sucesso=" . 2);
} else {
    header("Location: ../Esqueci_Senha.php?erro=" . 1);
    session_unset();
    session_destroy();
}
