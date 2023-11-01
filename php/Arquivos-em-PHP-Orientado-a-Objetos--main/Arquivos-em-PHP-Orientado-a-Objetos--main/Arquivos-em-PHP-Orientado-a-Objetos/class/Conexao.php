<?php

class Conexao {
    
    
    const separator = "|";
    
    
    
    public static function getSeparador() {
        return self::$separador;
    }

    public static function salvarUser() {

        $campos = $_POST["nome"] . Conexao::separator . $_POST["email"] . Conexao::separator . $_POST["senha"] ;
        $file = fopen("../bd/usuario.bd", "a");
        fwrite($file, $campos . "\n");
        fclose($file);
    }

    
    public static function deletar() {
        $dados = file("usuario.bd");
        unset($dados[$_GET["id"]]);
        file_put_contents("usuario.bd",$dados);
        
    }

    public static function editar(){

      $usr=file("usuario.bd");
      
      $usr[$_GET["id"]] = $_POST["nome"]. Conexao::separator .$_POST["email"]. Conexao::separator .$_POST["senha"] . "\n"  ;
      file_put_contents("usuario.bd",$usr);
      
    }

    public static function redirecionar(){
      $altera = true;
	    
	      if(!isset($_GET["altera"])){
	        $altera = false;
      
	      }
	      if($altera){
          $novo = file("bd/usuario.bd");
          $vetor=explode("|", $novo[$_GET["altera"]]);  
          
          echo '<form action="bd/editar-usuario.php?id='.$_GET["altera"] . '" method="post">';
          return $vetor;
        }else{
          echo '<form action="bd/salvar-usuario.php" method="post">';
    }
    }
    public static function listar(){
    return file("bd/usuario.bd");
    }
}