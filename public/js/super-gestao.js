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