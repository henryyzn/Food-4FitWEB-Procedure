<?php

//Ações do banco
class pedidoDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        require_once('C:\xampp\htdocs\arisCodeProcedural\cms\models\pedidoClass.php');
    }

    public function insertOrdem($classPedido){
        $sql = "INSERT INTO tbl_ordem_servico(id_usuario) VALUES ('".$classPedido->id_usuario."');";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();

        //Executa a query
        if($PDO_conex->query($sql)){
            echo("<script>alert('Ordem de serviço enviada com sucesso.')</script>");
            //header('location:diario-de-bordo.php');
            $last_id = $PDO_conex->lastInsertId();
            $array = $classPedido->pedido;

            foreach($array as $data){

                $sql2 = "INSERT INTO tbl_prato_ordem_servico (id_ordem_servico, quantidade, id_prato) VALUES ($last_id, $data[quantidade], $data[id_prato])";
                echo $sql;

                if($PDO_conex->query($sql2)){
                    echo("<script>alert('Ordem de prato de serviço enviada com sucesso.')</script>");
                    header("location:carrinho-confirmacao.php?last_id=".$last_id);
                }else{
                    echo('<script>alert("2Erro ao realizar compra.</br>Tente novamente ou contate o técnico.");</script>');
                }

                $conex->desconectar();
            }
        }else{
            echo('<script>alert("Erro ao realizar compra.</br>Tente novamente ou contate o técnico.");</script>');
        }

        $conex->desconectar();
    }
    public function pagamento($classPedido){
        $sql = "INSERT INTO tbl_pagamento (id_ordem_servico) VALUES ('".$classPedido->id_ordem_servico."');";
        //echo $sql;
        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();

        //Executa a query
        if($PDO_conex->query($sql)){
            //echo("<script>alert('Ordem de serviço enviada com sucesso.')</script>");
            $sql2 = "INSERT INTO tbl_pedido (id_ordem_servico, status, data) VALUES ('".$classPedido->id_ordem_servico."', '1', '".date("Y-m-d h:i:s")."');";

            if($PDO_conex->query($sql2)){
                echo ("<script>window.alert('Compra realizada com sucesso.'); window.location.href='meus-pedidos.php';</script>");
                unset($_SESSION['carrinho']);
                unset($_SESSION['itens-carrinho']);
                unset($_SESSION['last_id']);
            }else{
                echo('<script>alert("Erro ao realizar compra.</br>Tente novamente ou contate o técnico.");</script>');
            }
            $conex->desconectar();

        }else{
            echo('<script>alert("Erro ao realizar compra.</br>Tente novamente ou contate o técnico.");</script>');
        }

        $conex->desconectar();
    }
    public function selectAll(){
        $listPedidos = null;
        $sql="SLECT * FROM tbl_pedido ORDER BY id DESC;";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $count=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listPedidos[] = new Pedido();
            $listPedidos[$count]->id = $rs['id'];
            $listPedidos[$count]->id_usuario = $rs['id_usuario'];
            $listPedidos[$count]->titulo = $rs['titulo'];
            $listPedidos[$count]->texto = $rs['texto'];
            $listPedidos[$count]->progresso = $rs['progresso'];
            $listPedidos[$count]->data = date('d/m/Y', strtotime($rs['data']));
            $count+=1;
        }
        return $listDiarioBordo;
    }

    public function selectInfo(){
        $listPedidos = null;

        $sql="SELECT
            pedido.id AS id_pedido,
            CONCAT(usuario.nome, ' ', usuario.sobrenome) AS nome_usuario,
            usuario.email AS email_usuario,
            prato.titulo AS titulo_prato,
            foto_prato.foto AS foto_prato,
            prato_ordem_servico.quantidade AS quantidade_itens
            FROM tbl_pedido AS pedido
            INNER JOIN tbl_ordem_servico AS ordem_servico
            INNER JOIN tbl_prato_ordem_servico AS prato_ordem_servico
            INNER JOIN tbl_prato AS prato
            INNER JOIN tbl_foto_prato AS foto_prato
            INNER JOIN tbl_usuario AS usuario
            WHERE prato_ordem_servico.id_ordem_servico = ordem_servico.id
            AND pedido.id_ordem_servico = ordem_servico.id
            AND prato_ordem_servico.id_prato = prato.id
            AND foto_prato.id_prato = prato.id
            AND ordem_servico.id_usuario = usuario.id
            ORDER BY pedido.id DESC;";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $count=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listPedidos[] = new Pedido();
            $listPedidos[$count]->id_pedido = $rs['id_pedido'];
            $listPedidos[$count]->nome_usuario = $rs['nome_usuario'];
            $listPedidos[$count]->email_usuario = $rs['email_usuario'];
            $listPedidos[$count]->titulo_prato = $rs['titulo_prato'];
            $listPedidos[$count]->foto_prato = $rs['foto_prato'];
            $listPedidos[$count]->quantidade_itens = $rs['quantidade_itens'];
            $count+=1;
        }
        return $listPedidos;
    }

    public function contador(){
        $rows = null;

        $sql="SELECT COUNT(*) AS total FROM tbl_pedido;";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $count=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $rows[] = new Pedido();
            $rows[$count]->total = $rs['total'];
            $count+=1;
        }
        return $rows;
    }
}
?>
