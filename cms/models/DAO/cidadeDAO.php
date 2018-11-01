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

            //array Cidades -> lista
            $arrayCidade = array();
            $cont = 0;

            while($rs=$select->fetch(PDO::FETCH_ASSOC))
            {
                //Chamo a array que criei
                //[] -> preencho a array, dando a posbilidade de jogar itens dentro dela
                //A array sempre vai pegando uma cidade e jogando dentro, de um a um
                //Dando um returno de uma lista
                $arrayCidade[] = array("id" => $rs['id'],
                "id_estado" => $rs['id_estado'],
                "cidade" => $rs['cidade']);

            }
            //Echo na array com json_encode porque estou transformando minha array em json.
            echo ( json_encode ($arrayCidade));

        }

    }

    //Aqui esntou passando em if como parametro
    //o ID do meu estado para pegar todas as cidades relacionadas
    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $cidadeDAO = new cidadeDAO();

        $cidadeDAO->selectById($id);

    }

?>
