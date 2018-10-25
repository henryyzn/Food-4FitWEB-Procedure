<?php
    class estadoDAO{
        public function __construct(){

        }

        public function selectAll(){
            $sql = "select * from tbl_estado"
            $PDO->execute($sql);

        }

        public function selectId(){

        }
    }
?>
