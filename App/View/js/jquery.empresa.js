$("#nome_empresa").click(() => {
    var idPj = $("a#nome_empresa").attr("idPj");

    getById(idPj);
});

function formatCNPJ(cnpj) {
    cnpj = cnpj.replace(/\D/g, ''); // Eliminar caracteres no numéricos
  
    // Aplicar la máscara
    cnpj = cnpj.replace(/^(\d{2})(\d)/, '$1.$2');
    cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
    cnpj = cnpj.replace(/\.(\d{3})(\d)/, '.$1/$2');
    cnpj = cnpj.replace(/(\d{4})(\d)/, '$1-$2');
  
    return cnpj;
}

function getById(id) {
    $.ajax({
        type: "GET",
        url: `/get/empresa?id=${id}`,
        dataType: "json",
        success: function (result) {
            $("#exampleModalLabel").text(`Dados Completo | ${result[0].nome_fantasia}`);

            $("b#titleEmail").text(`Email:`);
            $("span#email").text(result[0].email);

            $("b#titleCNPJ").text(`CNPJ:`);
            $("span#cnpj").text(formatCNPJ(result[0].cnpj));

            $("b#titleNomeFantasia").text(`Nome Fantasia:`);
            $("span#nomeFantasia").text(result[0].nome_fantasia);

            $("b#titleRazaoSocial").text(`Razão Social:`);
            $("span#razaoSocial").text(result[0].razao_social);
        },
        error: function (result) {
            console.log(result)
        }
    });
}