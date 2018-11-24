<?php

//Ações do banco
class unidadeMedidaDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        //require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/unidade-medidaClass.php');
        @require_once($_SESSION['path'].'cms/models/unidade-medidaClass.php');
    }

    public function selectId($id){
        $sql = "SELECT * FROM tbl_unidade_medida WHERE id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

            $listUnidMedida = new UnidadeMedida();
            $listUnidMedida->id = $rs['id'];
            $listUnidMedida->unid_medida = $rs['unid_medida'];
            $listUnidMedida->sigla = $rs['sigla'];

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                echo('');
            else
                echo('<script>alert("Erro ao buscar informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

            $conex->desconectar();

            return $listUnidMedida;

        }


    }

    public function selectAll(){
        $listPersonalFitness = null;
        $sql="SELECT * FROM tbl_unidade_medida ORDER BY id DESC";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $cont=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listUnidMedida[] = new UnidadeMedida();
            $listUnidMedida[$cont]->id = $rs['id'];
            $listUnidMedida[$cont]->unid_medida = $rs['unid_medida'];
            $listUnidMedida[$cont]->sigla = $rs['sigla'];
            $cont+=1;
        }
        return $listUnidMedida;
    }

}
?>
