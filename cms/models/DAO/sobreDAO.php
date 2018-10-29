<?php

//Ações do banco
class sobreDAO {

    //minha classe construtor
    public function __construct(){
        //O construtor serve justamente para colocar funções repetidas
        //na classe ou algo especifico, nesse caso, ela sempre irá estar conectando com o banco PORÉM não quer dizer que eu estarei utilizando ela, somente quando eu estiver conectando diretamente das funções que criei ali em baixo
        require_once('dataBase.php');
        require_once('cms/models/sobreClass.php');
        //Reportando erros na tela
        error_reporting(E_ALL);
        ini_set('display_errors',1);
    }

    public function insert($classSobreNos){
            $sql = "insert into tbl_sobre_nos() values (
            1,
            '".$classMeuEndereco->logradouro."',
            '".$classMeuEndereco->numero."',
            '".$classMeuEndereco->bairro."',
            '".$classMeuEndereco->cep."',
            '".$classMeuEndereco->complemento."'
            );";

            echo($sql);

            //Instancia a classe
            $conex = new mysql_db();
            //Abre a Conexao
            $PDO_conex = $conex->conectar();

            //Executa a query
            if($PDO_conex->query($sql))
                //header('location:index.php');
                echo('Inseriu com sucesso');
            else
                echo('erro no insert');

            $conex->desconectar();
        }

    public function selectId(){

    }

    public function selectAll(){
        $listSobreNos = null;
        $sql="select * from tbl_sobre_nos order by id desc";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $cont=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
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
        return $listSobreNos;
    }

    public function delete($id){
        $sql = "delete from tbl_sobre_nos where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $cnex->conectar();

        if($PDO_conex->query($sql))
            header('location:index.php');
    }

    public function update(){

    }

}
?>
