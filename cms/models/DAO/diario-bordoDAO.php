<?php

//Ações do banco
class diarioBordoDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/diario-bordoClass.php');
    }

    public function insert($classDiarioBordo){
        $sql = "insert into tbl_diario_bordo(id_usuario, titulo, texto, progresso, data) values (
        '".$classDiarioBordo->id_usuario."',
        '".$classDiarioBordo->titulo."',
        '".$classDiarioBordo->texto."',
        '".$classDiarioBordo->progresso."',
        '".$classDiarioBordo->data."');";

        echo($sql);

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();

        //Executa a query
        if($PDO_conex->query($sql))
            header('location:diario-bordo.php');
        else
            echo('<script>alert("Erro ao inserir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

        $conex->desconectar();
    }

    public function selectId($id){
        $sql="select * from tbl_diario_bordo where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

        $listDiarioBordo = new DicasFitness();
        $listDiarioBordo->id = $rs['id'];
        $listDiarioBordo->id_usuario = $rs['id_usuario'];
        $listDiarioBordo->titulo = $rs['titulo'];
        $listDiarioBordo->texto = $rs['texto'];
        $listDiarioBordo->data = $rs['data'];
        $listDiarioBordo->progresso = $rs['progresso'];

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        if($PDO_conex->query($sql))
            echo('');
        else
            echo('<script>alert("Erro ao buscar informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

        $conex->desconectar();

        return $listDiarioBordo;

        }
    }

    public function selectAll(){
        $listDiarioBordo = null;
        $sql="select * from tbl_diario_bordo order by id desc";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $cont=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listDiarioBordo[] = new DiarioBordo();
            $listDiarioBordo[$cont]->id = $rs['id'];
            $listDiarioBordo[$cont]->id_usuario = $rs['id_usuario'];
            $listDiarioBordo[$cont]->titulo = $rs['titulo'];
            $listDiarioBordo[$cont]->texto = $rs['texto'];
            $listDiarioBordo[$cont]->progresso = $rs['progresso'];
            $listDiarioBordo[$cont]->data = $rs['data'];
            $cont+=1;
        }
        return $listDiarioBordo;
    }
    public function delete($id){
        $sql = "delete from tbl_diario_bordo where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:diario-bordo.php');
    }

}
?>
