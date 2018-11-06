<?php

//Ações do banco
class porQueComidaFitnessDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/por-que-comida-fitnessClass.php');
    }

    public function insert($classPqComidaFitness){
            $sql = "insert into tbl_why_comida_fitness(id_funcionario, titulo, texto, data, ativo) values (
            '".$classPqComidaFitness->id_funcionario."',
            '".$classPqComidaFitness->titulo."',
            '".$classPqComidaFitness->texto."',
            '".$classPqComidaFitness->data."',
            '".$classPqComidaFitness->ativo."');";

            //echo($sql);

            //Instancia a classe
            $conex = new mysql_db();
            //Abre a Conexao
            $PDO_conex = $conex->conectar();

            //Executa a query
            if($PDO_conex->query($sql))
                header('location:por-que-comida-fitness.php');
            else
                echo('<script>alert("Erro ao inserir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

            $conex->desconectar();
        }

    public function selectId($id){
        $sql="select * from tbl_why_comida_fitness where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

        $listPqComidaFitness = new PorQueComidaFitness();
        $listPqComidaFitness->id = $rs['id'];
        $listPqComidaFitness->id_funcionario = $rs['id_funcionario'];
        $listPqComidaFitness->titulo = $rs['titulo'];
        $listPqComidaFitness->texto = $rs['texto'];
        $listPqComidaFitness->data = $rs['data'];
        $listPqComidaFitness->ativo = $rs['ativo'];

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        if($PDO_conex->query($sql))
            echo('');
        else
            echo('<script>alert("Erro ao buscar informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

        $conex->desconectar();

        return $listPqComidaFitness;

        }


    }

    public function selectAll(){
        $listPqComidaFitness = null;
        $sql="select * from tbl_why_comida_fitness order by id desc";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $cont=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listPqComidaFitness[] = new PorQueComidaFitness();
            $listPqComidaFitness[$cont]->id = $rs['id'];
            $listPqComidaFitness[$cont]->id_funcionario = $rs['id_funcionario'];
            $listPqComidaFitness[$cont]->titulo = $rs['titulo'];
            $listPqComidaFitness[$cont]->texto = $rs['texto'];
            $listPqComidaFitness[$cont]->data = $rs['data'];
            $listPqComidaFitness[$cont]->ativo = $rs['ativo'];
            $cont+=1;
        }
        return $listPqComidaFitness;
    }

    public function delete($id){
        $sql = "delete from tbl_why_comida_fitness where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:por-que-comida-fitness.php');
    }

    public function update($classPqComidaFitness){

        $sql = "UPDATE tbl_why_comida_fitness SET
        id_funcionario = '".$classPqComidaFitness->id_funcionario."',
        titulo = '".$classPqComidaFitness->titulo."',
        texto = '".$classPqComidaFitness->texto."',
        data = '".$classPqComidaFitness->data."',
        ativo = '".$classPqComidaFitness->ativo."'
        where id=".$classPqComidaFitness->id;

        echo($sql);

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:por-que-comida-fitness.php');

        $conex->desconectar();

    }

}
?>
