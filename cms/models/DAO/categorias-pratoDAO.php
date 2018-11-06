<?php
    class cadPratoDAO{
        public function __construct(){
            require_once('database.php');
            require_once('../models/categorias-pratoClass.php');
        }

        public function insert($classCatPrato){
            $sql = "insert into tbl_categoria(
                    id_categoria_parent,
                    titulo,
                    foto,
                    ativo
                    ) values (
                    '".$classCatPrato->idCadIngrediente."',
                    'assets/images/categorias/".$classCatPrato->titulo."',
                    '".$classCatPrato->foto."',
                    '".$classCatPrato->ativo."',
            )";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:categorias-prato.php');

            $conex-desconectar();
        }

        public function selecId($id){
            $sql = "select * from tbl_categoria where id=".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            if($rs=$select->fetch(PDO::FETCH_ASSOC)){

                $listPratoCategoria = new categoriaPrato();
                $listPratoCategoria->id = $rs['id'];
                $listPratoCategoria->idCadIngrediente = $rs['id_categoria_parent'];
                $listPratoCategoria->titulo = $rs['titulo'];
                $listPratoCategoria->foto = $rs['foto'];
                $listPratoCategoria->ativo = $rs['ativo'];

                $conex = new mysql_db();
                $PDO_conex = $conex->conectar();
                if($PDO_conex->query($sql))
                    echo('select no Banco');
                else
                    echo('Erro');

                $conex->desconectar();

                return $listPratoCategoria;

            }

        }

        public function selectAll(){
            $listCategP = null;
            $sql = "select * from tbl_categoria order by id desc";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            $cont=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC))
            {
                $listCategP[] = new categoriaPrato();
                $listCatP[$cont]->id = $rs['id'];
                $listCatP[$cont]->idCadIngrediente = $rs['id_categoria_parent'];
                $listCatP[$cont]->titulo = $rs['titulo'];
                $listCatP[$cont]->foto = $rs['foto'];
                $listCatP[$cont]->ativo = $rs['ativo'];

                $cont+=1;
            }
            return $listCatP;
        }

        public function delete($id){
            $sql = "delete from tbl_categoria where id=".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:categorias-prato.php');

        }

        public function update($classCatPrato){
            $sql = "UPDATE tbl_categoria SET
            id_categoria_parent = ".$classCatPrato->idCadIngrediente.",
            titulo = '".$classCatPrato->titulo."',
            foto = 'assets/images/sobre-nos/".$classCatPrato->foto."',
            ativo = ".$classCatPrato->ativo.",
            where id=".$classCatPrato->id;

//            echo($sql);

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:categorias-prato.php');
//                echo('Deu certo!');
//            else
//                echo('Deu errado!');

            $conex->desconectar();


        }

    }
?>
