<?php
    //Neste arquivo, estou criando uma solução para tratar páginas e caminhos
    //Crio uma variavel e essa variavel passo nela um 'document_root' e passarei
    //todo o caminho desde a raíz do meu projeto
    //Fazendo uma variavel de sessão, passando como parametro 'path', que significa minha pasta
    //Onde jogo minha variavel $URL
    $caminho = $_SERVER['DOCUMENT_ROOT']."/";


    @session_start();
    $_SESSION['path'] = $caminho;
?>
