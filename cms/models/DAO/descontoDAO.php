<?php

    class descontoDAO{
        public function __construct(){
             require_once('dataBase.php'); require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/descontoClass.php');
        }

        public function insert($classDesconto){
            $sql = "insert into tbl_desconto(
            titulo,
            codig_cupom,
            valor,
            ativo,
            validade) values (
            '".$classDesconto->titulo."',
            '".$classDesconto->codig_cupom."',
            '".$classDesconto->valor."',
            '".$classDesconto->ativo."',
            '".$classDesconto->validade."'
            );";

            //Instancia a classe
            $conex = new mysql_db();
            //Abre a Conexao
            $PDO_conex = $conex->conectar();

            //Executa a query
            if($PDO_conex->query($sql))
                header("location:../descontos.php");
            else
                echo('<script>alert("Erro ao inserir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

            $conex->desconectar();
        }

        public function selectId($id){
            $sql="select * from tbl_desconto where id=".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            if($rs=$select->fetch(PDO::FETCH_ASSOC)){
                $listDesconto = new desconto();
                $listDesconto->id = $rs['id'];
                $listDesconto->titulo = $rs['titulo'];
                $listDesconto->codig_cupom = $rs['codig_cupom'];
                $listDesconto->valor = $rs['valor'];
                $listDesconto->ativo = $rs['ativo'];
                $listDesconto->validade = ['validade'];

                $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                echo('');
            else
                echo('Erro');

            $conex->desconectar();

            return $listDesconto;
            }

        }

        public function selectAll(){
            $listDesconto = null;
            $sql = "SELECT * FROM tbl_desconto ORDER BY id DESC;";

            //Instancia a classe
            $conex = new mysql_db();
            //Abre a Conexao
            $PDO_conex = $conex->conectar();
            //Executa a query

            $select = $PDO_conex->query($sql);

            $count = 0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC)){
            //Cria um objeto array da classe Contato
                $listDesconto[] = new Desconto();
                $listDesconto[$count]->id = $rs['id'];
                $listDesconto[$count]->titulo = $rs['titulo'];
                $listDesconto[$count]->codig_cupom = $rs['codig_cupom'];
                $listDesconto[$count]->valor = $rs['valor'];
                $listDesconto[$count]->ativo = $rs['ativo'];
                $listDesconto[$count]->validade = $rs['validade'];
                $count += 1;
            }
            return $listDesconto;
        }

        public function delete($id){
            $sql = "DELETE FROM tbl_desconto WHERE id = ".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                header('location:descontos.php');
            else
                echo('<script>alert("Erro ao excluir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');
        }

        public function update($classDesconto){

            $sql = "UPDATE tbl_desconto SET titulo = '".$classDesconto->titulo."',
                codig_cupom = '".$classDesconto->codig_cupom."',
                valor = '".$classDesconto->valor."',
                ativo = '".$classDesconto->ativo."',
                validade = '".$classDesconto->validade."'
                where id=".$classDesconto->id;

            echo($sql);

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                echo('Deu certo');
            else
                echo('Deu errado');

            $conex->desconectar();

        }

        public function active($id){
            $sql = "UPDATE tbl_desconto SET ativo = '1' WHERE id = ".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql)){
                header("location:descontos.php");
            }else{
                echo('<script>alert("Erro ao ativar item no sistema.</br>Tente novamente ou contate o técnico.");</script>');
            }
        }

        public function desactive($id){
            $sql = "UPDATE tbl_desconto SET ativo = '0' WHERE id = ".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql)){
                header("location:descontos.php");
            }else{
                echo('<script>alert("Erro ao desativar item no sistema.</br>Tente novamente ou contate o técnico.");</script>');
            }
        }
    }
?>
