<?php

/**
 Conexão com o Banco de dados
 */

class mysql_db
{
	private $server;
	private $user;
	private $senha;
    private $dataBaseName;

	public function __construct(){
		$this->server="127.0.0.1";
       		$this->user="root";
        	$this->senha="bcd127";
       		$this->dataBaseName="db_food4fit";
	}

	public function conectar()
	{
        try {
            $conexao = new PDO('mysql:host='.$this->server.';charset=utf8;dbname='.$this->dataBaseName,$this->user,$this->senha);
            return $conexao;
        }catch (PDOException $Err)
        {
            echo("Erro na conexão com o banco........................<br>
            <font color='red'>".
            "Linha:" . $Err->getLine().
            "<br> Mensagem de Erro:".$Err->getMessage());



        }

	}
	public function desconectar()
	{
        //Usando PDO
        $conexao = null;

		//mysql_close($this->conexao);

	}

}
