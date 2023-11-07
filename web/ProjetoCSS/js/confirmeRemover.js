function confirmacaoUser(id) {
  var resposta = confirm("Deseja remover esse Usuário?");
    if (resposta == true) {
        window.location.href = "./index.php?idr="+id;
    }
}

function confirmacaoLivro(id) {
  var resposta = confirm("Deseja remover Livro?");
    if (resposta == true) {
        window.location.href = "./index.php?idrL="+id;
    }
}
function confirmacaoUserEd(id) {
  var resposta = confirm("Deseja editar esse Usuário?");
    if (resposta == true) {
        window.location.href = "./index.php?altera="+id;
    }
}
function confirmacaoLivroEd(id) {
  var resposta = confirm("Deseja editar esse Livro?");
    if (resposta == true) {
        window.location.href = "./index.php?alteraL="+id;
    }
}