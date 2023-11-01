/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function enviando() {
    //Pega o elemento div
    var x = document.getElementById("mensagem");

   
    x.className = "show";


   
    setTimeout(function () {
        x.className = x.className.replace("show", "");
    }, 3000);
    setTimeout(function () {
        window.location.href = "Inicio.html"; //vai redirecionar para pagina inicial 
    }, 3000); //vai chamar a funcao depois de 2 segundos.

}

