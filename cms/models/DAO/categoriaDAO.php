<?php
    class categoriaDAO{
        public function __construct(){
            require_once('dataBase.php');
//            require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/categoriaClass.php');
            @require_once($_SESSION['path'].'cms/models/categoriaClass.php');

        }

        public function insert($classCategoria){
            $sql = "INSERT INTO tbl_categoria(
            titulo,
            descricao,
            foto,
            ativo
            ) values (
            '".$classCategoria->titulo."',
            '".$classCategoria->descricao."',
            'assets/archives/categorias/".$classCategoria->foto."',
            '".$classCategoria->ativo."');";

            //echo($sql);

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:categoria.php');
            else
                echo "<script>alert('Erro ao inserir informações no sistema. Tente novamente ou contate o técnico.'); window.location = 'categoria.php';</script>";

            $conex->desconectar();

        }

        public function selectId($id){

            $sql = "select * from tbl_categoria where id=".$id;
            //echo $sql;
            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            if($rs=$select->fetch(PDO::FETCH_ASSOC)){


                $listCategoria = new categoria();
                $listCategoria->id = $rs['id'];
                $listCategoria->titulo = $rs['titulo'];
                $listCategoria->descricao = $rs['descricao'];
                $listCategoria->foto = $rs['foto'];
                $listCategoria->ativo = $rs['ativo'];

                $conex = new mysql_db();
                $PDO_conex = $conex->conectar();
                if($PDO_conex->query($sql))
                    echo('');
                else
                    echo "<script>alert('Erro ao buscar informações no sistema. Tente novamente ou contate o técnico.'); window.location = 'categoria.php';</script>";

                $conex->desconectar();

                return $listCategoria;
            }
        }

        public function selectAll(){
            $listCategoria = null;
            $sql = "SELECT * FROM tbl_categoria ORDER BY id DESC;";
            //echo $sql;
            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            $select = $PDO_conex->query($sql);

            $count=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC)){
                $listCategoria[] = new categoria();
                $listCategoria[$count]->id = $rs['id'];
                $listCategoria[$count]->descricao = $rs['descricao'];
                $listCategoria[$count]->titulo = $rs['titulo'];
                $listCategoria[$count]->foto = $rs['foto'];
                $listCategoria[$count]->ativo = $rs['ativo'];
                $count+=1;
            }

            return $listCategoria;
        }

        public function delete($id){
            $sql = "DELETE FROM tbl_categoria WHERE id=".$id;

            //echo ($sql);

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                header('location:categoria.php');
            else
                echo "<script>alert('Erro ao deletar informações no sistema. Tente novamente ou contate o técnico.'); window.location = 'categoria.php';</script>";
        }

        public function update($classCategoria){
            $sql = "UPDATE tbl_categoria SET
            titulo = '".$classCategoria->titulo."',
            descricao = '".$classCategoria->descricao."',
            foto = '".$classCategoria->foto."',
            ativo = ".$classCategoria->ativo."
            WHERE id = ".$classCategoria->id;

            //echo($sql);

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                header('location:categoria.php');
            else
                echo "<script>alert('Erro ao atualizar informações no sistema. Tente novamente ou contate o técnico.'); window.location = 'categoria.php';</script>";

            $conex->desconectar();
        }
        public function active($id){
            $sql = "UPDATE tbl_categoria SET ativo = '1' WHERE id = ".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql)){
                header("location:categoria.php");
            }else{
                echo "<script>alert('Erro ao ativar item no sistema. Tente novamente ou contate o técnico.'); window.location = 'categoria.php';</script>";
            }
        }

        public function desactive($id){
            $sql = "UPDATE tbl_categoria SET ativo = '0' WHERE id = ".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql)){
                header("location:categoria.php");
            }else{
                echo "<script>alert('Erro ao desativar item no sistema. Tente novamente ou contate o técnico.'); window.location = 'categoria.php';</script>";
            }
        }

    }
?>
