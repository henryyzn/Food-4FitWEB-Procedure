<?php
    @session_start();
    class catIngredienteDAO{
        public function __construct(){
            require_once('dataBase.php');
//            require_once('caminho-pasta.php');

//            require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/categorias-ingredientesClass.php');

            @require_once($_SESSION['path'].'cms/models/categorias-ingredientesClass.php');
        }

        public function insert($classCatIngrediente){
            $sql = "insert into tbl_categoria_ingrediente(
                    titulo,
                    foto,
                    ativo
                    ) values (
                    '".$classCatIngrediente->titulo."',
                    'assets/images/categorias/".$classCatIngrediente->foto."',
                    '".$classCatIngrediente->ativo."'
                    )";

            //echo($sql);

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:categorias-ingredientes.php');
            else
                echo('<script>alert("Erro ao inserir informações no sistema. Tente novamente ou contate o técnico.");</script>');

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
                $listIngrediente->titulo = $rs['titulo'];
                $listIngrediente->foto = $rs['foto'];
                $listIngrediente->ativo = $rs['ativo'];

                $conex = new mysql_db();
                $PDO_conex = $conex->conectar();
                if($PDO_conex->query($sql))
                    echo('');
                else
                    echo('<script>alert("Erro ao buscar informações no sistema. Tente novamente ou contate o técnico.");</script>');

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

            $cont=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC))
            {
                $listCatI[] = new categoriaIngrediente();
                $listCatI[$cont]->id = $rs['id'];
    //            $listCatI[$cont]->idCatIngrediente = $rs['id_categoria_ingrediente_parent'];
                $listCatI[$cont]->titulo = $rs['titulo'];
                $listCatI[$cont]->foto = $rs['foto'];
                $listCatI[$cont]->ativo = $rs['ativo'];

                $cont+=1;
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
                echo('<script>alert("Erro ao excluir informações no sistema. Tente novamente ou contate o técnico.");</script>');
        }

        public function update($classCatIngrediente){
            $sql = "UPDATE tbl_categoria_ingrediente SET

            titulo = '".$classCatIngrediente->titulo."',
            foto = 'assets/imagens/categorias/".$classCatIngrediente->foto."',
            ativo = ".$classCatIngrediente->ativo."
            where id=".$classCatIngrediente->id;

            echo($sql);

                $conex = new mysql_db();
                $PDO_conex = $conex->conectar();
                if($PDO_conex->query($sql))
                    header('location:categorias-ingredientes.php');
                else
                    echo('<script>alert("Erro ao atualizar informações no sistema. Tente novamente ou contate o técnico.");</script>');

                $conex->desconectar();

            }

        public function active($id){
            $sql = "UPDATE tbl_categoria_ingrediente SET ativo = '1' WHERE id = ".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                header('location:categorias-ingredientes.php');
            else
                echo('<script>alert("Erro ao ativar item no sistema.</br>Tente novamente ou contate o técnico.");</script>');
        }

        public function desactive($id){
            $sql = "UPDATE tbl_categoria_ingrediente SET ativo = '0' WHERE id = ".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                header('location:categorias-ingredientes.php');
            else
                echo('<script>alert("Erro ao desativar item no sistema.</br>Tente novamente ou contate o técnico.");</script>');
        }
    }
?>
