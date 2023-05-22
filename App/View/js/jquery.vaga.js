$(".desc_vaga").click((e) => {
    var id = $(e.target).attr("id");

    getVagaById(id);
});

function formatCNPJ(cnpj) {
    cnpj = cnpj.replace(/\D/g, '');
  
    cnpj = cnpj.replace(/^(\d{2})(\d)/, '$1.$2');
    cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
    cnpj = cnpj.replace(/\.(\d{3})(\d)/, '.$1/$2');
    cnpj = cnpj.replace(/(\d{4})(\d)/, '$1-$2');
  
    return cnpj;
}

function formatarValorReal(valor) {
    // Converter para número
    var numero = parseFloat(valor);
  
    // Verificar se é um número válido
    if (isNaN(numero)) {
      return "Valor inválido";
    }
  
    // Formatar como valor monetário
    var valorFormatado = numero.toLocaleString("pt-BR", {
      style: "currency",
      currency: "BRL",
    });
  
    return valorFormatado;
}

function formatCEP(cep) {
    cep = cep.replace(/\D/g, '');
    cep = cep.replace(/^(\d{5})(\d)/, '$1-$2');
  
    return cep;
}

function getVagaById(id) {
    $.ajax({
        type: "GET",
        url: `/get/vaga?id=${id}`,
        dataType: "json",
        success: function (result) {
            $("#titleVaga").text(`${result[0].titulo}`);

            $("#vaga").text(result[0].titulo);
            $("#desc").text(result[0].descricao);
            $("#salario").text(formatarValorReal(result[0].salario));
            $("#setor").text(result[0].setor);
            $("#data_abertura").text(result[0].data_abertura);
            $("#data_fechamento").text((result[0].data_fechamento == null) ? "Em Aberto" : result[0].data_fechamento);

            $("#nomeFantasia").text(result[0].nome_fantasia);
            $("#razaoSocial").text(result[0].razao_social);
            $("#cnpj").text(formatCNPJ(result[0].cnpj));
            $("#contato").text(result[0].email);

            $("#cidade").text(`${result[0].nome_cidade}-${result[0].uf}`);
            $("#logradouro").text(`${result[0].logradouro}, ${result[0].numero}`);
            $("#bairro").text(result[0].bairro);
            $("#cep").text(formatCEP(result[0].cep));
            $("#ibge").text(result[0].codigo_ibge);
            $("#ddd").text(result[0].ddd);
        },
        error: function (result) {
            console.log(result);
        }
    });
}