<?php
    class estadoDAO{
        public function __construct($requestFront = false){
            require_once('database.php');

            if($requestFront==true)
                require_once('cms/models/lojasClass.php');
            else
                require_once('../models/lojasClass.php');

            error_reporting(E_ALL);
            ini_set('display_errors',1);

        }

        public function selectAll(){
            $listEstado = null;

            $sql = "select * from tbl_estado";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            $cont=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC))
            {
                $listEstado[] = new Estado();
                $listEstado[$cont]->id = $rs['id'];
                $listEstado[$cont]->estado = $rs['estado'];
                $listEstado[$cont]->sigla = $rs['UF'];

                $cont+=1;
            }
            return $listEstado;
        }

        public function selectId(){

        }
    }
?>
