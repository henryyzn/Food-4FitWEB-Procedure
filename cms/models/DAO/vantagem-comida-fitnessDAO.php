<?php

//Ações do banco
class vantagemComidaFitnessDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/vantagem-comida-fitnessClass.php');
    }

    public function insert($classVantagemComidaFitness){
            $sql = "insert into tbl_vantagem_comida_fitness(id_funcionario, titulo, texto, data, ativo) values (
            '".$classVantagemComidaFitness->id_funcionario."',
            '".$classVantagemComidaFitness->titulo."',
            '".$classVantagemComidaFitness->texto."',
            '".$classVantagemComidaFitness->data."',
            '".$classVantagemComidaFitness->ativo."');";

            //echo($sql);

            //Instancia a classe
            $conex = new mysql_db();
            //Abre a Conexao
            $PDO_conex = $conex->conectar();

            //Executa a query
            if($PDO_conex->query($sql))
                header('location:vantagem-comida-fitness.php');
            else
                echo('<script>alert("Erro ao inserir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

            $conex->desconectar();
        }

    public function selectId($id){
        $sql="select * from tbl_vantagem_comida_fitness where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

        $listVantagemComidaFitness = new VantagemComidaFitness();
        $listVantagemComidaFitness->id = $rs['id'];
        $listVantagemComidaFitness->id_funcionario = $rs['id_funcionario'];
        $listVantagemComidaFitness->titulo = $rs['titulo'];
        $listVantagemComidaFitness->texto = $rs['texto'];
        $listVantagemComidaFitness->data = $rs['data'];
        $listVantagemComidaFitness->ativo = $rs['ativo'];

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        if($PDO_conex->query($sql))
            echo('');
        else
            echo('<script>alert("Erro ao buscar informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

        $conex->desconectar();

        return $listVantagemComidaFitness;

        }


    }

    public function selectAll(){
        $listVantagemComidaFitness = null;
        $sql="select * from tbl_vantagem_comida_fitness order by id desc";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $cont=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listVantagemComidaFitness[] = new VantagemComidaFitness();
            $listVantagemComidaFitness[$cont]->id = $rs['id'];
            $listVantagemComidaFitness[$cont]->id_funcionario = $rs['id_funcionario'];
            $listVantagemComidaFitness[$cont]->titulo = $rs['titulo'];
            $listVantagemComidaFitness[$cont]->texto = $rs['texto'];
            $listVantagemComidaFitness[$cont]->data = $rs['data'];
            $listVantagemComidaFitness[$cont]->ativo = $rs['ativo'];
            $cont+=1;
        }
        return $listVantagemComidaFitness;
    }

    public function delete($id){
        $sql = "delete from tbl_vantagem_comida_fitness where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:vantagem-comida-fitness.php');
    }

    public function update($classVantagemComidaFitness){

        $sql = "UPDATE tbl_vantagem_comida_fitness SET
        id_funcionario = '".$classVantagemComidaFitness->id_funcionario."',
        titulo = '".$classVantagemComidaFitness->titulo."',
        texto = '".$classVantagemComidaFitness->texto."',
        data = '".$classVantagemComidaFitness->data."',
        ativo = '".$classVantagemComidaFitness->ativo."'
        where id=".$classVantagemComidaFitness->id;

        echo($sql);

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:vantagem-comida-fitness.php');

        $conex->desconectar();

    }

}
?>
