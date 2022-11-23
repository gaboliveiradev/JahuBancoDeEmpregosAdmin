<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "./View/Includes/Bootstrap/css_config.php" ?>
    <title>Listas de Pessoas - Painel Admin</title>
</head>

<body>
    <header>
        <?php include "./View/Includes/header.php" ?>
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
                        <td><?= $item->nome ?></td>
                        <td><?= $item->instituicao ?></td>
                        <td><?= $item->curso ?></td>
                        <td><?= $item->conteudo_curso ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </main>


    <?php include "./View/Includes/Bootstrap/js_config.php" ?>
</body>

</html>