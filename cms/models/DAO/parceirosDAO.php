<?php

    class parceirosDAO{
        public function __construct(){
            require_once('database.php');
            require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/parceirosClass.php');
        }

        public function insert($classParceiros){
            $sql = "insert into tbl_parceiro_fitness(
            titulo,
            descricao,
            foto,
            link,
            ativo) values (
            '".$classParceiros->titulo."',
            '".$classParceiros->descricao."',
            '".$classParceiros->foto."',
            '".$classParceiros->link."',
            '".classParceiros->ativo."'
            );";

            $conex = new mysql_db();

            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                echo('Inseriu com sucesso');
            else
                echo('error');

            $conex->desconectar();
        }
    }
?>
