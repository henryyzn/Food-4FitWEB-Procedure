<?php

//Ações do banco
class cartaoDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/cartaoClass.php');
    }

    public function insert($classCartao){
        $sql = "INSERT INTO tbl_cartao(id_bandeira_cartao, id_usuario, numero, titular, mes_validade, ano_validade) VALUES (
        '".$classCartao->id_bandeira_cartao."',
        '".$classCartao->id_usuario."',
        '".$classCartao->numero."',
        '".$classCartao->titular."',
        '".$classCartao->mes_validade."',
        '".$classCartao->ano_validade."');";

        //echo($sql);

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();

        //Executa a query
        if($PDO_conex->query($sql))
            echo ("<script>
                      window.alert('Cartão Inserido.');
                      window.history.back();
                   </script>");
        else
            echo('<script>alert("Erro ao inserir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

        $conex->desconectar();
    }

    public function selectId($id){
        $sql="SELECT * FROM tbl_cartao WHERE id = ".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

            $listCartao = new Cartao();
            $listCartao->id = $rs['id'];
            $listCartao->id_bandeira_cartao = $rs['id_bandeira_cartao'];
            $listCartao->id_usuario = $rs['id_usuario'];
            $listCartao->numero = $rs['numero'];
            $listCartao->titular = $rs['titular'];
            $listCartao->mes_validade = $rs['mes_validade'];
            $listCartao->ano_validade = $rs['ano_validade'];

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                echo('');
            else
                echo('<script>alert("Erro ao buscar informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

            $conex->desconectar();

            return $listCartao;

        }


    }

    public function selectAll(){
        $listCartoes = null;
        $sql="SELECT * FROM tbl_cartao ORDER BY id DESC;";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $count=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listCartoes[] = new Cartao();
            $listCartoes[$count]->id = $rs['id'];
            $listCartoes[$count]->id_bandeira_cartao = $rs['id_bandeira_cartao'];
            $listCartoes[$count]->id_usuario = $rs['id_usuario'];
            $listCartoes[$count]->titular = $rs['titular'];
            $listCartoes[$count]->numero = $rs['numero'];
            $listCartoes[$count]->mes_validade = $rs['mes_validade'];
            $listCartoes[$count]->ano_validade = $rs['ano_validade'];
            $count+=1;
        }
        return $listCartoes;
    }

    public function selectAllId($id){
        $listCartoes = null;

        $sql="SELECT * FROM tbl_cartao WHERE id_usuario = '".$id."' ORDER BY id DESC;";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $count=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listCartoes[] = new Cartao();
            $listCartoes[$count]->id = $rs['id'];
            $listCartoes[$count]->id_bandeira_cartao = $rs['id_bandeira_cartao'];
            $listCartoes[$count]->id_usuario = $rs['id_usuario'];
            $listCartoes[$count]->titular = $rs['titular'];
            $listCartoes[$count]->numero = $rs['numero'];
            $listCartoes[$count]->mes_validade = $rs['mes_validade'];
            $listCartoes[$count]->ano_validade = $rs['ano_validade'];
            $count+=1;
        }
        return $listCartoes;
    }

    public function delete($id){
        $sql = "DELETE FROM tbl_cartao WHERE id = ".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            echo('<script>alert("Cartão removido.");</script>');
    }

}
?>
