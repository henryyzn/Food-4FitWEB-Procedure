<?php

//Ações do banco
class dicasSaudeDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        //require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/dicas-saudeClass.php');
        require_once($_SESSION['path'].'cms/models/dicas-saudeClass.php');
    }

    public function insert($classDicasSaude){
            $images = array('assets/images/backgrounds/dica-saude/1.jpg', 
            'assets/images/backgrounds/dica-saude/2.jpg', 
            'assets/images/backgrounds/dica-saude/3.jpg', 
            'assets/images/backgrounds/dica-saude/4.jpg', 
            'assets/images/backgrounds/dica-saude/5.jpg', 
            'assets/images/backgrounds/dica-saude/6.jpg', 
            'assets/images/backgrounds/dica-saude/7.jpg', 
            'assets/images/backgrounds/dica-saude/8.jpg', 
            'assets/images/backgrounds/dica-saude/9.jpg',
            'assets/images/backgrounds/dica-saude/10.jpg');

            $sql = "insert into tbl_dica_saude(id_funcionario, titulo, texto, data, ativo, imagem) values (
            '".$classDicasSaude->id_funcionario."',
            '".$classDicasSaude->titulo."',
            '".$classDicasSaude->texto."',
            '".$classDicasSaude->data."',
            '".$classDicasSaude->ativo."',
            '".$images[array_rand($images)]."');";

            //echo($sql);

            //Instancia a classe
            $conex = new mysql_db();
            //Abre a Conexao
            $PDO_conex = $conex->conectar();

            //Executa a query
            if($PDO_conex->query($sql))
                header('location:dicas-saude.php');
            else
                echo('<script>alert("Erro ao inserir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

            $conex->desconectar();
        }

    public function selectId($id){
        $sql="SELECT d.id AS id, d.id_funcionario AS id_funcionario, d.titulo AS titulo, d.texto AS texto, d.imagem AS imagem, d.data AS data, d.ativo AS ativo, CONCAT(f.nome, ' ', f.sobrenome) AS autor FROM tbl_dica_saude AS d INNER JOIN tbl_funcionario AS f WHERE d.id_funcionario = f.id AND d.id = ".$id." ORDER BY d.id DESC;";

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

            $listDicasSaude = new DicasSaude();
            $listDicasSaude->id = $rs['id'];
            $listDicasSaude->id_funcionario = $rs['id_funcionario'];
            $listDicasSaude->titulo = $rs['titulo'];
            $listDicasSaude->texto = $rs['texto'];
            $listDicasSaude->data = date('d/m/Y', strtotime($rs['data']));
            $listDicasSaude->ativo = $rs['ativo'];
            $listDicasSaude->imagem = $rs['imagem'];
            $listDicasSaude->autor = $rs['autor'];

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                echo('');
            else
                echo('<script>alert("Erro ao buscar informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

            $conex->desconectar();

            return $listDicasSaude;
        }
    }

    public function selectAll(){
        $listDicasSaude = null;
        $sql="SELECT * FROM tbl_dica_saude ORDER BY id DESC;";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $count=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listDicasSaude[] = new DicasSaude();
            $listDicasSaude[$count]->id = $rs['id'];
            $listDicasSaude[$count]->id_funcionario = $rs['id_funcionario'];
            $listDicasSaude[$count]->titulo = $rs['titulo'];
            $listDicasSaude[$count]->texto = $rs['texto'];
            $listDicasSaude[$count]->data = date('d/m/Y', strtotime($rs['data']));
            $listDicasSaude[$count]->ativo = $rs['ativo'];
            $listDicasSaude[$count]->imagem = $rs['imagem'];
            $count+=1;
        }
        return $listDicasSaude;
    }

    public function selectAllActive(){
        $listDicasSaude = null;
        $sql="SELECT d.id AS id, d.id_funcionario AS id_funcionario, d.titulo AS titulo, d.texto AS texto, d.imagem AS imagem, d.data AS data, d.ativo AS ativo, CONCAT(f.nome, ' ', f.sobrenome) AS autor FROM tbl_dica_saude AS d INNER JOIN tbl_funcionario AS f WHERE d.id_funcionario = f.id AND d.ativo = 1 ORDER BY d.id DESC;";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $count=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listDicasSaude[] = new DicasSaude();
            $listDicasSaude[$count]->id = $rs['id'];
            $listDicasSaude[$count]->id_funcionario = $rs['id_funcionario'];
            $listDicasSaude[$count]->titulo = $rs['titulo'];
            $listDicasSaude[$count]->texto = $rs['texto'];
            $listDicasSaude[$count]->data = date('d/m/Y', strtotime($rs['data']));
            $listDicasSaude[$count]->ativo = $rs['ativo'];
            $listDicasSaude[$count]->autor = $rs['autor'];
            $listDicasSaude[$count]->imagem = $rs['imagem'];
            $count+=1;
        }
        return $listDicasSaude;
    }

    public function delete($id){
        $sql = "delete from tbl_dica_saude where id=".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:dicas-saude.php');
        else
            echo('<script>alert("Erro ao excluir informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');
    }

    public function update($classDicasSaude){

        $sql = "UPDATE tbl_dica_saude SET
        id_funcionario = '".$classDicasSaude->id_funcionario."',
        titulo = '".$classDicasSaude->titulo."',
        texto = '".$classDicasSaude->texto."',
        data = '".$classDicasSaude->data."',
        ativo = '".$classDicasSaude->ativo."',
        imagem = '".$classDicasSaude->imagem."'
        where id=".$classDicasSaude->id;

        //echo($sql);

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            header('location:dicas-saude.php');
        else
            echo('<script>alert("Erro ao atualizar informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

        $conex->desconectar();

    }

}
?>
