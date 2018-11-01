<?php
    class cidadeDAO{
        public function __construct(){
            require_once('dataBase.php');
            require_once('C:/xampp/htdocs/arisCode/cms/models/cidadeClass.php');
        }

        public function selectById($id){

            $listCidade = null;

            $sql = "select * from tbl_cidade where id_estado=".$id;
            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            $arrayCidade = array();
            $cont = 0;

            while($rs=$select->fetch(PDO::FETCH_ASSOC))
            {
                //Cria um objeto array da classe Contato
                //$listCidade = new Endereco();
                //$listCidade->id = $rs['id'];
                //$listCidade->id_cidade = $rs['id_estado'];
                //$listCidade->cidade = $rs['cidade'];

                $arrayCidade = array("id" => $rs['id'],
                "id_estado" => $rs['id_estado'],
                "cidade" => $rs['cidade']);

                $cont++;
            }

            echo ( json_encode ($arrayCidade));

        }

    }


    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $cidadeDAO = new cidadeDAO();

        $cidadeDAO->selectById($id);

    }

?>
