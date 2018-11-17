<?php
    class contatoDAO{

        //Criei uma variavel chamada $requestFront
        //da qual por padrão (que eu optei) começa com false
        //ele será útil para fazer a chamada/requisição
        //das páginas que são iguais, PORTANTO
        //acabam sendo em caminhos diferentes
        public function __construct($requestFront = false){
            require_once('database.php');

            if($requestFront==true)
                require_once('cms/models/contatoClass.php');
            else
                require_once('../models/contatoClass.php');

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
            //Teste
            //echo($sql);
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:contato.php');
            $conex->desconectar();

        }

        public function selectAll(){
            $listContato = null;
            $sql = "select id, CONCAT(nome, ' ', sobrenome) AS nome, email, telefone, celular, assunto, observacao from tbl_fale_conosco order by id desc";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            $cont=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC))
            {
                $listContato[] = new Contato();
                $listContato[$cont]->id = $rs['id'];
                $listContato[$cont]->nome = $rs['nome'];
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

        public function contador(){
            $rows = null;

            $sql="SELECT COUNT(*) AS total FROM tbl_fale_conosco;";

            //Instancia a classe
            $conex = new mysql_db();
            //Abre a Conexao
            $PDO_conex = $conex->conectar();
            //Executa a query

            $select = $PDO_conex->query($sql);

            $count=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC)){
            //Cria um objeto array da classe Contato
                $rows[] = new Contato();
                $rows[$count]->total = $rs['total'];
                $count+=1;
            }
            return $rows;
        }
    }
?>
