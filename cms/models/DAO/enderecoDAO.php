<?php
    class enderecoDAO{
        public function __construct(){
            //O construtor serve justamente para colocar funções repetidas
            //na classe ou algo especifico, nesse caso, ela sempre irá estar conectando com o banco PORÉM não quer dizer que eu estarei utilizando ela, somente quando eu estiver conectando diretamente das funções que criei ali em baixo
            require_once('dataBase.php');
        }

        public function insert($classMeuEndereco){
            $sql = "insert into tbl_endereco(
            idCidade,
            logradouro,
            numero,
            bairro,
            cep,
            complemento) values (
            '".$classMeuEndereco->logradouro."',
            '".$classMeuEndereco->numero."',
            '".$classMeuEndereco->bairro."',
            '".$classMeuEndereco->cep."',
            '".$classMeuEndereco->complemento."',
            )";

            //Usanndo o PDO
            $conex = new mysql_db();
            //Abre conexão
            $PDO_conex = $conex->conectar();

            if(mysqli_query($PDO_conex, $sql))
                if($PDO_conex->query($sql))
                    header('location:index.php');
                else
                    echo("Erro no script do Insert");

        }

        public function selectId(){

        }

        public function selectAll(){

        }

        public function delete(){

        }

        public function update(){

        }
    }
?>
