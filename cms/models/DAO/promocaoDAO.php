<?php

//Classe de ações no banco
class promocaoDAO {

    //Classe construtora
    public function __construct(){
        require_once('dataBase.php');
        require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/promocaoClass.php');
    }

    //Função de inserção no banco
    public function insert($classPromocao){
        $sql = "INSERT INTO tbl_promocao(id_prato, desconto, data_inicio, data_termino) values (
        '".$classPromocao->id_prato."',
        '".$classPromocao->desconto."',
        '".$classPromocao->data_inicio."',
        '".$classPromocao->data_termino."');";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();

        //Executa a query
        if($PDO_conex->query($sql)){
            header('location:promocoes.php');
        }else{
            echo('<script>alert("Erro ao inserir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');
        }

        $conex->desconectar();
    }

    public function selectId($id){
        $sql = "SELECT * FROM tbl_promocao WHERE id = ".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

            $listPromocao = new Promocao();
            $listPromocao->id = $rs['id'];
            $listPromocao->id_prato = $rs['id_prato'];
            $listPromocao->desconto = $rs['desconto'];
            $listPromocao->data_inicio = $date('d/m/Y', strtotime($rs['data_inicio']));
            $listPromocao->data_termino = date('d/m/Y', strtotime($rs['data_termino']));

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                echo('');
            else
                echo('<script>alert("Erro ao buscar informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

            $conex->desconectar();

            return $listPromocao;

        }
    }

    public function selectAll(){
        $listPromocao = null;

        $sql="select * from tbl_diario_bordo order by id desc";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $count=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listPromocao[] = new Promocao();
            $listPromocao[$count]->id = $rs['id'];
            $listPromocao[$count]->id_prato = $rs['id_prato'];
            $listPromocao[$count]->desconto = $rs['desconto'];
            $listPromocao[$count]->data_inicio = date('d/m/Y', strtotime($rs['data_inicio']));
            $listPromocao[$count]->data_termino = date('d/m/Y', strtotime($rs['data_termino']));
            $count+=1;
        }
        return $listPromocao;
    }

    public function selectDouble(){
        $listPromocao = null;

        $sql = "SELECT prato.id AS id_prato, prato.titulo AS nome_prato, foto_prato.foto AS foto_prato, categoria_prato.titulo AS nome_categoria FROM tbl_prato AS prato INNER JOIN tbl_foto_prato AS foto_prato INNER JOIN tbl_categoria AS categoria_prato WHERE prato.id = foto_prato.id_prato AND prato.id = categoria_prato.id_categoria_parent;";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $count=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listPromocao[] = new Promocao();
            $listPromocao[$count]->id_prato = $rs['id_prato'];
            $listPromocao[$count]->foto_prato = $rs['foto_prato'];
            $listPromocao[$count]->titulo = $rs['titulo'];
            $listPromocao[$count]->nome_prato = $rs['nome_prato'];
            $count+=1;
        }
        return $listPromocao;
    }

    public function delete($id){
        $sql = "DELETE FROM tbl_promocao WHERE id = ".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:promocoes.php');
        else
            echo('<script>alert("Erro ao excluir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');
    }

}
?>
