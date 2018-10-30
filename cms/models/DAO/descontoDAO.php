<?php

    class descontoDAO{
        public function __construct(){
            require_once('dataBase.php');
            require_once('cms/models/descontoClass.php');
        }

        public function insert($classDesconto){
            $sql = "insert into tbl_desconto(
            id,
            codig_cupom,
            valor,
            ativo,
            validade) values (
            '".$classDesconto->id."',
            '".$classDesconto->codig_cupom."',
            '".$classDesconto->valor."',
            '".$classDesconto->ativo."',
            '".$classDesconto->validade."'
            );";

            //INSTANCIA A CLASSE
            $conex = new mysql_db();

            //ABRE A CONEXÃO
            $PDO_conex = $conex->conectar();

            //EXECUTA A QUERY
            if($PDO_conex->query($sql))
                echo('Inseriu com sucesso');
            else
                echo('Erro no insert');

            $conex->desconectar();
        }

        public function selectId($id){
            $sql="select * from tbl_desconto where id=".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

        }

        public function selectAll(){

        }

        public function delete(){

        }

        public function update(){

        }
    }
?>
