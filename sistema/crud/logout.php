<?php
session_start();


// Remove todas as variaveis de sessoões 
session_unset();

//destroi a sessão
session_destroy();

header("Location:../login2.php");

?>