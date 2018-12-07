<?php
@session_start();
//Ações do banco
class pratoIngredienteDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        //require_once('C:\xampp\htdocs\arisCodeProcedural\cms\models\pedidoClass.php');
        @require_once($_SESSION['path'].'cms/models/prato-ingredienteClass.php');
    }

    public function selectAllIngredientes($id_prato){
        $listIngredientes = null;

        $sql="SELECT ingrediente.titulo FROM tbl_prato_ingrediente AS prato_ingrediente INNER JOIN tbl_ingrediente AS ingrediente ON ingrediente.id = prato_ingrediente.id_ingrediente WHERE prato_ingrediente.id_prato = '".$id_prato."';";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query
        $select = $PDO_conex->query($sql);

        $count=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listIngredientes[] = new PratoIngrediente();
            $listIngredientes[$count]->titulo = $rs['titulo'];
            $count+=1;
        }
        return $listIngredientes;
    }
    public function selectAllNutrientes($id_prato){
        $listIngredientes = null;

        $sql="SELECT distinct
        SUM(ingrediente.valor_energ) AS valor_energ,
        SUM(ingrediente.carboidratos) AS carboidratos,
        SUM(ingrediente.proteinas) AS gordura_total,
        SUM(ingrediente.gordura_saturada) AS gordura_saturada,
        SUM(ingrediente.gordura_trans) AS gordura_trans,
        SUM(ingrediente.fibra_alimentar) AS fibra_alimentar,
        SUM(ingrediente.proteinas) AS proteinas,
        SUM(ingrediente.sodio) AS sodio
        FROM tbl_ingrediente AS ingrediente
        INNER JOIN tbl_prato_ingrediente AS prato_ingrediente
        WHERE prato_ingrediente.id_prato = '".$id_prato."';";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query
        $select = $PDO_conex->query($sql);

        $count=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listIngredientes[] = new PratoIngrediente();
            $listIngredientes[$count]->valor_energ = $rs['valor_energ'];
            $listIngredientes[$count]->carboidratos = $rs['carboidratos'];
            $listIngredientes[$count]->gordura_total = $rs['gordura_total'];
            $listIngredientes[$count]->gordura_saturada = $rs['gordura_saturada'];
            $listIngredientes[$count]->gordura_trans = $rs['gordura_trans'];
            $listIngredientes[$count]->proteinas = $rs['proteinas'];
            $listIngredientes[$count]->fibra_alimentar = $rs['fibra_alimentar'];
            $listIngredientes[$count]->sodio = $rs['sodio'];
            $count+=1;
        }
        return $listIngredientes;
    }
}
?>
