<?php
    //Conexão PDO com Banco de Dados
    class mysql_db{
        private $server;
        private $user;
        private $senha;
        private $dataBaseName;

        public function __construct(){
            $this->server="localhost";
            $this->user="root";
            $this->senha="";
            $this->dataBaseName="db_food4fit";
        }

        public function conectar(){
            try{
                $conexao = new PDO('mysql:host='.$this->server.';dbname='.$this->dataBaseName,$this->user,$this->senha);
                return $conexao;
            }catch (PDOExpection $Err){
                echo("Erro na conexão com o banco de dados! Informe ao administrador do sistema.");
            }

        }

        public function desconectar(){
            //Usando PDO
            $conexao = null;
            //teste
            //mysql_close($this->conexao);
        }
    }
?>
