<?php
    class categoriaDAO{
        public function __construct(){
            require_once('dataBase.php');
            require_once('../models/categoriaClass.php');


        }

        public function insert($classCategoria){
            $sql = "insert into tbl_categoria(

            titulo,
            foto,
            ativo
            ) values (
            '".$classCategoria->titulo."',
            'assets/images/categorias/".$classCategoria->foto."',
            '".$classCategoria->ativo."'
            );";

            echo($sql);

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:categoria.php');
//                echo('Inseriu com sucesso');
            else
                echo('error');

            $conex->desconectar();

        }

        public function selectAll(){
            $listCategoria = null;
            $sql = "select * from tbl_categoria order by id desc";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            $select = $PDO_conex->query($sql);

            $cont=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC)){
                $listCategoria[] = new categoria();
                $listCategoria[$cont]->id= $rs['id'];
//                $listCategoria[$cont]->idCategoriaP = $rs['id_categoria_parent'];
                $listCategoria[$cont]->titulo = $rs['titulo'];
                $listCategoria[$cont]->foto = $rs['foto'];
                $listCategoria[$cont]->ativo = $rs['ativo'];
                $cont++;
            }

            return $listCategoria;
        }

        public function delete($id){
            $sql = "delete from tbl_categoria where id=".$id;

//            echo ($sql);

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                header('location:categoria.php');
//                echo ($sql);
//            else
//                echo ('Erro no banco de dados!');
        }

        public function update($classCategoria){
            $sql = "UPDATE tbl_categoria SET
            id_categoria_parent = ".$classCategoria->idCategoriaP.",
            titulo = '".$classCategoria->titulo."',
            foto = 'assets/images/categorias".$classCategoria->foto."',
            ativo = ".$classCategoria->ativo."
            where id=".$classCategoria->id;

            echo($sql);

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                header('location:categoria.php');
//                echo('Deu certo!');
//            else
//                echo('Deu errado!');

            $conex->desconectar();
        }

    }
?>
