<?php

//Ações do banco
class sliderDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        //require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/sliderClass.php');
        @require_once($_SESSION['path'].'cms/models/sliderClass.php');
    }

    public function insert($classSlider){
            $sql = "insert into tbl_imagem_slider(imagem, ativo) values (
            'assets/images/slider/".$classSlider->imagem."',
            '".$classSlider->ativo."');";

            echo($sql);

            //Instancia a classe
            $conex = new mysql_db();
            //Abre a Conexao
            $PDO_conex = $conex->conectar();

            //Executa a query
            if($PDO_conex->query($sql))
                header('location:slider.php');
            else
                echo('erro no insert');

            $conex->desconectar();
        }

    public function selectId($id){
        $sql="select * from tbl_sobre_empresa where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

        $listSobreNos = new Sobre();
        $listSobreNos->id = $rs['id'];
        $listSobreNos->titulo = $rs['titulo'];
        $listSobreNos->texto = $rs['texto'];
        $listSobreNos->foto = $rs['foto'];
        $listSobreNos->ativo = $rs['ativo'];


        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        if($PDO_conex->query($sql))
            echo('select no Banco');
        else
            echo('Erro');

        $conex->desconectar();

        return $listSobreNos;

        }


    }

    public function selectAll(){
        $listSlider = null;
        $sql="select * from tbl_imagem_slider order by id desc";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $cont=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listSlider[] = new Slider();
            $listSlider[$cont]->id = $rs['id'];
            $listSlider[$cont]->imagem = $rs['imagem'];
            $listSlider[$cont]->ativo = $rs['ativo'];
            $cont+=1;
        }
        return $listSlider;
    }

    public function delete($id){
        $sql = "delete from tbl_imagem_slider where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:slider.php');
    }

    public function update($classSobreNos){

        $sql = "UPDATE tbl_sobre_empresa SET
        titulo = '".$classSobreNos->titulo."',
        texto = '".$classSobreNos->texto."',
        foto = 'assets/images/sobre-nos/".$classSobreNos->foto."',
        ativo = '".$classSobreNos->ativo."'
        where id=".$classSobreNos->id;

        echo($sql);

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:sobre.php');

        $conex->desconectar();

    }

}
?>
