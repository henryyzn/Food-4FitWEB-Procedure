<?php

//Ações do banco
class comentarioGeralDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/comentario-geralClass.php');
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
        $listComentarios->data = $rs['data'];
        $listComentarios->ativo = $rs['ativo'];

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        if($PDO_conex->query($sql))
            echo('select no Banco');
        else
            echo('Erro');

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
            $listComentarios[$cont]->data = $rs['data'];
            $listComentarios[$cont]->nome = $rs['nome'];
            $listComentarios[$cont]->email = $rs['email'];
            $listComentarios[$cont]->id_usuario = $rs['id_usuario'];
            $cont+=1;
        }
        return $listComentarios;
    }

    public function delete($id){
        $sql = "delete from tbl_comentario_post where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:comentarios.php');
    }
}
?>
