$(document).ready(function () {

    // Inicio mascara para os campos
    var $campoCpf = $(".maskCpf");
    var $campoCep = $(".maskCep");
    var $campoData = $(".dataMask");
    var $campoTelefone = $(".maskTelefone");
    $campoCpf.mask('000.000.000-00', {
        reverse: true
    });
    $campoCep.mask('00000-000', {
        reverse: true
    });
    $campoTelefone.mask('00 00000-0000', {
        reverse: true
    });
    $campoData.mask('0000-00-00', {
        reverse: true
    });
    // Fim mascara para os campos

});

    