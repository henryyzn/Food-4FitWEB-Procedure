<?php

//Ações do banco
class usuarioDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        require_once('C:\xampp\htdocs\arisCodeProcedural\cms\models\usuarioClass.php');
    }
    public function selectAll(){
        $listPedidos = null;

        $sql="SELECT * FROM tbl_pedido ORDER BY id DESC;";

        //Instancia a classe
        $conex = new mysql_db();
        //Abre a Conexao
        $PDO_conex = $conex->conectar();
        //Executa a query

        $select = $PDO_conex->query($sql);

        $count=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listPedidos[] = new Pedido();
            $listPedidos[$count]->id = $rs['id'];
            $listPedidos[$count]->id_usuario = $rs['id_usuario'];
            $listPedidos[$count]->titulo = $rs['titulo'];
            $listPedidos[$count]->texto = $rs['texto'];
            $listPedidos[$count]->progresso = $rs['progresso'];
            $listPedidos[$count]->data = date('d/m/Y', strtotime($rs['data']));
            $count+=1;
        }
        return $listDiarioBordo;
    }

    public function selectId($id){
        $listUsuario = null;

        $sql = "SELECT id, tipo_pessoa, nome, sobrenome, CONCAT(nome, ' ', sobrenome) AS nome_completo, nome_fantasia, razao_social, email, rg, cpf, cnpj, data_nascimento, genero, telefone, celular, avatar, ativo, insc_estadual FROM tbl_usuario WHERE id = ".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();
        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

            $listUsuario = new Usuario();
            $listUsuario->id = $rs['id'];
            $listUsuario->tipo_pessoa = $rs['tipo_pessoa'];
            $listUsuario->nome = $rs['nome'];
            $listUsuario->sobrenome = $rs['sobrenome'];
            $listUsuario->nome_completo = $rs['nome_completo'];
            $listUsuario->nome_fantasia = $rs['nome_fantasia'];
            $listUsuario->razao_social = $rs['razao_social'];
            $listUsuario->email = $rs['email'];
            $listUsuario->rg = $rs['rg'];
            $listUsuario->cpf = $rs['cpf'];
            $listUsuario->cnpj = $rs['cnpj'];
            $listUsuario->data_nascimento = date('d/m/Y', strtotime($rs['data_nascimento']));
            $listUsuario->genero = $rs['genero'];
            $listUsuario->telefone = $rs['telefone'];
            $listUsuario->celular = $rs['celular'];
            $listUsuario->avatar = $rs['avatar'];
            $listUsuario->ativo = $rs['ativo'];
            $listUsuario->insc_estadual = $rs['insc_estadual'];

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $PDO_conex->query($sql);

            $conex->desconectar();

            return $listUsuario;

        }
    }
}
?>
