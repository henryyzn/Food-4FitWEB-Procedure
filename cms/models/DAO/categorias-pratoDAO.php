<?php
    class catPratoDAO{
        public function __construct(){
            require_once('database.php');
            @require_once($_SESSION['path'].'../models/categorias-pratoClass.php');
            @require_once($_SESSION['path'].'../models/categorias-ingredientesClass.php');
        }

        public function insert($classCatPrato){
            $sql = "insert into tbl_categoria(
                    id_categoria_parent,
                    titulo,
                    foto,
                    ativo
                    ) values (
                    '".$classCatPrato->idCadIngrediente."',
                    'assets/images/categorias/".$classCatPrato->foto."',
                    '".$classCatPrato->titulo."',
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
                $listCategP[$cont]->id = $rs['id'];
                $listCategP[$cont]->idCadIngrediente = $rs['id_categoria_parent'];
                $listCategP[$cont]->titulo = $rs['titulo'];
                $listCategP[$cont]->foto = $rs['foto'];
                $listCategP[$cont]->ativo = $rs['ativo'];

                $cont+=1;
            }
            return $listCategP;
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
            foto = 'assets/images/categorias".$classCatPrato->foto."',
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
