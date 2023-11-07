<?php

include_once("model/Usuario.php");
session_start();
  
  $file =file_get_contents("bd/usuario.bd");

  $usuarios= file("bd/usuario.bd"); 
       $vetor="";
       $user = new Usuario(); 
        
        foreach($usuarios as $index=> $usuario){
        
         $vetor=explode("|",$usuario);
         print_r($vetor);
         if($vetor['1']==$_POST["email"] && $vetor['2']==$_POST["senha"] . "\n") {
           $user->setNome($vetor["0"]);
           $user->setEmail($vetor["1"]);
           $user->setSenha($vetor["2"]);
          $_SESSION["usuario"] = $user;
          $_SESSION["usuarioCache"] = $vetor["0"]; 
         header("Location:index.php");
         }
        } 
        
          ?>
  
  