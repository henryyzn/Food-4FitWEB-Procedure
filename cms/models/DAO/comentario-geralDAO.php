<?php

//Ações do banco
class comentarioGeralDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        //require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/comentario-geralClass.php');
        require_once($_SESSION['path'].'cms/models/comentario-geralClass.php');
    }

    public function insert($classComentarioGeral){
        $sql = "insert into tbl_comentario_geral(id_usuario, assunto, texto, data, ativo, foto) values (
        '".$classComentarioGeral->id_usuario."',
        '".$classComentarioGeral->assunto."',
        '".$classComentarioGeral->texto."',
        '".$classComentarioGeral->data."',
        '".$classComentarioGeral->ativo."',
        'assets/images/comentario-geral/".$classComentarioGeral->foto."');";

        //echo($sql);

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();

        //Executa a query
        if($PDO_conex->query($sql))
            header('location:comentarios-gerais.php');
        else
            echo('<script>alert("Erro ao inserir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

        $conex->desconectar();
    }

    public function selectId($id){
        $sql="select * from tbl_comentario_geral where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

        $listComentarios = new ComentarioPost();
        $listComentarios->id = $rs['id'];
        $listComentarios->id_dica_fitness = $rs['id_dica_fitness'];
        $listComentarios->id_usuario = $rs['id_usuario'];
        $listComentarios->assunto = $rs['assunto'];
        $listComentarios->texto = $rs['texto'];
        $listComentarios->data = date('d/m/Y', strtotime($rs['data']));
        $listComentarios->ativo = $rs['ativo'];

        $conex->desconectar();

        return $listComentarios;

        }
    }
    public function selectAll($id){
        $listComentarios = null;

        $sql="SELECT c.id as id, c.id_dica_fitness as id_dica_fitness, c.id_usuario as id_usuario_comentario, c.assunto as assunto, c.texto as texto, c.data as data, CONCAT(u.nome, ' ', u.sobrenome) as nome, u.email as email, u.id as id_usuario FROM tbl_comentario_post AS c INNER JOIN tbl_usuario AS u WHERE c.id_dica_fitness = '".$id."' ORDER BY c.id DESC";
        //echo($sql);
        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $cont=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listComentarios[] = new ComentarioPost();
            $listComentarios[$cont]->id = $rs['id'];
            $listComentarios[$cont]->id_dica_fitness = $rs['id_dica_fitness'];
            $listComentarios[$cont]->id_usuario_comentario = $rs['id_usuario_comentario'];
            $listComentarios[$cont]->assunto = $rs['assunto'];
            $listComentarios[$cont]->texto = $rs['texto'];
            $listComentarios[$cont]->data = date('d/m/Y', strtotime($rs['data']));
            $listComentarios[$cont]->nome = $rs['nome'];
            $listComentarios[$cont]->email = $rs['email'];
            $listComentarios[$cont]->id_usuario = $rs['id_usuario'];
            $cont+=1;
        }
        return $listComentarios;
    }
    public function selectUnaccept(){
        $listComentariosGerais = null;

        $sql="SELECT c.id AS id_comentario, c.id_usuario AS id_comentario_usuario, c.assunto AS assunto, c.texto AS texto, c.foto AS foto, c.data AS data, CONCAT(u.nome, ' ', u.sobrenome) AS nome, u.email AS email, u.id AS id_usuario, c.ativo AS ativo FROM tbl_comentario_geral AS c INNER JOIN tbl_usuario AS u WHERE c.id_usuario = u.id AND c.ativo = '0' ORDER BY c.id DESC;";
        //echo($sql);
        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $cont=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listComentariosGerais[] = new ComentarioGeral();
            $listComentariosGerais[$cont]->nome = $rs['nome'];
            $listComentariosGerais[$cont]->email = $rs['email'];
            $listComentariosGerais[$cont]->id_usuario = $rs['id_usuario'];
            $listComentariosGerais[$cont]->id_comentario = $rs['id_comentario'];
            $listComentariosGerais[$cont]->assunto = $rs['assunto'];
            $listComentariosGerais[$cont]->texto = $rs['texto'];
            $listComentariosGerais[$cont]->ativo = $rs['ativo'];
            $listComentariosGerais[$cont]->foto = $rs['foto'];
            $listComentariosGerais[$cont]->data = date('d/m/Y', strtotime($rs['data']));

            $cont+=1;
        }
        return $listComentariosGerais;
    }
    public function selectAccept(){
        $listComentariosGerais = null;

        $sql="SELECT c.id AS id_comentario, c.id_usuario AS id_comentario_usuario, c.assunto AS assunto, c.texto AS texto, c.foto AS foto, c.data AS data, CONCAT(u.nome, ' ', u.sobrenome) AS nome, u.email AS email, u.id AS id_usuario, c.ativo AS ativo FROM tbl_comentario_geral AS c INNER JOIN tbl_usuario AS u WHERE c.id_usuario = u.id AND c.ativo = '1' ORDER BY c.id DESC;";
        //echo($sql);
        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $count=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listComentariosGerais[] = new ComentarioGeral();
            $listComentariosGerais[$count]->nome = $rs['nome'];
            $listComentariosGerais[$count]->email = $rs['email'];
            $listComentariosGerais[$count]->id_comentario_usuario = $rs['id_comentario_usuario'];
            $listComentariosGerais[$count]->id_comentario = $rs['id_comentario'];
            $listComentariosGerais[$count]->assunto = $rs['assunto'];
            $listComentariosGerais[$count]->texto = $rs['texto'];
            $listComentariosGerais[$count]->ativo = $rs['ativo'];
            $listComentariosGerais[$count]->id_usuario = $rs['id_usuario'];
            $listComentariosGerais[$count]->foto = $rs['foto'];
            $listComentariosGerais[$count]->data = date('d/m/Y', strtotime($rs['data']));

            $count+=1;
        }
        return $listComentariosGerais;
    }
    public function delete($id){
        $sql = "delete from tbl_comentario_post where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:comentarios-gerais.php');
        else
            echo("<script>alert('Erro ao deletar este item.')</script>");
    }
    public function active($id){
        $sql = "UPDATE tbl_comentario_geral SET ativo = '1' where id =".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:comentarios-gerais.php');
        else
            echo("<script>alert('Erro ao ativar este item.')</script>");
    }
    public function desactive($id){
        $sql = "UPDATE tbl_comentario_geral SET ativo = '0' where id =".$id;
        //echo($sql);
        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:comentarios-gerais.php');
        else
            echo("<script>alert('Erro ao desativar este item.')</script>");
    }
}
?>
