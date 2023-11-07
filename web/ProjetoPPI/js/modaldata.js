function limpar() {
if(document.getElementById('cadNomeU').value!="") {
document.getElementById('textNome').value="";
document.getElementById('cadEmailU').value="";
document.getElementById('cadPassU').value="";
}
if(document.getElementById('cadEmailU').value!="") {
document.getElementById('cadNomeU').value="";
document.getElementById('cadEmailU').value="";
document.getElementById('cadPassU').value="";
}
if(document.getElementById('cadPassU').value!="") {
document.getElementById('cadNomeU').value="";
document.getElementById('cadEmailU').value="";
document.getElementById('cadPassU').value="";
}
}