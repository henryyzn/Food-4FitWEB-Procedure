<?php

//Ações do banco
class dicasSaudeDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/dicas-saudeClass.php');
    }

    public function insert($classDicasSaude){
            $sql = "insert into tbl_dica_saude(id_funcionario, titulo, texto, data, ativo) values (
            '".$classDicasSaude->id_funcionario."',
            '".$classDicasSaude->titulo."',
            '".$classDicasSaude->texto."',
            '".$classDicasSaude->data."',
            '".$classDicasSaude->ativo."');";

            //echo($sql);

            //Instancia a classe
            $conex = new mysql_db();
            //Abre a Conexao
            $PDO_conex = $conex->conectar();

            //Executa a query
            if($PDO_conex->query($sql))
                header('location:dicas-saude.php');
            else
                echo('<script>alert("Erro ao inserir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

            $conex->desconectar();
        }

    public function selectId($id){
        $sql="select * from tbl_dica_saude where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

        $listDicasSaude = new DicasSaude();
        $listDicasSaude->id = $rs['id'];
        $listDicasSaude->id_funcionario = $rs['id_funcionario'];
        $listDicasSaude->titulo = $rs['titulo'];
        $listDicasSaude->texto = $rs['texto'];
        $listDicasSaude->data = date('d/m/Y', strtotime($rs['data']));
        $listDicasSaude->ativo = $rs['ativo'];

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        if($PDO_conex->query($sql))
            echo('');
        else
            echo('<script>alert("Erro ao buscar informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

        $conex->desconectar();

        return $listDicasSaude;

        }


    }

    public function selectAll(){
        $listDicasSaude = null;
        $sql="select * from tbl_dica_saude order by id desc";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $cont=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listDicasSaude[] = new DicasSaude();
            $listDicasSaude[$cont]->id = $rs['id'];
            $listDicasSaude[$cont]->id_funcionario = $rs['id_funcionario'];
            $listDicasSaude[$cont]->titulo = $rs['titulo'];
            $listDicasSaude[$cont]->texto = $rs['texto'];
            $listDicasSaude[$cont]->data = date('d/m/Y', strtotime($rs['data']));
            $listDicasSaude[$cont]->ativo = $rs['ativo'];
            $cont+=1;
        }
        return $listDicasSaude;
    }

    public function delete($id){
        $sql = "delete from tbl_dica_saude where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:dicas-saude.php');
        else
            echo('<script>alert("Erro ao excluir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');
    }

    public function update($classDicasSaude){

        $sql = "UPDATE tbl_dica_saude SET
        id_funcionario = '".$classDicasSaude->id_funcionario."',
        titulo = '".$classDicasSaude->titulo."',
        texto = '".$classDicasSaude->texto."',
        data = '".$classDicasSaude->data."',
        ativo = '".$classDicasSaude->ativo."'
        where id=".$classDicasSaude->id;

        echo($sql);

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:dicas-saude.php');
        else
            echo('<script>alert("Erro ao atualizar informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

        $conex->desconectar();

    }

}
?>
