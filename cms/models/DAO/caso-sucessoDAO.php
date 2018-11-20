<?php

//Ações do banco
class casoSucessoDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/caso-sucessoClass.php');
    }

    public function insert($classCaso){
        $sql = "SELECT u.id AS id_usuario, CONCAT(u.nome, ' ', u.sobrenome) AS nome, u.data_nascimento AS data_nascimento, d.titulo AS titulo, d.texto AS texto FROM tbl_usuario AS u INNER JOIN tbl_diario_bordo AS d WHERE d.id_usuario = u.id AND d.id = ".$classCaso->id;

        $conex = new mysql_db();
        
        $PDO_conex = $conex->conectar();
        
        $select = $PDO_conex->query($sql);
        
        if($rs=$select->fetch(PDO::FETCH_ASSOC)){
            $listCaso = new CasoSucesso();
            $listCaso->id_usuario = $rs['id_usuario'];
            $listCaso->nome = $rs['nome'];
            $listCaso->data_nascimento = $rs['data_nascimento'];
            $listCaso->titulo = $rs['titulo'];
            $listCaso->texto = $rs['texto'];
            $listCaso->ativo = 1;
            $listCaso->data = date('y/m/d');

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql)){
                $sql2 = "INSERT INTO tbl_caso_sucesso (id_usuario, titulo, texto, ativo, data) VALUES ('$listCaso->id_usuario', '$listCaso->titulo', '$listCaso->texto', $listCaso->ativo, '$listCaso->data');";

                if($PDO_conex->query($sql2)){
                    header("location:casos-sucesso.php");
                }else{
                    echo('<script>alert("Erro ao inserir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');
                }

                $conex->desconectar();
            }else{
                echo('<script>alert("Erro ao comparar informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');
            }

            $conex->desconectar();
        }
    }

    public function selectId($id){
        $sql = "SELECT c.id AS id_caso_sucesso, c.id_usuario AS id_usuario_caso, c.titulo AS titulo, c.texto AS texto, c.ativo AS ativo, c.data AS data, CONCAT(u.nome, ' ', u.sobrenome) AS nome, u.data_nascimento AS data_nascimento, u.email AS email, u.avatar AS avatar FROM tbl_caso_sucesso AS c INNER JOIN tbl_usuario AS u WHERE c.id_usuario = u.id AND c.id =".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

            $listCasoSucesso = new CasoSucesso();
            $listCasoSucesso->id_caso_sucesso = $rs['id_caso_sucesso'];
            $listCasoSucesso->id_usuario_caso = $rs['id_usuario_caso'];
            $listCasoSucesso->titulo = $rs['titulo'];
            $listCasoSucesso->texto = $rs['texto'];
            $listCasoSucesso->ativo = $rs['ativo'];
            $listCasoSucesso->data = $rs['data'];
            $listCasoSucesso->nome = $rs['nome'];
            $listCasoSucesso->data_nascimento = $rs['data_nascimento'];
            $listCasoSucesso->email = $rs['email'];
            $listCasoSucesso->avatar = $rs['avatar'];
            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                echo('');
            else
                echo('<script>alert("Erro ao buscar informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

            $conex->desconectar();

            return $listCasoSucesso;
        }
    }

    public function selectAll(){
        $listCaso = null;

        $sql="SELECT c.id AS id, u.id AS id_usuario, CONCAT(u.nome, ' ', u.sobrenome) AS nome, u.email AS email, u.data_nascimento AS data_nascimento, u.avatar AS avatar, c.titulo AS titulo, c.texto AS texto, c.ativo AS ativo, c.data AS data FROM tbl_caso_sucesso AS c INNER JOIN tbl_usuario AS u WHERE c.id_usuario = u.id ORDER BY c.id DESC;";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $count=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listCaso[] = new CasoSucesso();
            $listCaso[$count]->id = $rs['id'];
            $listCaso[$count]->id_usuario = $rs['id_usuario'];
            $listCaso[$count]->nome = $rs['nome'];
            $listCaso[$count]->email = $rs['email'];
            $listCaso[$count]->data_nascimento = $rs['data_nascimento'];
            $listCaso[$count]->titulo = $rs['titulo'];
            $listCaso[$count]->texto = $rs['texto'];
            $listCaso[$count]->ativo = $rs['ativo'];
            $listCaso[$count]->avatar = $rs['avatar'];
            $listCaso[$count]->data = date('d/m/Y', strtotime($rs['data']));
            $count+=1;
        }
        return $listCaso;
    }

    public function delete($id){
        $sql = "delete from tbl_caso_sucesso where id = ".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:casos-sucesso.php');
    }

    public function active($id){
        $sql = "UPDATE tbl_caso_sucesso SET ativo = '1' WHERE id = ".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql)){
            header('location:casos-sucesso.php');
        }else{
            echo('<script>alert("Erro ao ativar item no sistema.</br>Tente novamente ou contate o técnico.");</script>');
        }
    }

    public function desactive($id){
        $sql = "UPDATE tbl_caso_sucesso SET ativo = '0' WHERE id = ".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql)){
            header('location:casos-sucesso.php');
        }else{
            echo('<script>alert("Erro ao desativar item no sistema.</br>Tente novamente ou contate o técnico.");</script>');
        }
    }
}
?>
