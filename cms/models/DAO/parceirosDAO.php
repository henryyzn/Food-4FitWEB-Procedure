<?php

    class parceirosDAO{
        public function __construct(){
            require_once('database.php');
            //require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/parceirosClass.php');
            require_once($_SESSION['path'].'cms/models/parceirosClass.php');
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
                header('location:cadastro-parceiro.php');
            else
                //echo('error');
                echo(''.$sql);


            $conex->desconectar();
        }

        public function insertContato($classParceiros){
            $sql = "insert into tbl_contato_parceiro(
            titulo,
            descricao,
            imagem,
            id_usuario) values (
            '".$classParceiros->titulo."',
            '".$classParceiros->descricao."',
            'assets/archives/parceiros/".$classParceiros->imagem."',
            '".$classParceiros->id_usuario."'
            );";

            $conex = new mysql_db();

            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                header('location:homenagem-parceiros.php');
            else
                //echo('error');
                echo(''.$sql);


            $conex->desconectar();
        }

        public function selectId($id){
            $sql="select * from tbl_parceiro_fitness where id=".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            if($rs=$select->fetch(PDO::FETCH_ASSOC)){

                $listParceiro = new Parceiros();
                $listParceiro[] = new Parceiros();
                $listParceiro[$cont]->id = $rs['id'];
                $listParceiro[$cont]->id_usuario = $rs['id_usuario'];
                $listParceiro[$cont]-> titulo = $rs['titulo'];
                $listParceiro[$cont]-> descricao = $rs['descricao'];
                $listParceiro[$cont]-> foto = $rs['foto'];
                $listParceiro[$cont]-> link1 = $rs['link1'];
                $listParceiro[$cont]-> ativo = $rs['ativo'];

                $conex = new mysql_db();
                $PDO_conex = $conex->conectar();
                if($PDO_conex->query($sql))
                    echo('select no banco');
                else
                    echo('erro');

                $conex-> desconectar();

                return $listComentarios;

            }
        }

        public function selectAll(){
            $listParceiros = null;
            $sql = "select * from tbl_parceiro_fitness order by id desc";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            $cont=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC))
            {
                $listParceiros[] = new Parceiros();
                $listParceiros[$cont]->id = $rs['id'];
                $listParceiros[$cont]->id_usuario = $rs['id_usuario'];
                $listParceiros[$cont]-> titulo = $rs['titulo'];
                $listParceiros[$cont]-> descricao = $rs['descricao'];
                $listParceiros[$cont]-> foto = $rs['foto'];
                $listParceiros[$cont]-> link1 = $rs['link1'];
                $listParceiros[$cont]-> ativo = $rs['ativo'];

                $cont+=1;
            }

            return $listParceiros;
        }

        public function delete($id){
            $sql = "delete from tbl_parceiro_fitness order by id desc";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:parceiros.php');
        }

        public function active($id){
            $sql = "UPDATE tbl_parceiro_fitness SET ativo = '1' where id=".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:parceiros.php');

        }

        public function desactive($id){
            $sql = "UPDATE tbl_parceiro_fitness SET ativo = '0' where id =".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                header('location:parceiros.php');

        }
    }
?>
