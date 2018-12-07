<?php

//Ações do banco
class comentarioPostDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        //require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/comentario-postClass.php');
        @require_once($_SESSION['path'].'cms/models/comentario-postClass.php');
    }

    public function insert($classComentario){
        $sql = "insert into tbl_comentario_post(id_dica_fitness, id_usuario, assunto, texto, data, ativo) values (
        '".$classComentario->id_dica_fitness."',
        '".$classComentario->id_usuario."',
        '".$classComentario->assunto."',
        '".$classComentario->texto."',
        '".$classComentario->data."',
        '".$classComentario->ativo."');";

        //echo($sql);

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();

        //Executa a query
        if($PDO_conex->query($sql))
            header('location:index.php');
        else
            echo('erro no insert');

        $conex->desconectar();
    }

    public function selectId($id){
        $sql="select * from tbl_comentario_post where id=".$id;

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
