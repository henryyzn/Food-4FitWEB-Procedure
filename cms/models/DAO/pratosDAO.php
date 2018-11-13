<?php
    class pratosDAO{
        public function __construct(){
            require_once('dataBase.php');
            require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/pratosClass.php');
            require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/categoriaClass.php');
            require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/cadastro-usuarioClass.php');
        }

        public function insert ($classPrato){
            $sql = "insert into tbl_prato(
                    id_categoria,
                    titulo,
                    descricao,
                    resumo,
                    ativo,
                    id_usuario) values (
                    '".$classPrato->id_categoria."',
                    '".$classPrato->titulo."',
                    '".$classPrato->descricao."',
                    '".$classPrato->resumo."',
                    '".$classPrato->ativo."',
            );";
            //idCategoria NÃO esta vindo, verificar
            echo($sql);

//            $conex = new mysql_db();
//            $PDO_conex = $conex->conectar();
//            if($PDO_conex->query($sql))
//                header('location:add-prato.php');
////                echo('Inseriu com sucesso');
//            else
//                echo('error');
//
//            $conex->desconectar();

        }

        public function selectId($id){
            $sql = "select * from tbl_prato where id=".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            if($rs=$select->fetch(PDO::FETCH_ASSOC)){

                $listPrato = new Prato();
                $listPrato->id = $rs['id'];
                $listPrato->idCategoria = $rs['id_categoria'];
                $listPrato->titulo = $rs['titulo'];
                $listPrato->descricao = $rs['descricao'];
                $listPrato->resumo = $rs['resumo'];
                $listPrato->ativo = $rs['ativo'];

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                echo('select no Banco');
            else
                echo('Erro');

            $conex->desconectar();

            return $listPrato;

            }

        }

        public function selectAll(){
            $listSelecPrato = null;
            $sql = "select * from tbl_prato order by id desc";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            $cont=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC))
            {
                $listSelecPrato[] = new Prato();
                $listSelecPrato[$cont]->id = $rs['id'];
                $listSelecPrato[$cont]->idCategoria = $rs['id_categoria'];
                $listSelecPrato[$cont]->titulo = $rs['titulo'];
                $listSelecPrato[$cont]->descricao = $rs['descricao'];
                $listSelecPrato[$cont]->resumo = $rs['resumo'];
                $listSelecPrato[$cont]->ativo = $rs['ativo'];
                $listSelecPrato[$cont]->idUsuario = $rs['id_usuario'];

                $cont+=1;
            }

            return $listSelecPrato;
        }

        public function delete($id){
            $sql = "delete from tbl_prato where id=".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            echo ($sql);
            if($PDO_conex->query($sql))
//                header('location:add-prato.php');
                echo ($sql);
            else
                echo ('Erro no banco de dados!');
        }

        public function update($classPrato){

            $sql = "UPDATE tbl_endereco SET id_categoria =
            ".$classPrato->idCategoria.", titulo =
            '".$classPrato->titulo."', descricao =
            '".$classPrato->descricao."', resumo =
            '".$classPrato->resumo."', ativo =
            '".$classPrato->ativo."', id_usuario =
            '".$classPrato->idUsuario."'
            where id=".$classPrato->id;

            echo($sql);

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                header('location:add-prato.php');
//                echo('Deu certo!');
//            else
//                echo('Deu errado!');

            $conex->desconectar();

        }

    }
?>
