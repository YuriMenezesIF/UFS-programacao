<html>
  <head>
    <title>LEE</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
  <?php
  include_once("model/Usuario.php");
  ?>  

     <script>
	<?php
  
 if (!isset($_SESSION)){
  session_start();
}
 if(isset($_SESSION["usuarioCache"])){
   unset($_SESSION["usuarioCache"]);
   
  
  echo 'alert("Você foi logado com sucesso");';
   
  }
       
	 
	 ?>
	 </script>
<?php
   
  $altera = true;
	 $novo = file("bd/usuario.bd");
	  if(!isset($_GET["altera"])){
	    $altera = false;
      
	  }
	  if($altera){
      $_SESSION["id"]=$_GET["altera"];
    echo "<script type='text/javascript'>
    $(document).ready(function(){
    $('#EdUser').modal('show');
});
</script>";
    }
    ?>
    <?php
  //echo "Deletar linha: " .$_GET["id"];

  $remover=true;
  if(!isset($_GET["idr"])){
    $remover = false;
  }

  if($remover){
    $dados = file("bd/usuario.bd");
    unset($dados[$_GET["idr"]]);

    file_put_contents("bd/usuario.bd", $dados);
  } 
    $remL=true;
  if(!isset($_GET["idrL"])){
    $remL = false;
  }

  if($remL){
    $dados = file("bd/livro.bd");
    unset($dados[$_GET["idrL"]]);

    file_put_contents("bd/livro.bd", $dados);
  } 

  
?>
    <?php
    $alt = true;
	 $novo = file("bd/livro.bd");
	  if(!isset($_GET["alteraL"])){
	    $alt = false;
      
	  }
	  if($alt){
      $_SESSION["idL"]=$_GET["alteraL"];
    echo "<script type='text/javascript'>
    $(document).ready(function(){
    $('#EdLivro').modal('show');
});
</script>";
    }
    ?>
    <?php
$editar = true;

        if(!isset($_POST["nome"])){
            $editar = false;
        }

        if(!isset($_POST["email"])){
            $editar = false;
        }

        if(!isset($_POST["senha"])){
            $editar = false;
        }
        if(!isset($_SESSION["id"])){
            $editar = false;
        }

        if($editar){
          $usr=file("bd/usuario.bd"); 
          
          $usr[$_SESSION["id"]] = $_POST["nome"]. "|" .$_POST["email"]."|" .$_POST["senha"] . "\n" ;
          file_put_contents("bd/usuario.bd", $usr);
          header("Location: index.php");
        }
?>
   <?php
        $editl = true;

        if(!isset($_POST["nome"])){
            $editl = false;
        }

        if(!isset($_POST["precoLivro"])){
            $editl = false;
        }

        if(!isset($_POST["exemplaresLivro"])){
            $editl = false;
        }
        if(!isset($_SESSION["idL"])){
            $editl = false;
        }

        if($editl){
          $usr=file("bd/livro.bd"); 
          $destino = 'foto/' . $_FILES['imgL']['name'];
          $arquivo_tmp = $_FILES['imgL']['tmp_name'];
          move_uploaded_file( $arquivo_tmp, $destino  );
          $u=$_SESSION["usuario"];
          
          $usr[$_SESSION["idL"]] =
          $destino . "|" .
          $_POST["nome"]. "|" .$_POST["precoLivro"]."|" .$_POST["exemplaresLivro"] . "|" . $u->getNome(). "\n" ;
          file_put_contents("bd/livro.bd", $usr);
          header("Location: index.php");
        }
    ?> 

  </head>
  <body>
    <div class="container">
      <div class="navbar">
    <img src="images/logo.png" class="logo">
    <nav>
     <ul>
        <li>
        <?php if($_SESSION["usuario"]){ ?>  
        <a href="#CadLivro" data-toggle="modal">Cadastrar Livro</a>
        
       <?php } ?>
          <a href="#CadUser" data-toggle="modal">Cadastrar Usuario</a> 
        </li>
     </ul>
    </nav>
    <?php if(isset($_SESSION["usuario"])): ?>
            
            <button class="log" onClick="window.location='logout.php'">Logout</button>
                
            
          <?php else: ?>
          <button class="log" data-toggle="modal" data-target="#login">Realize o Login</button>
        <?php endif; ?>
    
    </div>
    <div class="content">
      <a href="" class="btn">2020 Coleções</a>
      <h1>Se emocione <br>Leia um livro</h1>
      <p>Mundos que com certeza vão te maravilhar.</p>

      <div class="arrow-icons">
      <img src="images/back-arrow.png">
      <img src="images/next-arrow.png">
      </div>

 
    <img src="images/otalisma.jpg" class="feature-img">
    <div class="social-links">
      <a href="https://www.facebook.com/">FACEBOOK</a>
      <a href="https://twitter.com/">TWITTER</a>
      <a href="https://www.youtube.com/">YOUTUBE</a>
    </div>
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
         <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="senha" id="exampleInputPassword1" placeholder="Password">
  </div>
    <!------fim do body do modal------>
  <!------ footer modal------>
  
  <button type="submit" class="btn btn-primary" id="btn-ok">Submit</button>
  <div class="modal-footer"></div>
