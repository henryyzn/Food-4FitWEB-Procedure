<?php
    class pratosDAO{
        public function __construct(){
            require_once('dataBase.php');
            //require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/pratosClass.php');
            //require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/categoriaClass.php');
            //require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/ingredientesClass.php');
            //require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/cadastro-usuarioClass.php');
            @require_once($_SESSION['path'].'cms/models/pratosClass.php');
            @require_once($_SESSION['path'].'cms/models/categoriaClass.php');
            @require_once($_SESSION['path'].'cms/models/cadastro-usuarioClass.php');

            error_reporting(E_ALL);
            ini_set('display_errors',1);
        }

        public function insert($classPrato){
            $sql = "INSERT INTO tbl_prato(id_categoria, titulo, descricao, resumo, confi_public, ativo, id_usuario, preco) values ('".$classPrato->id_categoria."',
                    '".$classPrato->titulo."',
                    '".$classPrato->descricao."',
                    '".$classPrato->resumo."',
                    '".$classPrato->confiPublic."',
                    '".$classPrato->ativo."',
                    '".$classPrato->id_usuario."',
                    '".$classPrato->preco."');";
            //echo $sql;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql)){
                $_SESSION['last_id'] = $PDO_conex->lastInsertId();

                //echo $_SESSION['last_id'];
                $sql2 = "INSERT INTO tbl_foto_prato (id_prato, foto) VALUES (
                '".$_SESSION['last_id']."',
                'assets/archives/pratos/".$classPrato->foto."');";

                if($PDO_conex->query($sql2)){
                    header("location:pratos.php");
                }else{
                    echo('<script>alert("Erro ao inserir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');
                }
            }else{
                 echo('<script>alert("Erro ao inserir informações no sistema. Tente novamente ou contate o técnico.");</script>');
            }

            $conex->desconectar();
        }
        public function insertIngrediente($classIngrediente){
            $sql = "INSERT INTO tbl_prato_ingrediente(id_prato, id_ingrediente) values (
                    '".$_SESSION['last_id']."',
                    '".$classIngrediente->id_ingrediente."');";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql)){
                header('location:pratos.php');
            }else{
                echo('<script>alert("Erro ao inserir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');
            }
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
            $listSelectPrato = null;

            $sql = "SELECT prato.id AS id, prato.id_categoria AS id_categoria, prato.titulo AS titulo, prato.descricao AS descricao, prato.resumo AS resumo, prato.preco AS preco, prato.ativo AS ativo, prato.confi_public AS confi_public, prato.id_usuario AS id_usuario, foto_prato.id AS id_foto_prato, foto_prato.id_prato AS id_prato, foto_prato.foto AS foto, categoria.titulo AS titulo_categoria FROM tbl_prato AS prato INNER JOIN tbl_foto_prato AS foto_prato INNER JOIN tbl_categoria AS categoria WHERE prato.id = foto_prato.id_prato AND categoria.id = prato.id_categoria ORDER BY prato.id DESC;";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            $count=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC)){
                $listSelectPrato[] = new Prato();
                $listSelectPrato[$count]->id = $rs['id'];
                $listSelectPrato[$count]->idCategoria = $rs['id_categoria'];
                $listSelectPrato[$count]->titulo = $rs['titulo'];
                $listSelectPrato[$count]->descricao = $rs['descricao'];
                $listSelectPrato[$count]->resumo = $rs['resumo'];
                $listSelectPrato[$count]->preco = $rs['preco'];
                $listSelectPrato[$count]->ativo = $rs['ativo'];
                $listSelectPrato[$count]->idUsuario = $rs['id_usuario'];
                $listSelectPrato[$count]->id_foto_prato = $rs['id_foto_prato'];
                $listSelectPrato[$count]->id_prato = $rs['id_prato'];
                $listSelectPrato[$count]->titulo_categoria = $rs['titulo_categoria'];
                $listSelectPrato[$count]->foto = $rs['foto'];

                $count+=1;
            }

            return $listSelectPrato;
        }

        public function selectAllById($id_prato){
            $listSelecPrato = null;

            $sql = "SELECT prato.id AS id, prato.id_categoria AS id_categoria, categoria.titulo AS categoria, prato.titulo AS titulo, prato.descricao AS descricao, prato.resumo AS resumo, prato.preco AS preco, prato.ativo AS ativo, prato.confi_public AS confi_public, prato.id_usuario AS id_usuario, foto_prato.id AS id_foto_prato, foto_prato.id_prato AS id_prato, foto_prato.foto AS foto FROM tbl_prato AS prato INNER JOIN tbl_foto_prato AS foto_prato INNER JOIN tbl_categoria AS categoria ON categoria.id = prato.id_categoria WHERE prato.id = '".$id_prato."' AND prato.id = foto_prato.id_prato ORDER BY prato.id DESC;";
            
            //echo $sql;
            //print_r($value);
            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            $cont=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC))
            {
                $listSelecPrato[] = new Prato();
                $listSelecPrato[$cont]->id = $rs['id'];
                $listSelecPrato[$cont]->idCategoria = $rs['id_categoria'];
                $listSelecPrato[$cont]->categoria = $rs['categoria'];
                $listSelecPrato[$cont]->titulo = $rs['titulo'];
                $listSelecPrato[$cont]->descricao = $rs['descricao'];
                $listSelecPrato[$cont]->resumo = $rs['resumo'];
                $listSelecPrato[$cont]->preco = $rs['preco'];
                $listSelecPrato[$cont]->ativo = $rs['ativo'];
                $listSelecPrato[$cont]->idUsuario = $rs['id_usuario'];
                $listSelecPrato[$cont]->id_foto_prato = $rs['id_foto_prato'];
                $listSelecPrato[$cont]->id_prato = $rs['id_prato'];
                $listSelecPrato[$cont]->foto = $rs['foto'];

                $cont+=1;
            }

            return $listSelecPrato;
        }

        public function delete($id){
            $sql = "DELETE FROM tbl_foto_prato WHERE id_prato = ".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                $sql2 = "DELETE FROM tbl_prato WHERE id = ".$id;
                if($PDO_conex->query($sql2)){
                    header("location:pratos.php");
                }
            else
                echo('<script>alert("Erro ao excluir informações do sistema. Tente novamente ou contate o técnico.");</script>');
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

            //echo($sql);

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                header('location:pratos.php');
            else
                echo('Deu errado!');

            $conex->desconectar();

        }
        public function active($id){
            $sql = "UPDATE tbl_prato SET ativo = '1' WHERE id = ".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql)){
                header("location:pratos.php");
            }else{
                echo('<script>alert("Erro ao ativar item no sistema.</br>Tente novamente ou contate o técnico.");</script>');
            }
        }

        public function desactive($id){
            $sql = "UPDATE tbl_prato SET ativo = '0' WHERE id = ".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql)){
                header("location:pratos.php");
            }else{
                echo('<script>alert("Erro ao desativar item no sistema.</br>Tente novamente ou contate o técnico.");</script>');
            }
        }

    }
?>
