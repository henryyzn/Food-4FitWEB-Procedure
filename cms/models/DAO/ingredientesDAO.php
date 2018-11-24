<?php

//Ações do banco
class ingredientesDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        //require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/ingredientesClass.php');
        @require_once($_SESSION['path'].'cms/models/ingredientesClass.php');
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
                echo "<script>alert('Erro ao inserir informações no sistema. Tente novamente ou contate o técnico.'); window.location = 'ingredientes.php';</script>";

            $conex->desconectar();
        }

    public function selectId($id){
        $sql="SELECT
        i.id AS id_ingrediente,
        i.id_categoria_ingrediente AS id_categoria_ingrediente,
        i.id_unidade_medida AS id_unidade_medida,
        u.unid_medida AS unid_medida,
        u.id AS id_unid_medida,
        u.sigla AS sigla,
        ci.id AS id_c_i,
        ci.titulo AS titulo_cat_ing,
        i.titulo AS titulo,
        i.descricao AS descricao,
        i.preco AS preco,
        i.valor_energ AS valor_energ,
        i.carboidratos AS carboidratos,
        i.proteinas AS proteinas,
        i.gordura_total AS gordura_total,
        i.gordura_saturada AS gordura_saturada,
        i.gordura_trans AS gordura_trans,
        i.fibra_alimentar AS fibra_alimentar,
        i.sodio AS sodio,
        i.foto AS foto,
        i.ativo
        FROM tbl_ingrediente AS i
        INNER JOIN tbl_unidade_medida AS u
        INNER JOIN tbl_categoria_ingrediente AS ci
        WHERE i.id_unidade_medida = u.id
        AND i.id_categoria_ingrediente = ci.id
        AND i.id = ".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

            $listIngredientes = new Ingredientes();
            $listIngredientes->id = $rs['id_ingrediente'];
            $listIngredientes->id_categoria_ingrediente = $rs['id_categoria_ingrediente'];
            $listIngredientes->id_unidade_medida = $rs['id_unid_medida'];
            $listIngredientes->unidade_medida = $rs['unid_medida'];
            $listIngredientes->sigla_unidade_medida = $rs['sigla'];
            $listIngredientes->id_c_i = $rs['id_c_i'];
            $listIngredientes->titulo_cat_ing = $rs['titulo_cat_ing'];
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
                echo "<script>alert('Erro ao buscar informações no sistema. Tente novamente ou contate o técnico.'); window.location = 'ingredientes.php';</script>";

            $conex->desconectar();

            return $listIngredientes;

        }

    }

    public function selectAll(){
        $listIngredientes = null;

        $sql="SELECT
        i.id AS id_ingrediente,
        i.id_categoria_ingrediente AS id_categoria_ingrediente,
        i.id_unidade_medida AS id_unidade_medida,
        u.unid_medida AS unid_medida,
        u.id AS id_unid_medida,
        u.sigla AS sigla,
        ci.id AS id_c_i,
        ci.titulo AS titulo_cat_ing,
        i.titulo AS titulo,
        i.descricao AS descricao,
        i.preco AS preco,
        i.valor_energ AS valor_energ,
        i.carboidratos AS carboidratos,
        i.proteinas AS proteinas,
        i.gordura_total AS gordura_total,
        i.gordura_saturada AS gordura_saturada,
        i.gordura_trans AS gordura_trans,
        i.fibra_alimentar AS fibra_alimentar,
        i.sodio AS sodio,
        i.foto AS foto,
        i.ativo
        FROM tbl_ingrediente AS i
        INNER JOIN tbl_unidade_medida AS u
        INNER JOIN tbl_categoria_ingrediente AS ci
        WHERE i.id_unidade_medida = u.id
        AND i.id_categoria_ingrediente = ci.id
        ORDER BY i.id DESC;";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $count=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listIngredientes[] = new Ingredientes();
            $listIngredientes[$count]->id = $rs['id_ingrediente'];
            $listIngredientes[$count]->id_categoria_ingrediente = $rs['id_categoria_ingrediente'];
            $listIngredientes[$count]->id_unidade_medida = $rs['id_unidade_medida'];
            $listIngredientes[$count]->titulo = $rs['titulo'];
            $listIngredientes[$count]->sigla = $rs['sigla'];
            $listIngredientes[$count]->id_c_i = $rs['id_c_i'];
            $listIngredientes[$count]->unid_medida = $rs['unid_medida'];
            $listIngredientes[$count]->titulo_cat_ing = $rs['titulo_cat_ing'];
            $listIngredientes[$count]->titulo_cat_ing = $rs['titulo_cat_ing'];
            $listIngredientes[$count]->descricao = $rs['descricao'];
            $listIngredientes[$count]->preco = $rs['preco'];
            $listIngredientes[$count]->valor_energ = $rs['valor_energ'];
            $listIngredientes[$count]->carboidratos = $rs['carboidratos'];
            $listIngredientes[$count]->proteinas = $rs['proteinas'];
            $listIngredientes[$count]->gordura_total = $rs['gordura_total'];
            $listIngredientes[$count]->gordura_saturada = $rs['gordura_saturada'];
            $listIngredientes[$count]->gordura_trans = $rs['gordura_trans'];
            $listIngredientes[$count]->fibra_alimentar = $rs['fibra_alimentar'];
            $listIngredientes[$count]->sodio = $rs['sodio'];
            $listIngredientes[$count]->foto = $rs['foto'];
            $listIngredientes[$count]->ativo = $rs['ativo'];
            $count+=1;
        }
        return $listIngredientes;
    }

    public function delete($id){
        $sql = "delete from tbl_ingrediente where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:ingredientes.php');
        else
            echo "<script>alert('Erro ao excluir informações no sistema. Tente novamente ou contate o técnico.'); window.location = 'ingredientes.php';</script>";
    }

    public function update($classIngredientes){

        $sql = "UPDATE tbl_ingrediente SET
        id_categoria_ingrediente = '".$classIngredientes->id_categoria_ingrediente."',
        id_unidade_medida = '".$classIngredientes->id_unidade_medida."',
        titulo = '".$classIngredientes->titulo."',
        descricao = '".$classIngredientes->descricao."',
        preco = '".$classIngredientes->preco."',
        valor_energ = '".$classIngredientes->valor_energ."',
        carboidratos = '".$classIngredientes->carboidratos."',
        proteinas = '".$classIngredientes->proteinas."',
        gordura_total = '".$classIngredientes->gordura_total."',
        gordura_saturada = '".$classIngredientes->gordura_saturada."',
        gordura_trans = '".$classIngredientes->gordura_trans."',
        fibra_alimentar = '".$classIngredientes->fibra_alimentar."',
        sodio = '".$classIngredientes->sodio."',
        foto = '".$classIngredientes->foto."'
        where id=".$classIngredientes->id;

        //echo($sql);

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:ingredientes.php');
        else
            echo "<script>alert('Erro ao atualizar informações no sistema. Tente novamente ou contate o técnico.'); window.location = 'ingredientes.php';</script>";

        $conex->desconectar();

    }
    public function active($id){
        $sql = "UPDATE tbl_ingrediente SET ativo = '1' WHERE id = ".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:ingredientes.php');
        else
            echo "<script>alert('Erro ao ativar item no sistema. Tente novamente ou contate o técnico.'); window.location = 'ingredientes.php';</script>";
    }

    public function desactive($id){
        $sql = "UPDATE tbl_ingrediente SET ativo = '0' WHERE id = ".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:ingredientes.php');
        else
            echo "<script>alert('Erro ao desativar item no sistema. Tente novamente ou contate o técnico.'); window.location = 'ingredientes.php';</script>";
    }

}
?>
