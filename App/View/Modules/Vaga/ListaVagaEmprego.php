<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include  VIEWS . "/../Includes/Bootstrap/css_config.php" ?>
    <title>Listas de Vagas - Painel Admin</title>
    <style>
        .hr_branco {
            background-color: #fff;
        }

        .click {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <?php include  VIEWS . "/../Includes/header.php" ?>
    </header>
    <main class="container "><br>
        <section class="btn-group">
            <div class="input-group mb-3">
                <form action="/vagas/busca" method="get" class="form d-flex ">
                    <input type="text" name="query" class="form-control " placeholder="Pesquisar Vaga" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <button class="btn btn-outline-secondary" type="submit">OK</button>
                </form>
            </div>
        </section>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Empresa</th>
                    <th>Descricao</th>
                    <th>Salario</th>
                    <th>Setor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model as $item) : ?>
                    <tr>
                        <td><?= $item->id_vaga ?></td>
                        <td><a class="click desc_vaga" data-bs-toggle="modal" data-bs-target="#exampleModal" id="<?= $item->id_vaga ?>"><?= $item->titulo ?></a></td>
                        <td><?= $item->nome_fantasia ?></td>
                        <td><?= $item->descricao ?></td>
                        <td>R$ <?= number_format($item->salario, 2, ",", ".")  ?></td>
                        <td><?= $item->setor ?></td>,
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </main>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-check-circle-fill"></i> Dados Completo Vaga | <span id="titleVaga"></span></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div>
                <h6>Dados da Vaga <i class="bi bi-person-fill"></i></h6>
                <hr>
                <span><b>Vaga: </b></span>
                <span id="vaga"></span> <br>
                <span><b>Descrição: </b></span>
                <span id="desc"></span> <br>
                <span><b>Sálario: </b></span>
                <span id="salario"></span> <br>
                <span><b>Setor: </b></span>
                <span id="setor"></span> <br>
                <span><b>Quantidade de Vagas: </b></span>
                <span id="qntVagas"></span> <br>
                <span><b>Limite de Candidatos: </b></span>
                <span id="lmtCandidatos"></span> <br>
                <span><b>Situação: </b></span>
                <span id="situacao"></span> <br>
                <span><b>Vaga Deficiente: </b></span>
                <span id="deficiente"></span> <br>
                <span><b>Data Abertura: </b></span>
                <span id="data_abertura"></span> <br>
                <span><b>Data Fechamento: </b></span>
                <span id="data_fechamento"></span> <br>
            </div>
            <hr class="hr_branco">
            <div>
                <h6>Dados da Empresa <i class="bi bi-building-fill-check"></i></h6>
                <hr>
                <span><b>Nome Fantasia: </b></span>
                <span id="nomeFantasia"></span> <br>
                <span><b>Razão Social: </b></span>
                <span id="razaoSocial"></span> <br>
                <span><b>CNPJ: </b></span>
                <span id="cnpj"></span> <br>
                <span><b>Contato: </b></span>
                <span id="contato"></span>
            </div>
            <hr class="hr_branco">
            <div>
                <h6>Localidade <i class="bi bi-geo-alt-fill"></i></h6>
                <hr>
                <span><b>Cidade: </b></span>
                <span id="cidade"></span> <br>
                <span><b>Logradouro: </b></span>
                <span id="logradouro"></span> <br>
                <span><b>Bairro: </b></span>
                <span id="bairro"></span> <br>
                <span><b>CEP: </b></span>
                <span id="cep"></span> <br>
                <span><b>Código IBGE: </b></span>
                <span id="ibge"></span> <br>
                <span><b>DDD: </b></span>
                <span id="ddd"></span> <br>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>


    <?php include  VIEWS . "/../Includes/Bootstrap/js_config.php" ?>
    <script src="/App/View/js/jquery.vaga.js"></script>
</body>

</html>