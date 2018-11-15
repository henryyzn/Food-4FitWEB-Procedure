<?php

//Ações do banco
class pesquisaDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        require_once('C:\xampp\htdocs\arisCodeProcedural\cms\models\pesquisaClass.php');
    }

    public function selectSearch($search){
        $listPesquisa = null;

        $sql = "SELECT prato.id as id, prato.titulo as titulo, fotoprato.foto as foto FROM tbl_prato as prato INNER JOIN tbl_foto_prato as fotoprato WHERE prato.id = fotoprato.id_prato AND titulo LIKE '%".$search."' UNION SELECT id, titulo, foto FROM tbl_ingrediente WHERE titulo LIKE '%".$search."' UNION SELECT id, titulo, foto FROM tbl_categoria WHERE titulo LIKE '%".$search."' UNION SELECT id, titulo, foto FROM tbl_categoria_ingrediente WHERE titulo LIKE '%".$search."';";
        //echo $sql;
        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $cont=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listPesquisa[] = new Pesquisa();
            $listPesquisa[$cont]->id = $rs['id'];
            $listPesquisa[$cont]->titulo = $rs['titulo'];
            $listPesquisa[$cont]->foto = $rs['foto'];
            $cont+=1;
        }
        return $listPesquisa;
    }

}
?>
