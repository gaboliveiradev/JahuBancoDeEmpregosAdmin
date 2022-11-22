<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler text-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/dashboard">
            <h5>Banco de Empregos</h5>
            <!--<img src="./../../View/img/logo.png" alt="mdo" width="52" height="52" class="d-inline-block align-text-top">-->
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-brand dropdown text-end p-2 ">
                <a href="#" class=" d-block text-decoration-none dropdown-toggle fs-6" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    Listar
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    <li>
                        <a class="dropdown-item" href="/empresas/listar">Empresas</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="/pessoas/listar">Pessoas</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="/vagas/listar">Vagas</a>
                    </li>
                </ul>
            </div>
            <a href="/estatisticas" class="nav-link text-start">Estatísticas</a>
        </div>
        
        <!-- Dropdown do User -->
        <div class="navbar-brand dropdown text-end p-2 ">
            <h6 href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $_SESSION['admin_logged']->nome ?>
            </h6>
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="/">Minha Conta</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="/logout?exit=true">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>