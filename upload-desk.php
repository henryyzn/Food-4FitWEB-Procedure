<?php
    $imagem = base64_decode(file_get_contents("php://input"));
    $arquivo = md5(uniqid() . time()) . ".png";
    file_put_contents("assets/archives/" . $arquivo, $imagem);
    echo 'assets/archives/'.$arquivo;
?>
