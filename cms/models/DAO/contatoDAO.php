<?php
    class contatoDAO{
        public function __construct(){
            require_once('database.php');
            require_once('cms/models/contatoClass.php');

            error_reporting(E_ALL);
            ini_set('display_errors',1);

        }

        public function insert($classContato){
            $sql = "insert into tbl_fale_conosco(
                nome,
                sobrenome,
                email,
                telefone,
                celular,
                assunto,
                observacao) values (
                '".$classContato->nome."',
                '".$classContato->sobrenome."',
                '".$classContato->email."',
                '".$classContato->telefone."',
                '".$classContato->celular."',
                '".$classContato->assunto."',
                '".$classContato->observacao."'
            );";

            $conex = new mysql_db();
            echo($sql);
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))

                echo('aaaa');
            else
                echo('Erro');

            $conex->desconectar();

        }
    }
?>
