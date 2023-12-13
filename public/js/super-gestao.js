
const retornoCepNaoEncontrado = document.getElementById('retornoCepNaoEncontrado');

$("#nr_cep").blur(function () {
    var nr_cep = $(this).val().replace(/\D/g, '');
    if (nr_cep != "") {
        var validaCep = /^[0-9]{8}$/;
        if (validaCep.test(nr_cep)) {
            $("#ds_logradouro").val(" Carregando... ");
            $("#ds_bairro").val(" Carregando... ");
            $("#ds_cidade").val(" Carregando... ");
            $("#ds_uf").val(" Carregando... ");
            $.getJSON("https://viacep.com.br/ws/" + nr_cep + "/json/?callback=?", function (dados) {
                if (!("erro" in dados)) {
                    $("#ds_logradouro").val(dados.logradouro.toUpperCase());
                    $("#ds_bairro").val(dados.bairro.toUpperCase());
                    $("#ds_cidade").val(dados.localidade.toUpperCase());
                    $("#ds_uf").val(dados.uf.toUpperCase());
                    retornoCepNaoEncontrado.style.display = 'none';
                }
                else {
                    $("#ds_logradouro").val("");
                    $("#ds_bairro").val("");
                    $("#ds_cidade").val("");
                    $("#ds_uf").val("");
                    retornoCepNaoEncontrado.innerText = `CEP ${nr_cep} não encontrado de forma automatizado digite manualmente ou tente novamente.`;
                    retornoCepNaoEncontrado.style.display = 'block';
                    // alert("CEP não encontrado de forma automatizado digite manualmente ou tente novamente.");
                }
            });
        }
    }
});




// function deleteProduto(rotaUrl, idRegistro){
//     // alert(rotaUrl);
//     // alert(idRegistro);
//     if(confirm('Deseja Excluir o Registro?')){
//         $.ajax({
//             url: rotaUrl,
//             method: 'DELETE',
//             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//             data: {
//                 id: idRegistro,
//             },
//             beforeSend: function () {   // Enquanto estiver executando
//                 $.blockUI({
//                     message: 'Carregando...',
//                     timeout: 2000,
//                 });
//             },
//         }).done(function (data) {       // Em caso de sucesso
//             $.unblockUI();              // Parando o loading
//             // alert('Sucesso! ');
//             // console.log(data);
//             if(data.success == true){   // Verificando o retorno do json do controller
//                 window.location.reload();
//             } else {
//                 alert('Erro! Ao excluir os dados do registro!');
//             }
//         }).fail(function (data) {       // Em caso de erro
//             $.unblockUI();
//             alert('Erro! Não foi possível buscar os dados do registro!');
//         });
//     }
// }