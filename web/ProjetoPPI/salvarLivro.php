<?php

include_once("model/Livro.php");

$livro = new Livro();

$livro->setImgL($destino);
$livro->setNomeL($_POST["nomeL"]);
$livro->setUserV($_SESSION["usuario"]);
$livro->setValorL($_POST["valorL"]);
$livro->setQuantidadeL($_POST["quantidadeL"]);
$livro->salvarLivro();
?>