
function limpar() {
if(document.getElementById('textNome').value!="") {
document.getElementById('textNome').value="";
document.getElementById('textEmail').value="";
document.getElementById('textSenha').value="";
}
if(document.getElementById('textEmail').value!="") {
document.getElementById('textNome').value="";
document.getElementById('textEmail').value="";
document.getElementById('textSenha').value="";
}
if(document.getElementById('textSenha').value!="") {
document.getElementById('textNome').value="";
document.getElementById('textEmail').value="";
document.getElementById('textSenha').value="";
}
}

