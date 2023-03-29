<?php
    spl_autoload_register(function ($class) {
        
        $nome_da_classe = str_replace('\\', '/', $class);

    /**
     * Defidindo o caminho absoluto até o arquivo que será incluído pelo PHP.
     * A constante BASEDIR está definida no arquivo config.php. Também é
     * importante observar que na variável $nome_da_classe temos, além do nome
     * da classe buscada, o namespace que também deve ser o caminho de diretórios
     * até o arquivo que contém a classe.
     */
    $arq = BASEDIR . '/' . $nome_da_classe . '.php';

        if(file_exists($arq)) {
            include $arq;
        } else 
            exit('Arquivo não encontrado. Arquivo: ' . $arq . "<br />");
    });
