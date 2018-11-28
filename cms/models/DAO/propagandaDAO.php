<?php

    class propagandaDAO{
        public function __construct(){
            require_once('database.php');
            require_once($_SESSION['path'].'cms/models/propagandaClass.php');
        }

        public function insert($classPropaganda){
            $sql = "insert into tbl_marketing(
            titulo,
            texto,
            imagem,
            ativo) values (
            '".$classPropaganda->titulo."',
            '".$classPropaganda->texto."',
            '".$classPropaganda->imagem."',
            '".$classPropaganda->ativo."'
            );";

            $conex = new mysql_db();

            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                header('location:propaganda.php');
            else
                echo(''.sql);

            Sconex->desconectar();
        }

        public function selectId(){
            $sql = "select * from tbl_propaganda where id=".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            if($rs=$select->fetch(PDO::FETCH_ASSOC)){

                $listPropaganda = new Propaganda();
                $listPropaganda[$cont]->id = $rs['id'];
            }
        }
    }
?>
