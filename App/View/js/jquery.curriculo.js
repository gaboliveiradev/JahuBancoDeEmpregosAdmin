$(".nome_pf").click((e) => {
    var id = $(e.target).attr("id");

    getById(id);
});

function formatData(data) {
    var dia = data.getDate();
    var mes = data.getMonth() + 1; // Os meses são indexados de 0 a 11
    var ano = data.getFullYear();
  
    // Adiciona um zero à esquerda se o dia ou o mês tiverem apenas um dígito
    if (dia < 10) {
      dia = '0' + dia;
    }
    if (mes < 10) {
      mes = '0' + mes;
    }
  
    return dia + '/' + mes + '/' + ano;
}

function getById(id) {
    $.ajax({
        type: "GET",
        url: `/get/curriculo?id=${id}`,
        dataType: "json",
        success: function (result) {
            $("#titleNomePf").text(`${result[0].nome_pf}`);

            $("#nomePf").text(result[0].nome_pf);
            $("#cpf").text(result[0].cpf);
            $("#email").text(result[0].email);
            $("#dataNascimento").text(result[0].data_formatada);
            $("#genero").text((result[0].sexo == "M") ? "Masculino" : "Feminimo");
        },
        error: function (result) {
            console.log(result)
        }
    });
}
