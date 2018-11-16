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
            $sql2 = "INSERT INTO tbl_pedido (id_ordem_servico) VALUES ('".$classPedido->id_ordem_servico."');";

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
}
?>
