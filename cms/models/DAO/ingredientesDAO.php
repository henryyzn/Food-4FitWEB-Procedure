<?php

//Ações do banco
class ingredientesDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/ingredientesClass.php');
    }

    public function insert($classIngredientes){
            $sql = "insert into tbl_ingrediente(id_categoria_ingrediente, id_unidade_medida, titulo, descricao, preco, valor_energ, carboidratos, proteinas, gordura_total, gordura_saturada, gordura_trans, fibra_alimentar, sodio, foto, ativo) values (
            '".$classIngredientes->id_categoria_ingrediente."',
            '".$classIngredientes->id_unidade_medida."',
            '".$classIngredientes->titulo."',
            '".$classIngredientes->descricao."',
            '".$classIngredientes->preco."',
            '".$classIngredientes->valor_energ."',
            '".$classIngredientes->carboidratos."',
            '".$classIngredientes->proteinas."',
            '".$classIngredientes->gordura_total."',
            '".$classIngredientes->gordura_saturada."',
            '".$classIngredientes->gordura_trans."',
            '".$classIngredientes->fibra_alimentar."',
            '".$classIngredientes->sodio."',
            '".$classIngredientes->foto."',
            '".$classIngredientes->ativo."');";

            echo($sql);

            //Instancia a classe
            //$conex = new mysql_db();
            //Abre a Conexao
            //$PDO_conex = $conex->conectar();

            //Executa a query
            //if($PDO_conex->query($sql))
                //header('location:ingredientes.php');
            //else
                //echo('<script>alert("Erro ao inserir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

            //$conex->desconectar();
        }

    public function selectId($id){
        $sql="select * from tbl_dica_fitness where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

        $listDicasFitness = new DicasFitness();
        $listDicasFitness->id = $rs['id'];
        $listDicasFitness->id_funcionario = $rs['id_funcionario'];
        $listDicasFitness->titulo = $rs['titulo'];
        $listDicasFitness->texto = $rs['texto'];
        $listDicasFitness->data = $rs['data'];
        $listDicasFitness->ativo = $rs['ativo'];

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        if($PDO_conex->query($sql))
            echo('');
        else
            echo('<script>alert("Erro ao buscar informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

        $conex->desconectar();

        return $listDicasFitness;

        }

    }

    public function selectAll(){
        $listIngredientes = null;

        $sql="SELECT * FROM tbl_ingrediente ORDER BY id DESC;";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $cont=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listIngredientes[] = new Ingredientes();
            $listIngredientes[$cont]->id = $rs['id'];
            $listIngredientes[$cont]->id_categoria_ingrediente = $rs['id_categoria_ingrediente'];
            $listIngredientes[$cont]->id_unidade_medida = $rs['id_unidade_medida'];
            $listIngredientes[$cont]->titulo = $rs['titulo'];
            $listIngredientes[$cont]->descricao = $rs['descricao'];
            $listIngredientes[$cont]->preco = $rs['preco'];
            $listIngredientes[$cont]->valor_energ = $rs['valor_energ'];
            $listIngredientes[$cont]->carboidratos = $rs['carboidratos'];
            $listIngredientes[$cont]->proteinas = $rs['proteinas'];
            $listIngredientes[$cont]->gordura_total = $rs['gordura_total'];
            $listIngredientes[$cont]->gordura_saturada = $rs['gordura_saturada'];
            $listIngredientes[$cont]->gordura_trans = $rs['gordura_trans'];
            $listIngredientes[$cont]->fibra_alimentar = $rs['fibra_alimentar'];
            $listIngredientes[$cont]->sodio = $rs['sodio'];
            $listIngredientes[$cont]->foto = $rs['foto'];
            $listIngredientes[$cont]->ativo = $rs['ativo'];
            $cont+=1;
        }
        return $listIngredientes;
    }

    public function delete($id){
        $sql = "delete from tbl_ingrediente where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:ingredientes.php');
    }

    public function update($classDicasFitness){

        $sql = "UPDATE tbl_dica_fitness SET
        id_funcionario = '".$classDicasFitness->id_funcionario."',
        titulo = '".$classDicasFitness->titulo."',
        texto = '".$classDicasFitness->texto."',
        data = '".$classDicasFitness->data."',
        ativo = '".$classDicasFitness->ativo."'
        where id=".$classDicasFitness->id;

        echo($sql);

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:dicas-fitness.php');

        $conex->desconectar();

    }

}
?>
