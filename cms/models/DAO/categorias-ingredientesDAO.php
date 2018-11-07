<?php
    class catIngredienteDAO{
        public function __construct(){
            require_once('database.php');
            require_once('../models/categorias-ingredientesClass.php');
        }



    public function insert($classCatIngrediente){
        $sql = "insert into tbl_categoria_ingrediente(
                id_categoria_ingrediente_parent,
                titulo,
                foto,
                ativo
                ) values (
                '".$classCatIngrediente->$idCatIngredienteP."',
                'assets/imagens/categorias/".$classCatIngrediente->foto."',
                '".$classCatIngrediente->titulo."',
                '".$classCatIngrediente->ativo."',
                )";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:categorias-ingredientes.php');

            $conex-desconectar();
    }

    public function selectId($id){
       $sql = "select * from tbl_categoria_ingrediente where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

            $listIngrediente = new categoriaIngrediente();
            $listIngrediente->id = $rs['id'];
            $listIngrediente->idCatIngredienteP = $rs['id_categoria_ingrediente_parent'];
            $listIngrediente->titulo = $rs['titulo'];
            $listIngrediente->ativo = $rs['ativo'];

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                echo('select no Banco');
            else
                echo('Erro');

            $conex->desconectar();

            return $listIngrediente;

        }


    }

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
            $listCatI[$cont]->idCatIngrediente = $rs['id_categoria_ingrediente_parent'];
            $listCatI[$cont]->titulo = $rs['titulo'];
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

    }

    public function update($classCatIngrediente){
        $sql = "UPDATE tbl_categoria_ingrediente SET
        id_categoria_ingrediente_parent = ".$classCatIngrediente->idCatIngredienteP.",
        titulo = '".$idCatIngredienteP->titulo."',
        foto = 'assets/imagens/categorias".$idCatIngredienteP->foto."',
        ativo = ".$classCatIngrediente->ativo.",
        where id=".$classCatIngrediente->id;

        //            echo($sql);

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:categorias-ingredientes.php');
//                echo('Deu certo!');
//            else
//                echo('Deu errado!');

            $conex->desconectar();

        }


    }



?>
