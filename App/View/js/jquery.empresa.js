$("#nome_empresa").click(() => {
    var idPj = $("a#nome_empresa").attr("idPj");

    getById(idPj);
});

function formatCNPJ(cnpj) {
    cnpj = cnpj.replace(/\D/g, '');
  
    cnpj = cnpj.replace(/^(\d{2})(\d)/, '$1.$2');
    cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
    cnpj = cnpj.replace(/\.(\d{3})(\d)/, '.$1/$2');
    cnpj = cnpj.replace(/(\d{4})(\d)/, '$1-$2');
  
    return cnpj;
}

function formatCEP(cep) {
    cep = cep.replace(/\D/g, '');
    cep = cep.replace(/^(\d{5})(\d)/, '$1-$2');
  
    return cep;
}

function getById(id) {
    $.ajax({
        type: "GET",
        url: `/get/empresa?id=${id}`,
        dataType: "json",
        success: function (result) {
            $("#titleEmpresa").text(`${result[0].nome_fantasia}`);

            $("#email").text(result[0].email);
            $("#nomeFantasia").text(result[0].nome_fantasia);
            $("#razaoSocial").text(result[0].razao_social);
            $("#cnpj").text(formatCNPJ(result[0].cnpj));
            $("#cidade").text(`${result[0].nome}-${result[0].uf}`);
            $("#logradouro").text(`${result[0].logradouro}, ${result[0].numero}`);
            $("#bairro").text(result[0].bairro);
            $("#cep").text(formatCEP(result[0].cep));
            $("#ibge").text(result[0].codigo_ibge);
            $("#ddd").text(result[0].ddd);
        },
        error: function (result) {
            console.log(result)
        }
    });
}