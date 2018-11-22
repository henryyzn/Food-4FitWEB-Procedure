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

        $sql = "SELECT promocao.id AS id_promocao,
        promocao.desconto AS desconto,
        promocao.data_inicio AS data_inicio,
        promocao.data_termino AS data_termino,
        prato.id AS id_prato,
        prato.titulo AS titulo, 
        prato.resumo AS resumo,
        prato.descricao AS descricao,
        prato.preco AS preco,
        prato.ativo AS ativo,
        foto_prato.foto AS foto
        FROM tbl_promocao AS promocao
        INNER JOIN tbl_prato AS prato
        INNER JOIN tbl_foto_prato AS foto_prato
        WHERE prato.id = promocao.id_prato
        AND foto_prato.id_prato = prato.id
        ORDER BY promocao.id DESC;";

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
            $listPromocao[$count]->id_promocao = $rs['id_promocao'];
            $listPromocao[$count]->desconto = $rs['desconto'];
            $listPromocao[$count]->data_inicio = date('d/m/Y', strtotime($rs['data_inicio']));
            $listPromocao[$count]->data_termino = date('d/m/Y', strtotime($rs['data_termino']));
            $listPromocao[$count]->id_prato = $rs['id_prato'];
            $listPromocao[$count]->titulo = $rs['titulo'];
            $listPromocao[$count]->resumo = $rs['resumo'];
            $listPromocao[$count]->descricao = $rs['descricao'];
            $listPromocao[$count]->preco = $rs['preco'];
            $listPromocao[$count]->ativo = $rs['ativo'];
            $listPromocao[$count]->foto = $rs['foto'];
            
            $count+=1;
        }
        return $listPromocao;
    }

    public function selectDouble(){
        $listPromocao = null;

        $sql = "SELECT prato.id AS id_prato, prato.titulo AS nome_prato, prato.resumo AS resumo, prato.descricao AS descricao, prato.ativo AS ativo, foto_prato.foto AS foto, prato.preco AS preco_normal, promocao.desconto AS preco_desconto, categoria.titulo AS nome_categoria FROM tbl_prato AS prato INNER JOIN tbl_promocao AS promocao INNER JOIN tbl_categoria AS categoria INNER JOIN tbl_foto_prato AS foto_prato WHERE prato.id = promocao.id_prato AND prato.id_categoria = categoria.id AND foto_prato.id_prato = prato.id ORDER BY promocao.id DESC;";

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
            $listPromocao[$count]->nome_prato = $rs['nome_prato'];
            $listPromocao[$count]->resumo = $rs['resumo'];
            $listPromocao[$count]->descricao = $rs['descricao'];
            $listPromocao[$count]->ativo = $rs['ativo'];
            $listPromocao[$count]->descricao = $rs['descricao'];
            $listPromocao[$count]->foto = $rs['foto'];
            $listPromocao[$count]->preco_normal = $rs['preco_normal'];
            $listPromocao[$count]->preco_desconto = $rs['preco_desconto'];
            $listPromocao[$count]->nome_categoria = $rs['nome_categoria'];
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
