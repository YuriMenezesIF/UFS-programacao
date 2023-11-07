<?php

include_once("model/Usuario.php");
session_start();

$file = file_get_contents("bd/usuario.bd");

$usuarios = file("bd/usuario.bd");
$vetor = "";
$user = new Usuario();

foreach ($usuarios as $index => $usuario) {

    $vetor = explode("|", $usuario);
    
    if ($vetor['1'] == $_POST["email"] && $vetor['2'] == $_POST["senha"] . "\n") {
        $user->setNome($vetor["0"]);
        $user->setEmail($vetor["1"]);
        $user->setSenha($vetor["2"]);
        $_SESSION["usuario"] = $user;
        $_SESSION["usuarioCache"] = $vetor["0"];
        header("Location:index.php");

    }if ($vetor['1'] != $_POST["email"] && $vetor['2'] == $_POST["senha"] . "\n") {
    echo '<script>alert("Email incorreto")</script>';  
     header("Refresh: 0.6; url=index.php");
    }if ($vetor['1'] != $_POST["email"] && $vetor['2'] != $_POST["senha"] . "\n") {
    echo '<script>alert("Email e Senha incorretos")</script>';  
     header("Refresh: 0.6; url=index.php");
    }if($vetor['1'] == $_POST["email"] && $vetor['2'] != $_POST["senha"] . "\n") {
    echo '<script>alert("Senha incorreta")</script>';  
     header("Refresh: 0.6; url=index.php");
}
}

?>