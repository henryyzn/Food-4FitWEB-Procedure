<?php

//Ações do banco
class personalFitnessDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        require_once('../models/personal-fitnessClass.php');
    }

    public function insert($classPersonalFitness){
            $sql = "insert into tbl_personal_fitness(id_funcionario, titulo, texto, data, ativo) values (
            '".$classPersonalFitness->id_funcionario."',
            '".$classPersonalFitness->titulo."',
            '".$classPersonalFitness->texto."',
            '".$classPersonalFitness->data."',
            '".$classPersonalFitness->ativo."');";

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
        $sql="select * from tbl_personal_fitness where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

        $listPersonalFitness = new PersonalFitness();
        $listPersonalFitness->id = $rs['id'];
        $listPersonalFitness->id_funcionario = $rs['id_funcionario'];
        $listPersonalFitness->titulo = $rs['titulo'];
        $listPersonalFitness->texto = $rs['texto'];
        $listPersonalFitness->data = $rs['data'];
        $listPersonalFitness->ativo = $rs['ativo'];

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        if($PDO_conex->query($sql))
            echo('select no Banco');
        else
            echo('Erro');

        $conex->desconectar();

        return $listPersonalFitness;

        }


    }

    public function selectAll(){
        $listPersonalFitness = null;
        $sql="select * from tbl_personal_fitness order by id desc";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $cont=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listPersonalFitness[] = new PersonalFitness();
            $listPersonalFitness[$cont]->id = $rs['id'];
            $listPersonalFitness[$cont]->id_funcionario = $rs['id_funcionario'];
            $listPersonalFitness[$cont]->titulo = $rs['titulo'];
            $listPersonalFitness[$cont]->texto = $rs['texto'];
            $listPersonalFitness[$cont]->data = $rs['data'];
            $listPersonalFitness[$cont]->ativo = $rs['ativo'];
            $cont+=1;
        }
        return $listPersonalFitness;
    }

    public function delete($id){
        $sql = "delete from tbl_personal_fitness where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:personal-fitness.php');
    }

    public function update($classPersonalFitness){

        $sql = "UPDATE tbl_personal_fitness SET
        id_funcionario = '".$classPersonalFitness->id_funcionario."',
        titulo = '".$classPersonalFitness->titulo."',
        texto = '".$classPersonalFitness->texto."',
        data = '".$classPersonalFitness->data."',
        ativo = '".$classPersonalFitness->ativo."'
        where id=".$classPersonalFitness->id;

        echo($sql);

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:personal-fitness.php');

        $conex->desconectar();

    }

}
?>
