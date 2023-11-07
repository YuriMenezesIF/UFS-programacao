<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/gif/png" href="images/logo.png">
        <title>LEE</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <?php
        include_once("model/Usuario.php");
        ?>  

        <script  src="../js/modaldata.js"></script>
<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION["usuarioCache"])) {
    unset($_SESSION["usuarioCache"]);
    $ut=$_SESSION["usuario"];
   ?>
     <script>
     var u = "<?= $ut->getNome();?>";
     alert("O usuario " + u + " foi logado com sucesso!"); 
     </script>
     <?php
}
?>
              
        <!--Inicio de Navegação -->
        <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand text-primary font-weight-bold" href="#"><img class="logo" src="images/logo.png" ></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">

                            <?php if ($_SESSION["usuario"]) { ?>  
                            <li class="nav-item">
                                <a class="nav-link" href="#CadLivro" data-toggle="modal">Cadastrar Livro</a>

                            <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#CadUser" data-toggle="modal">Cadastrar Usuario</a> 
                        </li>
                        <?php if (isset($_SESSION["usuario"])): ?>

                            <li class="nav-item">
                                <button class="logout" onClick="window.location = 'logout.php'" >Logout</button>
                            </li>    

                        <?php else: ?>
                            <li class="nav-item">
                                <button class="log" data-toggle="modal" data-target="#login">Entrar</button>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>	
        </nav>
        <!-- Fim de Navegacao -->

        <!---Slider de Imagem -->
        <div id="slides" class="carousel slide" data-ride="carousel" data-interval="3000"> 
            <ul class="carousel-indicators">
                <li data-target="#slides" data-slide-to="0" class="active"></li>
                <li data-target="#slides" data-slide-to="0"></li>
                <li data-target="#slides" data-slide-to="0"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/MidnightInParis.jpg" class="mx-auto d-block" width=100%>
                    <div class="carousel-caption">
                        <h1 class="display-4">Se emocione. Leia um livro</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/otelo.jpg" class="mx-auto d-block" width=100%>
                    <div class="carousel-caption">
                        <h1 class="display-4">Mundos que com certeza vão te maravilhar.</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/otalisma.jpg" class="mx-auto d-block" width=100%>
                    <div class="carousel-caption">
                        <h1 class="display-4">Aproveite nossas promoções.</h1>
                    </div>
                </div>
            </div>
        </div>
        <!--- Fim do Slider de Imagem -->

        <?php
        $altera = true;
        $novo = file("bd/usuario.bd");
        if (!isset($_GET["altera"])) {
            $altera = false;
        }
        if ($altera) {
            $_SESSION["id"] = $_GET["altera"];
            echo "<script type='text/javascript'>
            $(document).ready(function(){
           $('#EdUser').modal('show');
});
</script>";
        }
        ?>
        <?php
        
        $remover = true;
        if (!isset($_GET["idr"])) {
            $remover = false;
        }

        if ($remover) {
            $dados = file("bd/usuario.bd");
            unset($dados[$_GET["idr"]]);

            file_put_contents("bd/usuario.bd", $dados);
        }
        $remL = true;
        if (!isset($_GET["idrL"])) {
            $remL = false;
        }

        if ($remL) {
            $dados = file("bd/livro.bd");
            unset($dados[$_GET["idrL"]]);

            file_put_contents("bd/livro.bd", $dados);
        }
        ?>
        <?php
        $vetor = "";
        $alt = true;

        if (!isset($_GET["alteraL"])) {
            $alt = false;
        }
        if ($alt) {
            $novo = file("bd/livro.bd");
            $vEdit = explode("|", $novo[$_GET["alteraL"]]);

            $_SESSION["idL"] = $_GET["alteraL"];
            echo "<script type='text/javascript'>
    $(document).ready(function(){
    $('#EdLivro').modal('show');
});
</script>";
        }
        ?>
        <?php
        $editar = true;

        if (!isset($_POST["nome"])) {
            $editar = false;
        }

        if (!isset($_POST["email"])) {
            $editar = false;
        }

        if (!isset($_POST["senha"])) {
            $editar = false;
        }
        if (!isset($_SESSION["id"])) {
            $editar = false;
        }

        if ($editar) {
            $usr = file("bd/usuario.bd");
            $u=$_SESSION["usuario"];
            $u->setNome($_POST["nome"]);
            $_SESSION["usuario"]=$u;
             
            $usr[$_SESSION["id"]] = $_POST["nome"] . "|" . $_POST["email"] . "|" . $_POST["senha"] . "\n";
            file_put_contents("bd/usuario.bd", $usr);
            header("Location: index.php");
        }
        ?>
        <?php
        $editl = true;

        if (!isset($_POST["nome"])) {
            $editl = false;
        }

        if (!isset($_POST["precoLivro"])) {
            $editl = false;
        }

        if (!isset($_POST["exemplaresLivro"])) {
            $editl = false;
        }
        if (!isset($_SESSION["idL"])) {
            $editl = false;
        }

        if ($editl) {
            $usr = file("bd/livro.bd");
            $destino = 'foto/' . $_FILES['imgL']['name'];
            $arquivo_tmp = $_FILES['imgL']['tmp_name'];
            move_uploaded_file($arquivo_tmp, $destino);
            $u = $_SESSION["usuario"];

            $usr[$_SESSION["idL"]] = $destino . "|" .
                    $_POST["nome"] . "|" . $_POST["precoLivro"] . "|" . $_POST["exemplaresLivro"] . "|" . $u->getNome() . "\n";
            file_put_contents("bd/livro.bd", $usr);
            header("Location: index.php");
        }
        ?>
        
        <!-- Modal header-->
        <div class="modal fade" id="login" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Modal header-->

                    <!------body do modal------>   
                    <form action="login.php" method="post"> 
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email:</label>
                            <input type="email" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">Nós não compartilhamos o seu e-mail.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" name="senha" id="exampleInputPassword1" placeholder="Digite sua senha">
                        </div>
                        <!------fim do body do modal------>
                        
                        <!------ footer modal------>
                        <button type="submit" class="btn btn-primary" id="btn-ok">Entrar </button>
                        <div class="modal-footer"></div>
                    </form>
                </div>
            </div>
        </div>
        <!------fim do modal------>

        <div class="modal fade" id="CadUser" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastrar Usuário </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Modal header-->

                    <!------body do modal------>   
                    <form action="salvarUsuario.php" method="post"> 
                        <div class="form-group">
                            <label for="cadNomeU">Nome:</label>
                            <input type="name" name="nome" id="cadNomeU" placeholder="Coloque seu nome">  
                        </div>  
                        <div class="form-group">   
                            <label for="cadEmailU">Email:</label>
                            <input type="email" name="email" id="cadEmailU" placeholder="Coloque seu e-mail">
                        </div>
                        <div class="form-group">
                            <label for="cadPassU">Senha:</label>
                            <input type="password" name="senha" id="cadPassU" placeholder="Coloque sua senha">
                        </div>
                        <!------fim do body do modal------>
                        
                        <!------ footer modal------>
                        <input button type="submit" class="btn btn-primary" ></button>
                        <input type="reset" value="Limpar "  class="btn">
                        <input type="button" value="Cancelar" onClick="window.location='index.php'" class="btn">
                        <div class="modal-footer"></div>
                    </form>
                </div>
            </div>
        </div>
<div class="modal fade" id="EdUser" role="dialog">
    <div class="modal-dialog">
          <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Usuário </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Modal header-->
      
       <!------body do modal------>   
    <form action="index.php?id=<?=$_GET["id"];?>" method="post"> 
      <div class="form-group">
         <label for="edNomeU">Nome:</label>
        <input type="name" name="nome" id="edNomeU" placeholder="Coloque seu nome">  
        </div>  
        <div class="form-group">   
         <label for="edEmailU">Email:</label>
        <input type="email" name="email" id="edEmailU" placeholder="Coloque seu e-mail">
        
      </div>
      <div class="form-group">
        <label for="edPassU">Senha:</label>
        <input type="password" name="senha" id="edPassU" placeholder="Coloque sua senha">
      </div>
    <!------fim do body do modal------>
  <!------ footer modal------>
  
        <button type="submit" class="btn btn-primary" >Salvar</button>
        <input type="reset" value="Limpar"  class="btn">
        <div class="modal-footer"></div>
  </form>
      </div>
      </div>
      </div>

        <div class="modal fade" id="CadLivro" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastrar Livro </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Modal header-->

                    <form action="salvarLivro.php" enctype="multipart/form-data" method="post"> 
                        <div class="form-group">
                            <label for="cadArqL">Selecione uma imagem:</label>
                            <input  type="file" name="imgL" id="cadArqL" />  
                        </div>
                        <div class="form-group">
                            <label for="cadNomeL">Nome do Livro:</label>
                            <input type="name" name="nomeL" id="cadNomeL" placeholder="Coloque o nome do livro">  
                        </div>  
                        <div class="form-group">   
                            <label for="cadPrecoL">Preço do Livro:</label>
                            <input type="number" name="valorL" min="0" step=".01" >
                        </div>
                        <div class="form-group">
                            <label for="cadExeL">Numeros de exemplares:</label>
                            <input type="number" name="quantidadeL" min="0"  >
                        </div>
                        <!------fim do body do modal------>
                        <!------ footer modal------>

                        <button type="submit" class="btn btn-primary" >Cadastrar</button>
                        <div class="modal-footer"></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="EdLivro" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Livros </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Modal header-->

                    <!------body do modal------>   
                    <form action="index.php?id=<?= $_SESSION["idL"]; ?>" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="edArqL">Selecione uma imagem:</label>
                            <input  type="file" name="imgL" id="edArqL" />  
                        </div> 
                        <div class="form-group">
                            <label for="edNomeL">Nome do Livro:</label>
                            <input type="name" name="nome" id="edNomeL" value="<?php print_r($vEdit['1']); ?>">  
                        </div>  
                        <div class="form-group">   
                            <label for="edPrecoL">Preço do Livro:</label>
                            <input type="number" name="precoLivro" value=<?= $vEdit["2"]; ?> min="0" step=".01" >
                        </div>
                        <div class="form-group">
                            <label for="edExeL">Numeros de exemplares:</label>
                            <input type="number" name="exemplaresLivro" value=<?= $vEdit["3"]; ?> min="0"  >
                        </div>
                        <!------fim do body do modal------>
                        <!------ footer modal------>

                        <button type="submit" class="btn btn-primary" >Salvar</button>
                        <div class="modal-footer"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    $_GET["msg"] = "";

    if (isset($_SESSION["msg"])) {
        echo $_SESSION["msg"];
        unset($_SESSION["msg"]);
    }
    ?>

    <?php
    $livros = file("bd/livro.bd");
    $vetor = "";
    ?><div class="row"><?php
    foreach ($livros as $index => $livro) {
        
        $vetor = explode("|", $livro);
        ?>
            <script src="./js/confirmeRemover.js"></script>
            <html lang="pt">

                <?php if ($_SESSION["usuario"]): ?>

                    <div class="col-md-4">
                        <div class="column">
                            <div class="card">
                                <img src="<?php echo $vetor["0"]; ?>" alt="Denim Jeans" ></img>
                                <h3> <?= $vetor["1"]; ?></h3>
                                <h5>R$ <?= $vetor["2"]; ?></h5>
                                <p>Estoque: <?= $vetor["3"]; ?> livros</p>
                                <p>Cadastrado por: <?= $vetor["4"]; ?> </p>
                                <button class="btE" onClick="confirmacaoLivroEd(id =<?= $index; ?>)" ><input type="image"  id="ip"  src="images/editar.svg" /></button>  
                                <button class="btD" onClick="confirmacaoLivro(id =<?= $index; ?>)"><input type="image" id="ip" src="images/deletar.svg" /></button>
                            </div>
                        </div>
                    </div>

                <?php else: ?>

                    <div class="col-md-4">
                        <div class="column">
                            <div class="card">
                                <img src="<?php echo $vetor["0"]; ?>" alt="Denim Jeans" ></img>
                                <h3> <?= $vetor["1"]; ?></h3>
                                <h5>R$ <?= $vetor["2"]; ?></h5>
                                <p>Estoque: <?= $vetor["3"]; ?> livros</p>
                                <p>Cadastrado por: <?= $vetor["4"]; ?> </p>
                            </div>
                        </div>
                    </div>
                
                <?php
                endif;
            }
            ?></div>

    <!--- Aba Usuarios -->
    <br><br><br><br><br>
    <button type="button" class="fun btn btn-lg btn-block btn-outline-primary col-8 offset-2" data-toggle="collapse" data-target="#users">	<h1 class="display-4">Usuários</h1><h1 class="display-4"></h1></button>
    <div id="users" class="collapse">
        <div class="container-fluid padding" >
            <div class="row">
                <div class="col-8 offset-2">
                    <?php
                    if ($_SESSION["usuario"]) {
                        $usuarios = file("bd/usuario.bd");
                        $v1="";
                        foreach ($usuarios as $index => $usuario) {
                          $v1 = explode("|", $usuario);
                            ?>
                            <html lang="pt">
                                

                                <br>  

                                <a id="user"><?= ($index + 1) . ". " . $v1["0"]; ?></a>

                                <input type="image" id="ip" onClick="confirmacaoUserEd(id =<?= $index; ?>)"   src="images/editar.svg" /></input>

                                <input type="image" id="ip" onClick="confirmacaoUser(id =<?= $index; ?>)"   src="images/deletar.svg" /></input> 
                                

                                <br>    

                                <?php
                            }
                        }
                        ?>
                </div> 
            </div>  
        </div>  
    </div>  
    <!--- Fim da aba usuario -->

    <br><br><br><br><br>

    <!---Inicio da Aba de Conexão -->
    <div class="container-fluid padding">
        <div class="row text-center padding">
            <div class="col-12">
                <h2 class="display-4">Redes Sociais</h2>
                <hr width="150px">
            </div>
            <div class="col-12 social padding">
                <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                <a href="https://twitter.com/home"><i class="fab fa-twitter"></i></a>
                <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <!--- fim da aba de conexão -->

    <br><br><br><br><br>

    <!--- Inicio do Footer -->
    <footer>
        <div class="container-fluid padding">
            <div class="row text-center font-weight-bold">
                <div class="col-sm-10 offset-sm-1 col-md-4 offset-md-0">
                    <hr class="light">
                    <h5>Encomende Livros sob demanda</h5>
                    <hr class="light">
                    <p></p>
                </div>
                <div class="col-sm-10 offset-sm-1 col-md-4 offset-md-0">
                    <hr class="light">
                    <h5>Fale Conosco!</h5>
                    
                    <hr class="light">
                    
                    <p><a class="linkm" href="mailto: yuri.andrade@escolar.ifrn.edu.br">yuri.andrade@escolar.ifrn.edu.br</a></p>
                    <p><a class="linkm" href="mailto: hudson.artur@escolar.ifrn.edu.br">hudson.artur@escolar.ifrn.edu.br</a></p>
                    <p><a class="linkm" href="mailto: j.eva@ecolar.ifrn.edu.br">j.eva@ecolar.ifrn.edu.br</a></p>
                    <p><a class="linkm" href="mailto: ellen.marjorie@ecolar.ifrn.edu.br">ellen.marjorie@ecolar.ifrn.edu.br</a></p>
                </div>
                <div class="col-sm-10 offset-sm-1 col-md-4 offset-md-0">
                    <hr class="light">
                    <h5>Suporte Remoto em Horários Comerciais</h5>
                    <hr class="light">
                    <p></p>
                </div>
                <div class="col-12">
                    <hr class="light-100">
                    <h5>&copy; Estante Encantada 2021 </h5>
                    <p><a class="linkm" href="#">Topo</a></p>
                    <img class="footimg" src="images/logo.png">
                </div>
            </div>
        </div>
    </footer>
    <!--- fim do Footer -->

</body>
</html>