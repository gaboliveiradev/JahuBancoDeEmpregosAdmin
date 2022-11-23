<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "./View/Includes/Bootstrap/css_config.php" ?>
    <title>Lista de Vaga de Empregos - Painel Admin</title>
</head>
<body>
    <header>
        <?php include "./View/Includes/header.php" ?>
    </header>
    <h1>Lista de Vaga de Empregos</h1>
    <section class="container">
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php foreach ($item as $model->rows) : ?>
                    <td></td>
                <?php endforeach ?>
            </tr>
        </tbody>
    </table>
    </section>

    <?php include "./View/Includes/Bootstrap/js_config.php" ?>
</body>
</html>