$(".nome_pf").click((e) => {
    var id = $(e.target).attr("id");

    getPessoaFisicaById(id);
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

function formatCEP(cep) {
    cep = cep.replace(/\D/g, '');
    cep = cep.replace(/^(\d{5})(\d)/, '$1-$2');
  
    return cep;
}

function getPessoaFisicaById(id) {
    $.ajax({
        type: "GET",
        url: `/get/pf?id=${id}`,
        dataType: "json",
        success: function (result) {
            $("#titleNomePf").text(`${result[0].nome_pf}`);

            $("#nomePf").text(result[0].nome_pf);
            $("#cpf").text(result[0].cpf);
            $("#email").text(result[0].email);
            $("#dataNascimento").text(result[0].data_formatada);
            $("#genero").text((result[0].sexo == "M") ? "Masculino" : "Feminimo");
            $("#cidade").text(`${result[0].nome_cidade}-${result[0].uf}`);
            $("#logradouro").text(`${result[0].logradouro}, ${result[0].numero}`);
            $("#bairro").text(result[0].bairro);
            $("#cep").text(formatCEP(result[0].cep));
            $("#ibge").text(result[0].codigo_ibge);
            $("#ddd").text(result[0].ddd);

            getQualificacaoById(id);
        },
        error: function (result) {
            console.log(result);
        }
    });
}

function getQualificacaoById(id) {
    $.ajax({
        type: "GET",
        url: `/get/qualificacao?id=${id}`,
        dataType: "json",
        success: function (result) {
            var indiceJson = Object.keys(result.response_data).length;
            var divPai = $("#div_containter_formacao_academica");
            divPai.text("");


            for(var i = 0; i < indiceJson; i++) {
                var data_conclusao = (result.response_data[i].data_conclusao == null) ? "Em Andamento" : result.response_data[i].data_conclusao;

                var divFilho = $(`
                <div class="formacao_academica">
                    <hr class="hr_branco">
                    <h6>Formação Academica <i class="bi bi-book-fill"></i> - <span class="tituloFormacao">${result.response_data[i].curso}</span></h6>
                    <hr>
                    <span><b>Instituição: </b>${result.response_data[i].instituicao}</span> <br>
                    <span><b>Curso: </b>${result.response_data[i].curso}</span> <br>
                    <span><b>Conteúdo Curso: </b>${result.response_data[i].conteudo_curso}</span> <br>
                    <span><b>Data Início: </b>${result.response_data[i].data_inicio}</span> <br>
                    <span><b>Data Conclusão: </b>${data_conclusao}</span> <br>
                </div>
                `);

                divPai.append(divFilho);
            }
        },
        error: function (result) {
            console.log(result);
        }
    });
}
