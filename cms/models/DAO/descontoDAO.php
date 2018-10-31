<?php

    class descontoDAO{
        public function __construct(){
            require_once('dataBase.php');
            require_once('C:/xampp/htdocs/food4fit/cms/models/descontoClass.php');
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
                echo('Inseriu com sucesso');
            else
                echo('error');
                //echo(" ".$sql);

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
                echo('select no Banco');
            else
                echo('Erro');

            $conex->desconectar();

            return $listDesconto;
            }

        }

        public function selectAll(){

        }

        public function delete(){

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
    }
?>
