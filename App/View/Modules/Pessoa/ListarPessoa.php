<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include  VIEWS . "/../Includes/Bootstrap/css_config.php" ?>
    <title>Listas de Pessoas - Painel Admin</title>

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
                <form action="/pessoas/busca" method="get" class="form d-flex ">
                    <input type="text" name="query" class="form-control " placeholder="Pesquisar Pessoa" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <button class="btn btn-outline-secondary" type="submit">OK</button>
                </form>

            </div>
        </section>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Instituicao</th>
                    <th>Curso</th>
                    <th>Conteudo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model as $item) : ?>
                    <tr>
                        <td><?= $item->id ?></td>
                        <td><a class="click nome_pf" id="<?= $item->id ?>" data-bs-toggle="modal" data-bs-target="#exampleModal"><?= $item->nome ?></a></td>
                        <td><?= $item->instituicao ?></td>
                        <td><?= $item->curso ?></td>
                        <td><?= $item->conteudo_curso ?></td>
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
            <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-check-circle-fill"></i> Curriculo | <span id="titleNomePf"></span></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div>
                <h6>Dados Pessoais <i class="bi bi-person-fill"></i></h6>
                <hr>
                <span><b>Nome: </b></span>
                <span id="nomePf"></span> <br>
                <span><b>CPF: </b></span>
                <span id="cpf"></span> <br>
                <span><b>Email: </b></span>
                <span id="email"></span> <br>
                <span><b>Data de Nascimento: </b></span>
                <span id="dataNascimento"></span> <br>
                <span><b>Gênero: </b></span>
                <span id="genero"></span> <br>
            </div>
            <div id="div_containter_formacao_academica">
                
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
    <script src="./../../../View/js/jquery.curriculo.js"></script>
</body>

</html>