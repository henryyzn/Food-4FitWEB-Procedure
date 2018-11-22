<?php
    class fotoPratoDAO{
        public function __construct(){
            require_once('dataBase.php');
            //require_once('C://models/pratoFotoClass.php');
            require_once($_SESSION['path'].'cms/models/pratoFotoClass.php');
        }

        public function insert($classFotoPrato){
            $sql = "insert into tbl_foto_prato(
                id_prato,
                foto
                ) values (
                '".$classFotoPrato->idPrato."',
                'assets/imagens/pratos/".$classFotoPrato->foto."'
            );";

            echo($sql);

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:pratos.php');
//                echo('Inseriu com sucesso');
            else
                echo('error');

            $conex->desconectar();

        }

        public function selectId($id){

            $sql = "select * from tbl_foto_prato where id=".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            if($rs=$select->fetch(PDO::FETCH_ASSOC)){
                $listFotoPrato = new pratoFotoClass();
                $listFotoPrato->id = $rs['id'];
                $listFotoPrato->idPrato = $rs['id_prato'];
                $listFotoPrato->foto = $rs['foto'];

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            ($PDO_conex->query($sql));


            $conex->desconectar();

            return $listFotoPrato;

            }

        }

        public function delete($id){
            $sql = "delete from tbl_foto_prato where id=".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                header('location:pratos.php');
//                echo ($sql);
//            else
//                echo ('Erro no banco de dados!');

        }

        public function selectAll(){

            $listFotoPrato = null;
            $sql = "select * from tbl_foto_prato order by id desc";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            $select = $PDO_conex->query($sql);

            $cont=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC)){
                $listFotoPrato[] = new pratoFotoClass();
                $listFotoPrato[$cont]->id=$rs['id'];
                $listFotoPrato[$cont]->idPrato=$rs['id_prato'];
                $listFotoPrato[$cont]->foto=$rs['foto'];
                $cont++;
            }

            return $listFotoPrato;
        }

        public function update($classFotoPrato){
            $sql = "UPDATE tbl_foto_prato SET
                id_prato = '".$classFotoPrato->idPrato."',
                foto = 'assets/imagens/pratos/".$classFotoPrato->foto."'
                where id=".$classFotoPrato->id;

             echo($sql);

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                header('location:pratos.php');
//                echo('Deu certo!');
//            else
//                echo('Deu errado!');

            $conex->desconectar();

        }

    }

?>
