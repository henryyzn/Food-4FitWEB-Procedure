<?php
    class pratosDAO{
        public function __construct(){
            require_once('dataBase.php');
            require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/pratosClass.php');
            require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/categoriaClass.php');
            require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/cadastro-usuarioClass.php');
        }

        public function insert($classPrato){
            $sql1 = "INSERT INTO tbl_prato(id_categoria, titulo, descricao, resumo, preco, confi_public, ativo, id_usuario) values (
                    '".$classPrato->id_categoria."',
                    '".$classPrato->titulo."',
                    '".$classPrato->descricao."',
                    '".$classPrato->resumo."',
                    '".$classPrato->preco."',
                    '".$classPrato->confi_public."',
                    '".$classPrato->ativo."',
                    '".$classPrato->idUsuario."');";
            $sql2 = "INSERT INTO tbl_foto_prato(id_prato, foto) values (
                    LAST_INSERT_ID(),
                    'assets/archives/pratos/".$classPrato->foto."');";
            $sql = "INSERT INTO tbl_prato(id_categoria, titulo, descricao, resumo, confi_public, ativo, id_usuario) values (
                    '".$classPrato->idCategoria."',
                    '".$classPrato->titulo."',
                    '".$classPrato->descricao."',
                    '".$classPrato->resumo."',
                    '".$classPrato->confiPublic."',
                    '".$classPrato->ativo."',
                    1

                    );";

//            echo($sql1);
//            echo($sql2);

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql1)){
                if($PDO_conex->query($sql2))
                    header('location:todos-os-pratos.php');
                else
                    echo('<script>alert("Erro ao inserir informações no sistema. Tente novamente ou contate o técnico.");</script>');
            }else{
                echo('<script>alert("Erro ao inserir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');
            }
            if($PDO_conex->query($sql))
                header('location:pratos.php');
            else
                echo($sql);

            $conex->desconectar();

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
            $sql = "SELECT prato.id AS id, prato.id_categoria AS id_categoria, prato.titulo AS titulo, prato.descricao AS descricao, prato.resumo AS resumo, prato.preco AS preco, prato.ativo AS ativo, prato.confi_public AS confi_public, prato.id_usuario AS id_usuario, foto_prato.id AS id_foto_prato, foto_prato.id_prato AS id_prato, foto_prato.foto AS foto FROM tbl_prato AS prato INNER JOIN tbl_foto_prato AS foto_prato ORDER BY prato.id DESC;";

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
