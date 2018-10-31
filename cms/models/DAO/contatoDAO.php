<?php
    class contatoDAO{
        public function __construct(){
            require_once('database.php');
            require_once('../../cms/models/contatoClass.php');
//            require_once('../cms/models/contatoClass.php');
            error_reporting(E_ALL);
            ini_set('display_errors',1);

        }

        public function insert($classContato){
            $sql = "insert into tbl_fale_conosco(
                nome,
                sobrenome,
                email,
                telefone,
                celular,
                assunto,
                observacao) values (
                '".$classContato->nome."',
                '".$classContato->sobrenome."',
                '".$classContato->email."',
                '".$classContato->telefone."',
                '".$classContato->celular."',
                '".$classContato->assunto."',
                '".$classContato->observacao."'
            );";

            $conex = new mysql_db();
            echo($sql);
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:contato.php');
            $conex->desconectar();

        }

        public function selectAll(){
            $listContato = null;
            $sql = "select * from tbl_fale_conosco order by id desc";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            $cont=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC))
            {
                $listContato[] = new Contato();
                $listContato[$cont]->id = $rs['id'];
                $listContato[$cont]->nome = $rs['nome'];
                $listContato[$cont]->sobrenome = $rs['sobrenome'];
                $listContato[$cont]->email = $rs['email'];
                $listContato[$cont]->telefone = $rs['telefone'];
                $listContato[$cont]->celular= $rs['celular'];
                $listContato[$cont]->assunto= $rs['assunto'];
                $listContato[$cont]->observacao = $rs['observacao'];

                $cont+=1;
            }

            return $listContato;
        }

        public function delete($id){
            $sql = "delete from tbl_fale_conosco where id=".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:fale-conosco.php');
        }
    }
?>
