<?php

//Ações do banco
class sobreDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        require_once('../models/sobreClass.php');
    }

    public function insert($classSobreNos){
            $sql = "insert into tbl_sobre_empresa(titulo, texto, foto, ativo) values (
            '".$classSobreNos->titulo."',
            '".$classSobreNos->texto."',
            'assets/images/sobre-nos/".$classSobreNos->foto."',
            '".$classSobreNos->ativo."');";

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
        $sql="select * from tbl_sobre_empresa order by id desc";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $cont=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listSobreNos[] = new Sobre();
            $listSobreNos[$cont]->id = $rs['id'];
            $listSobreNos[$cont]->titulo = $rs['titulo'];
            $listSobreNos[$cont]->texto = $rs['texto'];
            $listSobreNos[$cont]->foto = $rs['foto'];
            $listSobreNos[$cont]->ativo = $rs['ativo'];
            $cont+=1;
        }
        return $listSobreNos;
    }

    public function delete($id){
        $sql = "delete from tbl_sobre_empresa where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:sobre.php');
    }

    public function update(){

    }

}
?>
