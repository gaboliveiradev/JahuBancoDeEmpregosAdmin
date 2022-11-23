<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "./View/Includes/Bootstrap/css_config.php" ?>
    <?php include "./View/Includes/Graficos/PessoaSexo.php" ?>
    <title>Dashboard - Logado como <?= $_SESSION['admin_logged']->nome ?></title>
</head>
<body>
    <header>
        <?php include "./View/Includes/header.php" ?>
    </header>
    <section>
        <h2 class="text-center">Gráficos relacionados ao Curriculo</h2>
        <div class="container text-center">
            <div class="row">
                <div>
                    <div class="col">
                        <div id="columnchart_material" style="width: 800px; height: 400px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include './View/Includes/Bootstrap/js_config.php' ?>
</body>
</html>