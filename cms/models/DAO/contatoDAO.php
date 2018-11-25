<?php
    @session_start();

    class contatoDAO{

        //Criei uma variavel chamada $requestFront
        //da qual por padrão (que eu optei) começa com false
        //ele será útil para fazer a chamada/requisição
        //das páginas que são iguais, PORTANTO
        //acabam sendo em caminhos diferentes
        public function __construct(){
            require_once('dataBase.php');
            require_once($_SESSION['path'].'cms/models/contatoClass.php');

            error_reporting(E_ALL);
            ini_set('display_errors',1);
        }

        public function insert($classContato){
            $sql = "INSERT INTO tbl_fale_conosco(
                nome,
                sobrenome,
                email,
                telefone,
                celular,
                assunto,
                observacao) VALUES (
                '".$classContato->nome."',
                '".$classContato->sobrenome."',
                '".$classContato->email."',
                '".$classContato->telefone."',
                '".$classContato->celular."',
                '".$classContato->assunto."',
                '".$classContato->observacao."');";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                header('location:contato.php');
            else
                echo "<script>alert('Erro ao inserir informações no sistema. Tente novamente ou contate o técnico.'); window.location = 'contato.php';</script>";

            $conex->desconectar();

        }

        public function selectId($id){
            $sql="SELECT 
            c.id AS id,
            c.nome AS nome,
            c.sobrenome AS sobrenome,
            c.telefone AS telefone,
            c.celular AS celular,
            c.assunto AS assunto,
            c.observacao AS observacao
            FROM tbl_fale_conosco AS c WHERE c.id=".$id;
            
            //echo $sql;
            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            if($rs=$select->fetch(PDO::FETCH_ASSOC)){
                $listContato = new Contato();
                $listContato->id = $rs['id'];
                $listContato->nome = $rs['nome'];
                $listContato->sobrenome = $rs['sobrenome'];
                $listContato->telefone = $rs['telefone'];
                $listContato->celular = $rs['celular'];
                $listContato->assunto = $rs['assunto'];
                $listContato->observacao = $rs['observacao']; 

                $conex = new mysql_db();
                $PDO_conex = $conex->conectar();
                if($PDO_conex->query($sql))
                    echo('');
                else
                    echo "<script>alert('Erro ao buscar informações no sistema. Tente novamente ou contate o técnico.'); window.location = 'fale-conosco.php';</script>";

                $conex->desconectar();

                return $listContato;
            }
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
            else
                echo "<script>alert('Erro ao excluir informações no sistema. Tente novamente ou contate o técnico.'); window.location = 'fale-conosco.php';</script>";
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
