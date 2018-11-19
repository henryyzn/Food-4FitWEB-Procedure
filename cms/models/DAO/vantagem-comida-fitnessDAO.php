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
        $sql="SELECT v.id AS id, v.id_funcionario AS id_funcionario, v.titulo AS titulo, v.texto AS texto, v.data AS data, v.ativo AS ativo, CONCAT(f.nome, ' ', f.sobrenome) AS autor FROM tbl_vantagem_comida_fitness AS v INNER JOIN tbl_funcionario AS f WHERE v.id_funcionario = f.id AND v.id = '$id' ORDER BY v.id DESC;";
        //echo $sql;
        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

            $listVantagemComidaFitness = new VantagemComidaFitness();
            $listVantagemComidaFitness->id = $rs['id'];
            $listVantagemComidaFitness->id_funcionario = $rs['id_funcionario'];
            $listVantagemComidaFitness->titulo = $rs['titulo'];
            $listVantagemComidaFitness->texto = $rs['texto'];
            $listVantagemComidaFitness->data = date('d/m/Y', strtotime($rs['data']));
            $listVantagemComidaFitness->ativo = $rs['ativo'];
            $listVantagemComidaFitness->autor = $rs['autor'];

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

        $count=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listVantagemComidaFitness[] = new VantagemComidaFitness();
            $listVantagemComidaFitness[$count]->id = $rs['id'];
            $listVantagemComidaFitness[$count]->id_funcionario = $rs['id_funcionario'];
            $listVantagemComidaFitness[$count]->titulo = $rs['titulo'];
            $listVantagemComidaFitness[$count]->texto = $rs['texto'];
            $listVantagemComidaFitness[$count]->data = date('d/m/Y', strtotime($rs['data']));
            $listVantagemComidaFitness[$count]->ativo = $rs['ativo'];
            $count+=1;
        }
        return $listVantagemComidaFitness;
    }

    public function selectAllActive(){
        $listVantagemComidaFitness = null;

        $sql="SELECT v.id AS id, v.id_funcionario AS id_funcionario, v.titulo AS titulo, v.texto AS texto, v.data AS data, v.ativo AS ativo, CONCAT(f.nome, ' ', f.sobrenome) AS autor FROM tbl_vantagem_comida_fitness AS v INNER JOIN tbl_funcionario AS f WHERE v.id_funcionario = f.id AND v.ativo = 1 ORDER BY v.id DESC;";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $count=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listVantagemComidaFitness[] = new VantagemComidaFitness();
            $listVantagemComidaFitness[$count]->id = $rs['id'];
            $listVantagemComidaFitness[$count]->id_funcionario = $rs['id_funcionario'];
            $listVantagemComidaFitness[$count]->titulo = $rs['titulo'];
            $listVantagemComidaFitness[$count]->texto = $rs['texto'];
            $listVantagemComidaFitness[$count]->data = date('d/m/Y', strtotime($rs['data']));
            $listVantagemComidaFitness[$count]->ativo = $rs['ativo'];
            $listVantagemComidaFitness[$count]->autor = $rs['autor'];
            $count+=1;
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