</form>
      </div>
      </div>
      </div>
      
      
      <!------fim do modal------>
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
  
        <button type="submit" class="btn btn-primary" >Cadastrar</button>
        <div class="modal-footer"></div>
  </form>
      </div>
      </div>
      </div>

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
    <form action="model/Usuario.php" method="post"> 
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
  
        <button type="submit" class="btn btn-primary" >Cadastrar</button>
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
      
       <!------body do modal------>   
    <form action="model/Livro.php" enctype="multipart/form-data" method="post"> 
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
    <form action="index.php?idU=<?=$_GET["id"];?>" method="post"> 
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
    <form enctype="multipart/form-data" action="index.php?id=<?=$_SESSION["idL"];?>" method="post">
    <div class="form-group">
        <label for="edArqL">Selecione uma imagem:</label>
        <input  type="file" name="imgL" id="edArqL" />  
        </div> 
      <div class="form-group">
         <label for="edNomeL">Nome do Livro:</label>
        <input type="name" name="nome" id="edNomeL" placeholder="Coloque seu nome">  
        </div>  
        <div class="form-group">   
         <label for="edPrecoL">Preço do Livro:</label>
         <input type="number" name="precoLivro" min="0" step=".01" >
        
      </div>
      <div class="form-group">
         <label for="edExeL">Numeros de exemplares:</label>
         <input type="number" name="exemplaresLivro" min="0"  >
      </div>
    <!------fim do body do modal------>
  <!------ footer modal------>
  
        <button type="submit" class="btn btn-primary" >Cadastrar</button>
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

       $livros= file("bd/livro.bd"); 
       $vetor="";
       
        
        foreach($livros as $index=> $livro){
         // $imagemExibida = "foto/foto".$index;
         $vetor=explode("|",$livro); 
          ?>
          <script src="./js/confirmeRemover.js">         
          
           
          </script>
         <html lang="pt">

         
     
    
             
          <?php if($_SESSION["usuario"]):?>
          
        
        <div class="column">
         <div class="card">
         <img src="<?php echo $vetor["0"]; ?>" alt="Denim Jeans" ></img>
         <h3> <?= $vetor["1"]; ?></h3>
         <h5>R$ <?= $vetor["2"]; ?></h5>
         <p>Estoque: <?= $vetor["3"]; ?> livros</p>
         <p>Cadastrado por: <?= $vetor["4"];?> </p>
         <button id="bt"><input type="image" id="ip" onClick="confirmacaoLivroEd(id=<?=$index;?>)" src="images/editar.svg" /></button>  
          <button id="bt"><input type="image" id="ip" onClick="confirmacaoLivro(id=<?=$index;?>)" src="images/deletar.svg" /></button>
          </div>
          </div>
          
         <?php else:?>
         
         <div class="column">
         <div class="card">
         <img src="" alt="Denim Jeans" ></img>
         <h3> <?php echo $vetor["0"];?></h3>
         <h5>R$ <?php echo $vetor["1"];?></h5>
         <p>Estoque: <?php echo $vetor["2"];?> livros</p>
         <p>Cadastrado por: <?php echo $vetor["3"];?> </p>
      
         
    
    
    
    </div>
    </div>      
           
          
           
          <?php
          endif;
        }
          ?>
          
        <?php if($_SESSION["usuario"]){ 
             $usuarios= file("bd/usuario.bd"); 
             foreach($usuarios as $index=> $usuario){
              
          ?>
           <html lang="pt">
                    
           
          
         <!--<script src="./js/confirmeRemover.js">--->
        <!-- confirmacaoLivro();--->
        <!-- </script>---->
       
          <br>  
          
          <a id="user"><?=($index+1).". ".$usuario;?></a>
          
          <button id="bt"><input type="image" id="ip"  onClick="confirmacaoUserEd(id=<?=$index;?>)" src="images/editar.svg" /></button>
          
          <button id="bt"><input type="image" id="ip" onClick="confirmacaoUser(id=<?=$index;?>)" src="images/deletar.svg" /></button> 
           
          
          <br>    
          
          <?php
         }
        }
          ?>
         
   
    

      

  </body>
  
</html>