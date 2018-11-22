<?php

//Ações do banco
class ingredientesDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        //require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/ingredientesClass.php');
        require_once($_SESSION['path'].'cms/models/ingredientesClass.php');
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
            'assets/archives/ingredientes/".$classIngredientes->foto."',
            '".$classIngredientes->ativo."');";

            //echo($sql);

            //Instancia a classe
            $conex = new mysql_db();
            //Abre a Conexao
            $PDO_conex = $conex->conectar();

            //Executa a query
            if($PDO_conex->query($sql))
                header('location:ingredientes.php');
            else
                echo('<script>alert("Erro ao inserir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

            $conex->desconectar();
        }

    public function selectId($id){
        $sql="SELECT * FROM tbl_ingrediente WHERE id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

        $listIngredientes = new Ingredientes();
        $listIngredientes->id = $rs['id'];
        $listIngredientes->id_categoria_ingrediente = $rs['id_categoria_ingrediente'];
        $listIngredientes->id_unidade_medida = $rs['id_unidade_medida'];
        $listIngredientes->titulo = $rs['titulo'];
        $listIngredientes->descricao = $rs['descricao'];
        $listIngredientes->preco = $rs['preco'];
        $listIngredientes->valor_energ = $rs['valor_energ'];
        $listIngredientes->carboidratos = $rs['carboidratos'];
        $listIngredientes->proteinas = $rs['proteinas'];
        $listIngredientes->gordura_total = $rs['gordura_total'];
        $listIngredientes->gordura_saturada = $rs['gordura_saturada'];
        $listIngredientes->gordura_trans = $rs['gordura_trans'];
        $listIngredientes->fibra_alimentar = $rs['fibra_alimentar'];
        $listIngredientes->sodio = $rs['sodio'];
        $listIngredientes->foto = $rs['foto'];
        $listIngredientes->ativo = $rs['ativo'];

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        if($PDO_conex->query($sql))
            echo('');
        else
            echo('<script>alert("Erro ao buscar informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

        $conex->desconectar();

        return $listIngredientes;

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

        $sql = "UPDATE tbl_ingrediente SET
        id_categoria_ingrediente = '".$classDicasFitness->id_funcionario."',
        id_unidade_medida = '".$classDicasFitness->titulo."',
        titulo = '".$classDicasFitness->texto."',
        descricao = '".$classDicasFitness->descricao."',
        preco = '".$classDicasFitness->preco."',
        valor_energ = '".$classDicasFitness->valor_energ."',
        carboidratos = '".$classDicasFitness->carboidratos."',
        proteinas = '".$classDicasFitness->proteinas."',
        gordura_total = '".$classDicasFitness->gordura_total."',
        gordura_saturada = '".$classDicasFitness->gordura_saturada."',
        gordura_trans = '".$classDicasFitness->gordura_trans."',
        fibra_alimentar = '".$classDicasFitness->fibra_alimentar."',
        sodio = '".$classDicasFitness->sodio."',
        foto = '".$classDicasFitness->foto."',
        ativo = '".$classDicasFitness->ativo."',
        where id=".$classDicasFitness->id;

        echo($sql);

        //$conex = new mysql_db();
       // $PDO_conex = $conex->conectar();

        //if($PDO_conex->query($sql))
            //header('location:dicas-fitness.php');
        //else
            //echo("<script>alert('Erro ao editar informações.')</script>");

        //$conex->desconectar();

    }

}
?>
