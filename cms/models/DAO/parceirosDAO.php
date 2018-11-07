<?php

    class parceirosDAO{
        public function __construct(){
            require_once('database.php');
            require_once('../models/parceirosClass.php');
        }

        public function insert($classParceiros){
            $sql = "insert into tbl_parceiro_fitness(
            id_usuario,
            titulo,
            descricao,
            foto,
            link,
            ativo) values (
            '".$classParceiros->id_usuario."',
            '".$classParceiros->titulo."',
            '".$classParceiros->descricao."',
            '".$classParceiros->foto."',
            '".$classParceiros->link1."',
            '".$classParceiros->ativo."'
            );";

            $conex = new mysql_db();

            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                echo('Inseriu com sucesso');
            else
                //echo('error');
                echo(''.$sql);


            $conex->desconectar();
        }

        public function selectAll(){
            $listParceiro = null;
            $sql = "select * from tbl_parceiro_fitness order by id desc";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            $cont=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC))
            {
                $listParceiro[] = new Parceiros();
                $listParceiro[$cont]->id = $rs['id'];
                $listParceiro[$cont]->id_usuario = $rs['id_usuario'];
                $listParceiro[$cont]-> titulo = rs['titulo'];
                $listParceiro[$cont]-> descricao = rs['descricao'];
                $listParceiro[$cont]-> foto = rs['foto'];
                $listParceiro[$cont]-> link1 = rs['link'];
                $listParceiro[$cont]-> ativo = rs['ativo'];

                $cont+=1;
            }

            return $listParceiro;
        }

        public function delete($id){
            $sql = "delete from tbl_parceiro_fitness order by id desc";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:parceiros.php');
        }
    }
?>
