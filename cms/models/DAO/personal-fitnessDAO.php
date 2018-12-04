<?php

//Ações do banco
class personalFitnessDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        //require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/personal-fitnessClass.php');
        @require_once($_SESSION['path'].'cms/models/personal-fitnessClass.php');
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
                header('location:personal-fitness.php');
            else
                echo "<script>alert('Erro ao inserir informações no sistema. Tente novamente ou contate o técnico.'); window.location = 'add-pub-personal-fitness.php';</script>";
            
            $conex->desconectar();
        }

    public function selectId($id){
        $sql="SELECT p.id AS id,
        p.id_funcionario AS id_funcionario,
        CONCAT(f.nome, ' ', f.sobrenome) AS autor,
        p.titulo AS titulo,
        p.texto AS texto, 
        p.data AS data,
        p.ativo AS ativo FROM tbl_personal_fitness AS p INNER JOIN tbl_funcionario AS f WHERE p.id_funcionario = f.id AND p.id = ".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

        $listPersonalFitness = new PersonalFitness();
        $listPersonalFitness->id = $rs['id'];
        $listPersonalFitness->id_funcionario = $rs['id_funcionario'];
        $listPersonalFitness->titulo = $rs['titulo'];
        $listPersonalFitness->texto = $rs['texto'];
        $listPersonalFitness->data = date('d/m/Y', strtotime($rs['data']));
        $listPersonalFitness->ativo = $rs['ativo'];
        $listPersonalFitness->autor = $rs['autor'];

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        if($PDO_conex->query($sql))
            echo('');
        else
            echo('<script>alert("Erro ao buscar informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

        $conex->desconectar();

        return $listPersonalFitness;

        }
    }

    public function selectAll(){
        $listPersonalFitness = null;
        $sql="SELECT pf.id AS id, pf.id_funcionario AS id_funcionario, pf.titulo AS titulo, pf.texto AS texto, pf.data AS data, pf.ativo AS ativo, CONCAT(f.nome, ' ', f.sobrenome) AS autor FROM tbl_personal_fitness AS pf INNER JOIN tbl_funcionario AS f WHERE pf.id_funcionario = f.id order by pf.id desc;";

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
            $listPersonalFitness[$cont]->data = date('d/m/Y', strtotime($rs['data']));
            $listPersonalFitness[$cont]->ativo = $rs['ativo'];
            $listPersonalFitness[$cont]->autor = $rs['autor'];
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

        //echo($sql);

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:personal-fitness.php');

        $conex->desconectar();

    }

}
?>
