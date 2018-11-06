<?php

//Ações do banco
class dicasFitnessDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        require_once('../models/dicas-fitnessClass.php');
    }

    public function insert($classDicasFitness){
            $sql = "insert into tbl_dica_fitness(id_funcionario, titulo, texto, data, ativo) values (
            '".$classDicasFitness->id_funcionario."',
            '".$classDicasFitness->titulo."',
            '".$classDicasFitness->texto."',
            '".$classDicasFitness->data."',
            '".$classDicasFitness->ativo."');";

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
        $sql="select * from tbl_dica_fitness where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

        $listDicasFitness = new DicasFitness();
        $listDicasFitness->id = $rs['id'];
        $listDicasFitness->id_funcionario = $rs['id_funcionario'];
        $listDicasFitness->titulo = $rs['titulo'];
        $listDicasFitness->texto = $rs['texto'];
        $listDicasFitness->data = $rs['data'];
        $listDicasFitness->ativo = $rs['ativo'];

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        if($PDO_conex->query($sql))
            echo('select no Banco');
        else
            echo('Erro');

        $conex->desconectar();

        return $listDicasFitness;

        }


    }

    public function selectAll(){
        $listDicasFitness = null;
        $sql="select * from tbl_dica_fitness order by id desc";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $cont=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listDicasFitness[] = new DicasFitness();
            $listDicasFitness[$cont]->id = $rs['id'];
            $listDicasFitness[$cont]->id_funcionario = $rs['id_funcionario'];
            $listDicasFitness[$cont]->titulo = $rs['titulo'];
            $listDicasFitness[$cont]->texto = $rs['texto'];
            $listDicasFitness[$cont]->data = $rs['data'];
            $listDicasFitness[$cont]->ativo = $rs['ativo'];
            $cont+=1;
        }
        return $listDicasFitness;
    }

    public function delete($id){
        $sql = "delete from tbl_dica_fitness where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:dicas-fitness.php');
    }

    public function update($classDicasFitness){

        $sql = "UPDATE tbl_dica_fitness SET
        id_funcionario = '".$classDicasFitness->id_funcionario."',
        titulo = '".$classDicasFitness->titulo."',
        texto = '".$classDicasFitness->texto."',
        data = '".$classDicasFitness->data."',
        ativo = '".$classDicasFitness->ativo."'
        where id=".$classDicasFitness->id;

        echo($sql);

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:dicas-fitness.php');

        $conex->desconectar();

    }

}
?>
