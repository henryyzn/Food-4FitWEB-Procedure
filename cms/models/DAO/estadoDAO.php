<?php
    class estadoDAO{
        public function __construct(){
            require_once('dataBase.php');
            require_once('cms/models/estadoClass.php');
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
