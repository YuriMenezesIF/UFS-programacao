<?php
session_start();
//require_once "../model/Conexao.php";

class Livro {
    //$userV é o usuário que cadastrou o livro
    private $nomeL, $valorL, $quantidadeL, $userV, $imgL;
    
    public function getImgL() {
      $destino = '../foto/' . $_FILES['imgL']['name'];
 
$arquivo_tmp = $_FILES['imgL']['tmp_name'];
 
move_uploaded_file( $arquivo_tmp, $destino  );
        return $this->imgL;
    }

    public function getNomeL() {
        return $this->nomeL;
    }

    public function getValorL() {
        return $this->valorL;
    }

    public function getQuantidadeL() {
        return $this->quantidadeL;
    }

    public function getUserV() {
        return $this->userV;
    }


    public function setImgL($imgL) {
      


         $this->imgL = $imgL;
    }

    public function setNomeL($nomeL) {
        $this->nomeL = $nomeL;
    }

    public function setValorL($valorL) {
        $this->valorL = $valorL;
    }

    public function setQuantidadeL($quantidadeL) {
        $this->quantidadeL = $quantidadeL;
    }

    public function setUserV($userV) {
        $this->userV = $userV;
    }


    public function salvarLivro(){
        $salvar = true;

        if ($this->nomeL == null) {
            $salvar = false;
        }

        if ($this->valorL == null) {
            $salvar = false;
        }

        if ($this->quantidadeL == null) {
            $salvar = false;
        }

        if ($salvar) {
          
          
            $banco = fopen("../bd/livro.bd", "a");
            fwrite($banco, $destino . "|" .
                    $_POST["nomeL"] . "|" .
                    $_POST["valorL"] . "|" .
                    $_POST["quantidadeL"] . "|" .
                    $_SESSION["usuario"] . "\n");
            fclose($banco);
        }
        header("Location: ../index.php");
    }
    public function editarLivro(){
      //Conexao::editarLivro();
    }
}
$livro = new Livro();
$livro->setImgL($destino);
$livro->setNomeL($_POST["nomeL"]);
$livro->setUserV($_SESSION["usuario"]);
$livro->setValorL($_POST["valorL"]);
$livro->setQuantidadeL($_POST["quantidadeL"]);
$livro->salvarLivro();
