<?php
    @session_start();

    class estadoDAO{
        public function __construct(){
            require_once('dataBase.php');
            @session_start(); 
            @require_once($_SESSION['path'].'cms/models/estadoClass.php');

        }

        public function selectAll(){
            $listEstado = null;

            $sql = "SELECT * FROM tbl_estado;";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            $count=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC)){
                $listEstado[] = new Estado;
                $listEstado[$count]->id = $rs['id'];
                $listEstado[$count]->estado = $rs['estado'];
                $listEstado[$count]->sigla = $rs['UF'];

                $count += 1;
            }
            return $listEstado;
        }

        public function selectId(){

        }
    }
?>
