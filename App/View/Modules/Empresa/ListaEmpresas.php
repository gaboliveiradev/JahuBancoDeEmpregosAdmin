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
                    <td><?= $item->razao_social ?></td>
                    <td><?= $item->nome_fantasia ?></td>
                    <td><?= $item->CNPJ ?></td>                    
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </main>


    <?php include  VIEWS . "/../Includes/Bootstrap/js_config.php" ?>
</body>

</html>