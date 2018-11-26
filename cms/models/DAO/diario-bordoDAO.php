<?php

//Ações do banco
class diarioBordoDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        //require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/diario-bordoClass.php');
        @require_once($_SESSION['path'].'cms/models/diario-bordoClass.php');
    }

    public function insert($classDiarioBordo){
        $sql = "insert into tbl_diario_bordo(id_usuario, titulo, texto, progresso, data) values (
        '".$classDiarioBordo->id_usuario."',
        '".$classDiarioBordo->titulo."',
        '".$classDiarioBordo->texto."',
        '".$classDiarioBordo->progresso."',
        '".$classDiarioBordo->data."');";

        //echo($sql);

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();

        //Executa a query
        if($PDO_conex->query($sql)){
            echo("<script>alert('Depoimento enviado com sucesso.')</script>");
            header('location:diario-de-bordo.php');
        }else{
            echo('<script>alert("Erro ao inserir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');
        }

        $conex->desconectar();
    }

    public function selectId($id){
        $sql="select * from tbl_diario_bordo where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

            $listDiarioBordo = new DiarioBordo();
            $listDiarioBordo->id = $rs['id'];
            $listDiarioBordo->id_usuario = $rs['id_usuario'];
            $listDiarioBordo->titulo = $rs['titulo'];
            $listDiarioBordo->texto = $rs['texto'];
            $listDiarioBordo->data = date('d/m/Y', strtotime($rs['data']));
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

    public function selectInfo($id){
        $sql = "SELECT diario.id AS id, 
        diario.id_usuario AS id_usuario, 
        diario.titulo AS titulo, 
        diario.texto AS texto, 
        diario.data AS data, 
        diario.progresso AS progresso, 
        usuario.id AS id_tbl_usuario, 
        CONCAT(usuario.nome, ' ', usuario.sobrenome) AS nome,
        usuario.email AS email,
        usuario.avatar AS avatar, 
        usuario.data_nascimento AS data_nascimento 
        FROM tbl_diario_bordo AS diario 
        INNER JOIN tbl_usuario AS usuario 
        where diario.id_usuario = usuario.id 
        AND diario.id = ".$id;
        //echo $sql;
        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

            $listDiarioBordo = new DiarioBordo();
            $listDiarioBordo->id = $rs['id'];
            $listDiarioBordo->id_usuario = $rs['id_usuario'];
            $listDiarioBordo->titulo = $rs['titulo'];
            $listDiarioBordo->texto = $rs['texto'];
            $listDiarioBordo->data = $rs['data'];
            $listDiarioBordo->progresso = $rs['progresso'];
            $listDiarioBordo->nome = $rs['nome'];
            $listDiarioBordo->email = $rs['email'];
            $listDiarioBordo->data_nascimento = date('d/m/Y', strtotime($rs['data_nascimento']));
            $listDiarioBordo->avatar = $rs['avatar'];
            $listDiarioBordo->id_tbl_usuario = $rs['id_tbl_usuario'];

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

    public function selectDouble(){
        $listDiarioBordo = null;

        $sql='SELECT diario.id AS id, diario.id_usuario as id_usuario, diario.titulo as titulo, diario.texto as texto, diario.progresso as progresso, diario.data as data, CONCAT(usuario.nome, " ", usuario.sobrenome) AS nome, usuario.email as email, usuario.avatar as avatar FROM tbl_usuario AS usuario INNER JOIN tbl_diario_bordo AS diario WHERE diario.id_usuario = usuario.id ORDER BY diario.id DESC';

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
            $listDiarioBordo[$cont]->data = date('d/m/Y', strtotime($rs['data']));
            $listDiarioBordo[$cont]->nome = $rs['nome'];
            $listDiarioBordo[$cont]->email = $rs['email'];
            $listDiarioBordo[$cont]->avatar = $rs['avatar'];
            $cont+=1;
        }
        return $listDiarioBordo;
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
            $listDiarioBordo[$cont]->data = date('d/m/Y', strtotime($rs['data']));
            $cont+=1;
        }
        return $listDiarioBordo;
    }

    public function selectProgress($progresso){
        $listDiarioBordo = null;

        $sql="SELECT id, COUNT(progresso) AS progresso FROM tbl_diario_bordo WHERE progresso = '".$progresso."';";

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
            $listDiarioBordo[$cont]->progresso = $rs['progresso'];
            $cont+=1;
        }
        return $listDiarioBordo;
    }

    public function delete($id){
        $sql = "DELETE FROM tbl_diario_bordo WHERE id = ".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:diario-bordo.php');
        else
            echo('<script>alert("Erro ao excluir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');
    }

    public function contador(){
        $rows = null;

        $sql="SELECT COUNT(*) AS total FROM tbl_diario_bordo;";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $count=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $rows[] = new DiarioBordo();
            $rows[$count]->total = $rs['total'];
            $count+=1;
        }
        return $rows;
    }
}
?>
