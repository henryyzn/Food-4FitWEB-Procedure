<?php

//Ações do banco
class lojasDAO {

    //minha classe construtor
    public function __construct($requestFront = false){
        require_once('database.php');

        if($requestFront==true)
            require_once('cms/models/lojasClass.php');
        else
            require_once('../models/lojasClass.php');

        error_reporting(E_ALL);
        ini_set('display_errors',1);

    }

    public function insert($classLojas){
            $sql = "insert into tbl_nossa_loja(id_endereco, latitude, longitude, funcionamento, ativo, telefone) values (
            '".$classLojas->idendereco."',
            '".$classLojas->latitude."',
            '".$classLojas->longitude."',
            '".$classLojas->funcionamento."',
            '".$classLojas->ativo."',
            '".$classLojas->telefone."'
            );";

            //echo($sql);

            //Instancia a classe
            $conex = new mysql_db();
            //Abre a Conexao
            $PDO_conex = $conex->conectar();

            //Executa a query
            if($PDO_conex->query($sql))
                //header('location:index.php');
                echo('Inseriu com sucesso');
            else
                echo('erro no insert');

            $conex->desconectar();
        }

    public function selectId($id){
        $sql="select * from tbl_nossa_loja where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

        $listLojas = new Lojas();
        $listLojas->id = $rs['id'];
        $listLojas->idendereco = $rs['id_endereco'];
        $listLojas->latitude = $rs['latitude'];
        $listLojas->longitude = $rs['longitude'];
        $listLojas->funcionamento = $rs['funcionamento'];
        $listLojas->ativo = $rs['ativo'];
        $listLojas->telefone = $rs['telefone'];


        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        if($PDO_conex->query($sql))
            echo('select no Banco');
        else
            echo('Erro');

        $conex->desconectar();

        return $listLojas;

        }


    }

    public function selectAll(){
        $listLojas = null;
        $sql="select * from tbl_nossa_loja order by id desc";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $cont=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listLojas[] = new Lojas();
            $listLojas[$cont]->id = $rs['id'];
            $listLojas[$cont]->idendereco = $rs['id_endereco'];
            $listLojas[$cont]->latitude = $rs['latitude'];
            $listLojas[$cont]->longitude = $rs['longitude'];
            $listLojas[$cont]->ativo = $rs['ativo'];
            $listLojas[$cont]->funcionamento = $rs['funcionamento'];
            $listLojas[$cont]->telefone = $rs['telefone'];
            $cont+=1;
        }
        return $listLojas;
    }

    public function delete($id){
        $sql = "delete from tbl_nossa_loja where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:lojas.php');
    }

    public function update($classLojas){

        $sql = "UPDATE tbl_nossa_loja SET
        titulo = '".$classSobreNos->titulo."',
        texto = '".$classSobreNos->texto."',
        foto = 'assets/images/sobre-nos/".$classSobreNos->foto."',
        ativo = '".$classSobreNos->ativo."'
        where id=".$classSobreNos->id;

        echo($sql);

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:sobre.php');

        $conex->desconectar();

    }

}
?>
