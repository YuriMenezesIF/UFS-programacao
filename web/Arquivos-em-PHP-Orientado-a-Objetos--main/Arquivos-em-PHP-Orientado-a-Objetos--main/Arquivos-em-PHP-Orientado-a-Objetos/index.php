<html>

  <head>
    <title>Atividade Alterar Dados Em PHP</title>
    <link rel="stylesheet" href="../css/base.css"/>
    
  </head>
  <body>
  <h1>Arquivos em PHP</h1>
  <main>
  
  <script  src="../script/main.js">
  limpar();
  
  </script>
  <?php
   require_once "class/Conexao.php";
   $vetor["0"]="";
   $vetor["1"]="";
   $vetor["2"]="";
    $vetor=Conexao::redirecionar();
  ?>
  
    <section class="linhav">
      <h2>Cadastro</h2>
      <form action="bd/salvar-usuario.php" method="post">
        <div>
        
          <label for='textNome'>Nome</label>
          <input type="text"  id="textNome" value = "<?php print_r($vetor["0"]);?>"
            name="nome">
        </div>
        
        <div>
          <label for='textEmail'>Email</label>
          <input type="email" id="textEmail" value= "<?php print_r($vetor["1"]);?>"
            name="email">
        </div>
        
        <div>
          <label for='textSenha'>Senha</label>
          <input type="password" id="textSenha" value="<?php print_r($vetor["2"]);?>"
            name="senha">
        </div>

        <div  >
          <input type="submit" value="Cadastrar" class="btn">
          <input type="button" value="Limpar " onClick="limpar()" class="btn">
          <input type="button" value="Cancelar" onClick="window.location='index.php'" class="btn">
        </div>
        
      </form>
    </section>
    <section>
      <h2>Itens</h2>
      <ol>
        <?php
        include_once './bd/listar-usuario.php';
        $usuarios=Conexao::listar();       
        foreach($usuarios as $index=> $usuario){
          
          ?>
          
          <li>
              
              <?=$usuario;?>
              
              <button id="bt"><input type="image" id="ip" onClick="window.location='index.php?altera=<?=$index;?>'"src="icones/editar.svg" /></button>
              <button id="bt"><input type="image" id="ip" onClick="window.location='bd/deletar-usuario.php?id=<?=$index;?>'" src="icones/deletar.svg" /></button>
              
              
          </li>
           

          <?php      
        } 
        ?>
      </ol>
       
    </section>
    </main>
  <footer>
  <p>Elaborado por Yuri</p>
  <p>Todos os direitos estão Reservados </p>
  </footer>   
  </body>
</html>