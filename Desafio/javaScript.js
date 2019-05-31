$("#cep").focusout(function(){
    $.ajax({
        url: 'https://viacep.com.br/ws/' + $(this).val() + '/json/unicode',
        dataType: 'json',
        success: function(response){
            $("#endereco").val(response.logradouro);
            $("#cidade").val(response.localidade);
            $("#uf").val(response.uf);
    
            $("#numero").focus();
        }
    });
});

function winClose(){
    location.href="home.php"
}