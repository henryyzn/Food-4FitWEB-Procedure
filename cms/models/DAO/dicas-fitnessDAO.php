<?php

//Ações do banco
class dicasFitnessDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/dicas-fitnessClass.php');
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
                header('location:dicas-fitness.php');
            else
                echo('<script>alert("Erro ao inserir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

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
        $listDicasFitness->data = date('d/m/Y', strtotime($rs['data']));
        $listDicasFitness->ativo = $rs['ativo'];

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        if($PDO_conex->query($sql))
            echo('');
        else
            echo('<script>alert("Erro ao buscar informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

        $conex->desconectar();

        return $listDicasFitness;

        }

    }

    public function selectDoubleId($id){

        $sql="SELECT df.id as id, df.id_funcionario as id_funcionario, df.titulo as titulo, df.texto as texto, df.ativo as ativo, df.data as data, CONCAT(f.nome, ' ', f.sobrenome) AS nome, f.email as email, f.id as id_usuario FROM tbl_dica_fitness as df INNER JOIN tbl_funcionario AS f WHERE df.id =".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

        $listDicasFitness = new DicasFitness();
        $listDicasFitness->id = $rs['id'];
        $listDicasFitness->id_funcionario = $rs['id_funcionario'];
        $listDicasFitness->titulo = $rs['titulo'];
        $listDicasFitness->texto = $rs['texto'];
        $listDicasFitness->data = date('d/m/Y', strtotime($rs['data']));
        $listDicasFitness->ativo = $rs['ativo'];
        $listDicasFitness->nome = $rs['nome'];
        $listDicasFitness->email = $rs['email'];
        $listDicasFitness->id_usuario = $rs['id_usuario'];

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        if($PDO_conex->query($sql))
            echo('');
        else
            echo('<script>alert("Erro ao buscar informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

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
            $listDicasFitness[$cont]->data = date('d/m/Y', strtotime($rs['data']));
            $listDicasFitness[$cont]->ativo = $rs['ativo'];
            $cont+=1;
        }
        return $listDicasFitness;
    }

    public function selectAllActive(){
        $listDicasFitness = null;

        $sql="SELECT d.id AS id, d.id_funcionario AS id_funcionario, d.titulo AS titulo, d.texto AS texto, d.data AS data, d.ativo AS ativo, CONCAT(f.nome, ' ', f.sobrenome) AS autor FROM tbl_dica_fitness AS d INNER JOIN tbl_funcionario AS f WHERE d.ativo = 1 AND d.id_funcionario = f.id ORDER BY d.id DESC;";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $count=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listDicasFitness[] = new DicasFitness();
            $listDicasFitness[$count]->id = $rs['id'];
            $listDicasFitness[$count]->id_funcionario = $rs['id_funcionario'];
            $listDicasFitness[$count]->titulo = $rs['titulo'];
            $listDicasFitness[$count]->texto = $rs['texto'];
            $listDicasFitness[$count]->data = date('d/m/Y', strtotime($rs['data']));
            $listDicasFitness[$count]->ativo = $rs['ativo'];
            $listDicasFitness[$count]->autor = $rs['autor'];
            $count+=1;
        }
        return $listDicasFitness;
    }

    public function selectAllActiveRand(){
        $listDicasFitness = null;

        $sql="SELECT d.id AS id, d.id_funcionario AS id_funcionario, d.titulo AS titulo, d.texto AS texto, d.data AS data, d.ativo AS ativo, CONCAT(f.nome, ' ', f.sobrenome) AS autor FROM tbl_dica_fitness AS d INNER JOIN tbl_funcionario AS f WHERE d.ativo = 1 AND d.id_funcionario = f.id ORDER BY RAND();";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $count=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listDicasFitness[] = new DicasFitness();
            $listDicasFitness[$count]->id = $rs['id'];
            $listDicasFitness[$count]->id_funcionario = $rs['id_funcionario'];
            $listDicasFitness[$count]->titulo = $rs['titulo'];
            $listDicasFitness[$count]->texto = $rs['texto'];
            $listDicasFitness[$count]->data = date('d/m/Y', strtotime($rs['data']));
            $listDicasFitness[$count]->ativo = $rs['ativo'];
            $listDicasFitness[$count]->autor = $rs['autor'];
            $count+=1;
        }
        return $listDicasFitness;
    }

    public function delete($id){
        $sql = "delete from tbl_dica_fitness where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:dicas-fitness.php');
        else
            echo('<script>alert("Erro ao excluir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');
    }

    public function update($classDicasFitness){

        $sql = "UPDATE tbl_dica_fitness SET
        id_funcionario = '".$classDicasFitness->id_funcionario."',
        titulo = '".$classDicasFitness->titulo."',
        texto = '".$classDicasFitness->texto."',
        data = '".$classDicasFitness->data."',
        ativo = '".$classDicasFitness->ativo."'
        where id=".$classDicasFitness->id;

        //echo($sql);

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:dicas-fitness.php');
        else
            echo('<script>alert("Erro ao atualizar informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

        $conex->desconectar();

    }

}
?>
