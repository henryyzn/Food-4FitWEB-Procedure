<?php
    class perguntaDAO{
        public function __construct(){
            require_once('dataBase.php');
            @require_once($_SESSION['path'].'cms/models/pergunta-secretaClass.php');
        }

        public function selectAll(){
            $listPergunta = null;

            $sql = "select * from tbl_pergunta_secreta order by id desc";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            $cont=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC))
            {
                $listPergunta[] = new Pergunta();
                $listPergunta[$cont]->id = $rs['id'];
                $listPergunta[$cont]->pergunta = $rs['pergunta'];

                $cont+=1;
            }

            return $listPergunta;
        }

    }
?>
