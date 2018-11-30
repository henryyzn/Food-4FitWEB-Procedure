<?php

    class propagandaDAO{
        public function __construct(){
            require_once('database.php');
            @require_once($_SESSION['path'].'cms/models/propagandaClass.php');
        }

        public function insert($classPropaganda){
            $sql = "insert into tbl_marketing(
            titulo,
            texto,
            imagem,
            ativo) values (
            '".$classPropaganda->titulo."',
            '".$classPropaganda->texto."',
            'assets/archives/propaganda/".$classPropaganda->imagem."',
            '".$classPropaganda->ativo."'
            );";

            $conex = new mysql_db();

            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                header('location:propaganda.php');
            else
                echo(''.sql);

            $conex->desconectar();
        }

        public function selectId(){
            $sql = "select * from tbl_propaganda where id=".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            if($rs=$select->fetch(PDO::FETCH_ASSOC)){

                $listPropaganda = new Propaganda();
                $listPropaganda[$cont]->id = $rs['id'];
                $listPropaganda[$cont]->titulo = $rs{'titulo'};
                $listPropaganda[$cont]->texto = $rs{'texto'};
                $listPropaganda[$cont]->imagem = $rs{'imagem'};
                $listPropaganda[$cont]->ativo = $rs{'ativo'};

                $conex->desconectar();
                $PDO_conex = $conex->conectar();
                if($PDO_conex->query($sql))
                    echo('select no banco');
                else
                    echo('erro');

                $conex->desconectar();

                return $listComentarios;

            }
        }

        public function selectAll(){
            $listPropaganda = null;
            $sql = "select * from tbl_marketing order by id desc";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            $cont=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC))
            {
                $listPropaganda [] = new Propaganda();
                $listPropaganda[$cont]->id = $rs['id'];
                $listPropaganda[$cont]->titulo = $rs{'titulo'};
                $listPropaganda[$cont]->texto = $rs{'texto'};
                $listPropaganda[$cont]->imagem = $rs{'imagem'};
                $listPropaganda[$cont]->ativo = $rs{'ativo'};

                $cont+=1;
            }
            return $listPropaganda;
        }

        public function delete($id){
            $sql = "delete from tbl_marketing order by id desc";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:propaganda.php');
        }

        public function active($id){
            $sql = "UPDATE tbl_marketing SET ativo = '1' where id=".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:propaganda.php');

        }

        public function desactive($id){
            $sql = "UPDATE tbl_marketing SET ativo = '0' where id =".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                header('location:propaganda.php');

        }
    }
?>
