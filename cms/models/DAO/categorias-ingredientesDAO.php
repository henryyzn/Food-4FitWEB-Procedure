<?php
    @session_start();
    class catIngredienteDAO{
        public function __construct(){
            require_once('dataBase.php');
            //require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/categorias-ingredientesClass.php');
            @require_once($_SESSION['path'].'cms/models/categorias-ingredientesClass.php');
        }

        public function insert($classCatIngrediente){
            $sql = "insert into tbl_categoria_ingrediente(
                    titulo,
                    descricao,
                    foto,
                    ativo
                    ) values (
                    '".$classCatIngrediente->titulo."',
                    '".$classCatIngrediente->descricao."'
                    'assets/images/categorias/".$classCatIngrediente->foto."',
                    '".$classCatIngrediente->ativo."')";

            //echo($sql);

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:categorias-ingredientes.php');
            else
                echo "<script>alert('Erro ao inserir informações no sistema. Tente novamente ou contate o técnico.'); window.location = 'categorias-ingredientes.php';</script>";

            $conex->desconectar();
        }

        public function selectId($id){
            $sql = "select * from tbl_categoria_ingrediente where id=".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            if($rs=$select->fetch(PDO::FETCH_ASSOC)){

                $listIngrediente = new categoriaIngrediente();
                $listIngrediente->id = $rs['id'];
    //            $listIngrediente->idCatIngredienteP = $rs['id_categoria_ingrediente_parent'];
                $listIngrediente->descricao = $rs['descricao'];
                $listIngrediente->titulo = $rs['titulo'];
                $listIngrediente->foto = $rs['foto'];
                $listIngrediente->ativo = $rs['ativo'];

                $conex = new mysql_db();
                $PDO_conex = $conex->conectar();
                if($PDO_conex->query($sql))
                    echo('');
                else
                    echo "<script>alert('Erro ao buscar informações no sistema. Tente novamente ou contate o técnico.'); window.location = 'categorias-ingredientes.php';</script>";

                $conex->desconectar();

                return $listIngrediente;
            }
        }

    //    public function selectSub(){
    //        $listSub = null;
    //        $sql = "select id, titulo from tbl_categoria_ingrediente order by id desc";
    //
    //        $conex = new mysql_db();
    //        $PDO_conex = $conex->conectar();
    //        $select = $PDO_conex->query($sql);
    //
    //        $cont=0;
    //        while($rs=$select->fetch(PDO::FETCH_ASSOC))
    //        {
    //            $listSub[] = new categoriaIngrediente();
    //            $listSub[$cont]->id = $rs['id'];
    //            $listSub[$cont]->titulo = $rs['titulo'];
    //
    //            $cont+=1;
    //        }
    //
    //        return $listSub;
    //    }

        public function selectAll(){
            $listCatI = null;

            $sql = "select * from tbl_categoria_ingrediente order by id desc";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            $count=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC)){
                $listCatI[] = new categoriaIngrediente();
                $listCatI[$count]->id = $rs['id'];
    //            $listCatI[$cont]->idCatIngrediente = $rs['id_categoria_ingrediente_parent'];
                $listCatI[$count]->titulo = $rs['titulo'];
                $listCatI[$count]->descricao = $rs['descricao'];
                $listCatI[$count]->foto = $rs['foto'];
                $listCatI[$count]->ativo = $rs['ativo'];

                $count+=1;
            }
            return $listCatI;
        }

        public function delete($id){
            $sql = "delete from tbl_categoria_ingrediente where id=".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:categorias-ingredientes.php');
            else 
                echo "<script>alert('Erro ao excluir informações no sistema. Tente novamente ou contate o técnico.'); window.location = 'categorias-ingredientes.php';</script>";
        }

        public function update($classCatIngrediente){
            $sql = "UPDATE tbl_categoria_ingrediente SET

            titulo = '".$classCatIngrediente->titulo."',
            descricao = '".$classCatIngrediente->descricao."',
            foto = '".$classCatIngrediente->foto."',
            ativo = ".$classCatIngrediente->ativo."
            where id=".$classCatIngrediente->id;

            //echo($sql);

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:categorias-ingredientes.php');
            else
                echo "<script>alert('Erro ao atualizar informações no sistema. Tente novamente ou contate o técnico.'); window.location = 'categorias-ingredientes.php';</script>";

            $conex->desconectar();

        }

        public function active($id){
            $sql = "UPDATE tbl_categoria_ingrediente SET ativo = '1' WHERE id = ".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                header('location:categorias-ingredientes.php');
            else
                echo "<script>alert('Erro ao ativar item no sistema. Tente novamente ou contate o técnico.'); window.location = 'categorias-ingredientes.php';</script>";
        }

        public function desactive($id){
            $sql = "UPDATE tbl_categoria_ingrediente SET ativo = '0' WHERE id = ".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                header('location:categorias-ingredientes.php');
            else
                echo "<script>alert('Erro ao desativar item no sistema. Tente novamente ou contate o técnico.'); window.location = 'categorias-ingredientes.php';</script>";
        }
    }
?>
