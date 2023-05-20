$("#nome_empresa").click(() => {
    var idPj = $("a#nome_empresa").attr("idPj");

    getById(idPj);
});

function getById(id) {
    $.ajax({
        type: "GET",
        url: `/get/empresa?id=${id}`,
        dataType: "json",
        success: function (result) {
            $("p#email").val(`Email: `);
        },
        error: function (result) {
            console.log(result)
        }
    });
}