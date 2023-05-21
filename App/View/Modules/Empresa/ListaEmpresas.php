<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include  VIEWS . "/../Includes/Bootstrap/css_config.php" ?>
    <title>Listas de Empresas - Painel Admin</title>
</head>

<body>
    <header>
        <?php include  VIEWS . "/../Includes/header.php" ?>
    </header>
    <main class="container "><br>
        <section class="btn-group">
            <div class="input-group mb-3">
                <form action="/empresas/busca" method="get" class="form d-flex ">
                    <input type="text" name="query" class="form-control " placeholder="Pesquisar Empresa " aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <button class="btn btn-outline-secondary" type="submit">OK</button>                    
                </form>

            </div>
        </section>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Razão Social</th>
                    <th>Nome Fantasia</th>
                    <th>CNPJ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($model as $item) : ?>
                <tr>                    
                    <td><?= $item->id_pessoa_juridica ?></td>
                    <td><a idPj="<?= $item->id_pessoa_juridica ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" id="nome_empresa"><?= $item->razao_social ?></a></td>
                    <td><?= $item->nome_fantasia ?></td>
                    <td><?= $item->CNPJ ?></td>                    
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
            <h1 class="modal-title fs-5" id="exampleModalLabel">Dados Completo | </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>
                <b id="titleEmail"></b>
                <span id="email"></span>
            </p>
            <p>
                <b id="titleCNPJ"></b>
                <span id="cnpj"></span>
            </p>
            <p>
                <b id="titleNomeFantasia"></b>
                <span id="nomeFantasia"></span>
            </p>
            <p>
                <b id="titleRazaoSocial"></b>
                <span id="razaoSocial"></span>
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>

    <?php include  VIEWS . "/../Includes/Bootstrap/js_config.php" ?>
    <script src="./../../../View/js/jquery.empresa.js"></script>
</body>

</html>