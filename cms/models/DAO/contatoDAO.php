<?php
    class contatoDAO{
        public function __construct(){
            require_once('database.php');
            require_once('cms/models/enderecoClass.php');

            error_reporting(E_ALL);
            ini_set('display_errors',1);

        }

        public function insert($classContato){
            $sql = "insert into tbl_fale_conosco(
                id,
                nome,
                sobrenome,
                email,
                telefone,
                celular,
                assunto,
                observacao) values (
                '".$classContato->id."',
                '".$classContato->nome."',
                '".$classContato->sobrenome."',
                '".$classContato->email."',
                '".$classContato->telefone."',
                '".$classContato->celular."',
                '".$classContato->assunto."',
                '".$classContato->observacao."',
            );";

            //Teste para saber o que esta vindo do banco

            echo($sql);

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                echo('Inseriu no Banco');
            else
                echo('Erro');

            $conex->desconectar();

        }
    }
?>
