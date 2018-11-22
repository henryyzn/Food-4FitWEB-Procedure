<?php
    class enderecoDAO{
        public function __construct(){
            //O construtor serve justamente para colocar funções repetidas
            //na classe ou algo especifico, nesse caso, ela sempre irá estar conectando com o banco PORÉM não quer dizer que eu estarei utilizando ela, somente quando eu estiver conectando diretamente das funções que criei ali em baixo
            require_once('dataBase.php');
            require_once('cms/models/enderecoClass.php');
            require_once('cms/models/cidadeClass.php');
            require_once('cms/models/estadoClass.php');
            //Reportando erros na tela
            error_reporting(E_ALL);
            ini_set('display_errors',1);
        }

        public function insert($classMeuEndereco){
            $sql = "insert into tbl_endereco(
            id_cidade,
            logradouro,
            numero,
            bairro,
            cep,
            complemento) values (
            '".$classMeuEndereco->idCidade."',
            '".$classMeuEndereco->logradouro."',
            '".$classMeuEndereco->numero."',
            '".$classMeuEndereco->bairro."',
            '".$classMeuEndereco->cep."',
            '".$classMeuEndereco->complemento."'
            );";

           //echo($sql);

           //Instancia a classe
            $conex = new mysql_db();
            //Abre a Conexao
            $PDO_conex = $conex->conectar();

            //Executa a query
            if($PDO_conex->query($sql))
                header('location:meus-enderecos.php');
//                echo('Inseriu com sucesso');
            else
                echo('error');

            $conex->desconectar();

        }

        public function selectId($id){
            $sql="select * from tbl_endereco where id=".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            if($rs=$select->fetch(PDO::FETCH_ASSOC)){

            $listUserEndereco = new Endereco();
            $listUserEndereco->id = $rs['id'];
            $listUserEndereco->logradouro = $rs['logradouro'];
            $listUserEndereco->idCidade = $rs['id_cidade'];
            $listUserEndereco->numero = $rs['numero'];
            $listUserEndereco->bairro = $rs['bairro'];
            $listUserEndereco->cep = $rs['cep'];
            $listUserEndereco->complemento = $rs['complemento'];

                $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                echo('select no Banco');
            else
                echo('Erro');

            $conex->desconectar();

            return $listUserEndereco;

            }


        }

        public function selectAll(){
             $listEndereco = null;
             $sql="select * from tbl_endereco order by id desc";

            //Instancia a classe
            $conex = new mysql_db();
            //Abre a Conexao
            $PDO_conex = $conex->conectar();
            //Executa a query

            $select = $PDO_conex->query($sql);

            $cont=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC))
            {
                //Cria um objeto array da classe Contato
                $listEndereco[] = new Endereco();
                $listEndereco[$cont]->id = $rs['id'];
                $listEndereco[$cont]->logradouro = $rs['logradouro'];
                $listEndereco[$cont]->idCidade = $rs['id_cidade'];
                $listEndereco[$cont]->numero = $rs['numero'];
                $listEndereco[$cont]->bairro = $rs['bairro'];
                $listEndereco[$cont]->cep = $rs['cep'];
                $listEndereco[$cont]->complemento = $rs['complemento'];


                $cont+=1;
            }

            return $listEndereco;
        }

        public function delete($id){
            $sql = "delete from tbl_endereco where id=".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            echo ($sql);
            if($PDO_conex->query($sql))
//                header('location:index.php');
                echo ($sql);
            else
                echo ('Erro no banco de dados!');
        }

        public function update($classMeuEndereco){

            $sql = "UPDATE tbl_endereco SET id_cidade =
            ".$classMeuEndereco->idCidade.", logradouro =
            '".$classMeuEndereco->logradouro."', numero =
            '".$classMeuEndereco->numero."', bairro =
            '".$classMeuEndereco->bairro."', cep =
            '".$classMeuEndereco->cep."'
            where id=".$classMeuEndereco->id;

            echo($sql);

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();

            if($PDO_conex->query($sql))
                header('location:meus-enderecos.php');
//                echo('Deu certo!');
//            else
//                echo('Deu errado!');

            $conex->desconectar();

        }
    }
?>
