function deleteRegistroListagem(rotaUrl, idDoRegistro) {
    // Função para exibir notificação com BlockUI
    function showNotification(message) {
    $.blockUI({
      message: '<div class="blockui-notification">' + message + '</div>',
      fadeIn: 700,
      fadeOut: 700,
      timeout: 3000, // Tempo em milissegundos para a notificação desaparecer
      showOverlay: false,
      centerY: false,
      css: {
        width: '250px',
        top: '10px',
        left: '',
        right: '10px',
        border: 'none',
        padding: '10px',
        backgroundColor: '#2ecc71', // Cor de fundo da notificação (pode ser ajustada)
        color: '#fff', // Cor do texto da notificação (pode ser ajustada)
        opacity: 0.9,
        borderRadius: '5px',
        cursor: 'pointer',
      },
      onUnblock: function() {
        $.unblockUI();
        
      },
    });
    }
    if (confirm('Deseja confirmar a exclusão?')) {
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: { 
                id: idDoRegistro,
            },
            beforeSend: function () {
                $.blockUI({
                    message: 'Carregando...',
                    timeout: 2000,
                    showOverlay: true,
                });
            },
        }).done(function (data) {
            $.unblockUI();
            if (data.success == true) {
                window.location.reload();
            } else {
                alert('Nao foi possivel excluir');
            }
        }).fail(function (data) {
            $.unblockUI();
            alert('Nao foi possivel buscar os dados');
        });
    }
}

$('#mascara_valor').mask('#.##0,00', { reverse: true });


$("#cep").blur(function () {
    var cep = $(this).val().replace(/\D/g, '');
    if (cep != "") {
        var validacep = /^[0-9]{8}$/;
        if (validacep.test(cep)) {
            $("#logradouro").val("");
            $("#bairro").val(" ");
            $("#endereco").val(" ");
            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                if (!("erro" in dados)) {
                    $("#logradouro").val(dados.logradouro.toUpperCase());
                    $("#bairro").val(dados.bairro.toUpperCase());
                    $("#endereco").val(dados.localidade.toUpperCase());
                }
                else {
                    alert("CEP não encontrado de forma automatizado digite manualmente ou tente novamente.");
                }
            });
        }
    }
});