$(function(){
    //Exibir senha ao segurar o olhinho.
    var senha = $('#senha');
    var olho= $("#olho");

    olho.mousedown(function() {
        senha.attr("type", "text");
    });

    olho.mouseup(function() {
        senha.attr("type", "password");
    });
    // para evitar o problema de arrastar a imagem e a senha continuar exposta, 
    //citada pelo nosso amigo nos comentários
    $( "#olho" ).mouseout(function() { 
        $("#senha").attr("type", "password");
    });
    //Fim


});