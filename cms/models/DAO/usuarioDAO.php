<?php

//Ações do banco
class usuarioDAO {

    //minha classe construtor
    public function __construct(){
        require_once('dataBase.php');
        //require_once('C:\xampp\htdocs\arisCodeProcedural\cms\models\usuarioClass.php');
        @require_once($_SESSION['path'].'cms/models/usuarioClass.php');
        @require_once($_SESSION['path'].'cms/models/enderecoClass.php');
        @require_once($_SESSION['path'].'cms/models/cidadeClass.php');
        @require_once($_SESSION['path'].'cms/models/estadoClass.php');
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
        $sql = "SELECT 
        u.id AS id, 
        u.tipo_pessoa AS tipo_pessoa, 
        u.nome AS nome, 
        u.sobrenome AS sobrenome, 
        CONCAT(u.nome, ' ', u.sobrenome) AS nome_completo, 
        u.nome_fantasia AS nome_fantasia, 
        u.razao_social AS razao_social, 
        u.email AS email, 
        u.rg AS rg, 
        u.cpf AS cpf, 
        u.cnpj AS cnpj, 
        u.data_nascimento AS data_nascimento, 
        u.genero AS genero, 
        u.telefone AS telefone, 
        u.celular AS celular, 
        u.avatar AS avatar, 
        u.ativo AS ativo, 
        u.insc_estadual AS insc_estadual, 
        e.logradouro AS logradouro, 
        e.numero AS numero, 
        e.bairro AS bairro, 
        e.cep AS cep,
        e.complemento AS complemento,
        e.id_cidade AS id_cidade_end,
        c.id AS id_cidade,
        c.cidade AS nome_cidade,
        est.id AS id_estado,
        est.estado AS nome_estado
        FROM tbl_usuario AS u 
        INNER JOIN tbl_usuario_endereco AS ue
        INNER JOIN tbl_endereco AS e
        INNER JOIN tbl_cidade AS c
        INNER JOIN tbl_estado AS est
        WHERE u.id = ue.id_usuario
        AND e.id = ue.id_endereco
        AND e.id_cidade = c.id
        AND c.id_estado = est.id
        AND u.id = '".$id."';";
        
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
            $listUsuario->id_endereco = $rs['id_endereco'];
            $listUsuario->logradouro = $rs['logradouro'];
            $listUsuario->numero = $rs['numero'];
            $listUsuario->bairro = $rs['bairro'];
            $listUsuario->cep = $rs['cep'];
            $listUsuario->complemento = $rs['complemento'];
            $listUsuario->id_cidade_end = $rs['id_cidade_end'];
            $listUsuario->id_cidade = $rs['id_cidade'];
            $listUsuario->nome_cidade = $rs['nome_cidade'];
            $listUsuario->nome_estado = $rs['nome_estado'];

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                echo('');
            else
                echo('<script>alert("Erro ao buscar informações no sistema.</br>Tente novamente ou contate o técnico.");</script>');

            $conex->desconectar();

            return $listUsuario;

        }
    }

    public function update($classUsuario){
        $sql = "UPDATE tbl_usuario SET
        nome = '".$classUsuario->nome."',
        sobrenome = '".$classUsuario->sobrenome."',
        email = '".$classUsuario->email."',
        data_nascimento = '".$classUsuario->data_nascimento."',
        genero = '".$classUsuario->genero."',
        telefone = '".$classUsuario->telefone."',
        celular = '".$classUsuario->celular."',
        avatar = 'assets/archives/avatares/".$classUsuario->avatar."',
        resp_secreta = '".$classUsuario->resposta_secreta."',
        id_pergunta_secreta = '".$classUsuario->pergunta_secreta."'
        where id = ".$classUsuario->id;
        //echo $sql;
        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql)){
            $sql2 = "SELECT * FROM tbl_usuario WHERE id = ".$classUsuario->id;
            $select = $PDO_conex->query($sql2);
            if($rs=$select->fetch(PDO::FETCH_ASSOC)){
                unset($_SESSION['nome_usuario']);
                unset($_SESSION['sobrenome_usuario']);
                unset($_SESSION['email_usuario']);
                unset($_SESSION['dtNasc_usuario']);
                unset($_SESSION['genero_usuario']);
                unset($_SESSION['telefone_usuario']);
                unset($_SESSION['celular_usuario']);
                unset($_SESSION['avatar_usuario']);
                unset($_SESSION['resposta_secreta_usuario']);
                unset($_SESSION['id_pergunta_secreta_usuario']);
                
                $_SESSION['nome_usuario'] = $rs['nome'];
                $_SESSION['sobrenome_usuario'] = $rs['sobrenome'];
                $_SESSION['email_usuario'] = $rs['email'];
                $_SESSION['dtNasc_usuario'] = date('d/m/Y', strtotime($rs['data_nascimento']));
                $_SESSION['genero_usuario'] = $rs['genero'];
                $_SESSION['telefone_usuario'] = $rs['telefone'];
                $_SESSION['celular_usuario'] = $rs['celular'];
                $_SESSION['avatar_usuario'] = $rs['avatar'];
                $_SESSION['resposta_secreta_usuario'] = $rs['resp_secreta'];
                $_SESSION['id_pergunta_secreta_usuario'] = $rs['id_pergunta_secreta'];
                header('location:meu-perfil.php');
            }
        }else{
            echo "<script>alert('Erro ao atualizar informações no sistema. Tente novamente ou contate o técnico.'); window.history.back();</script>";
        }
        
        $conex->desconectar();
    }

    public function deleteImage($id){
        $sql = "UPDATE tbl_usuario SET avatar = 'assets/archives/avatares/padrao.png' WHERE id = ".$id;

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        if($PDO_conex->query($sql))
            $sql2 = "SELECT avatar FROM tbl_usuario WHERE id = ".$id;
            $select = $PDO_conex->query($sql2);
            if($rs=$select->fetch(PDO::FETCH_ASSOC)){
                $listUsuario = new Usuario();
                unset($_SESSION['avatar_usuario']);
                $_SESSION['avatar_usuario'] = $rs['avatar'];
                header('location:meu-perfil.php');
            }else{
                echo "<script>alert('Erro ao deletar informações no sistema. Tente novamente ou contate o técnico.'); window.location = 'editar-perfil.php';</script>";
            }
    }

    public function selectAllUsers(){
        $sql = "SELECT * FROM tbl_usuario ORDER BY id DESC;";

        $conex = new mysql_db();
        $PDO_conex = $conex->conectar();

        $select = $PDO_conex->query($sql);

        $count=0;
        while($rs=$select->fetch(PDO::FETCH_ASSOC)){
        //Cria um objeto array da classe Contato
            $listUsuario[] = new Usuario();
            $listUsuario[$count]->id = $rs['id'];
            $listUsuario[$count]->tipo_pessoa = $rs['tipo_pessoa'];
            $listUsuario[$count]->nome = $rs['nome'];
            $listUsuario[$count]->sobrenome = $rs['sobrenome'];
            $listUsuario[$count]->nome_fantasia = $rs['nome_fantasia'];
            $listUsuario[$count]->razao_social = $rs['razao_social'];
            $listUsuario[$count]->email = $rs['email'];
            $listUsuario[$count]->rg = $rs['rg'];
            $listUsuario[$count]->cpf = $rs['cpf'];
            $listUsuario[$count]->cnpj = $rs['cnpj'];
            $listUsuario[$count]->genero = $rs['genero'];
            $listUsuario[$count]->telefone = $rs['telefone'];
            $listUsuario[$count]->celular = $rs['celular'];
            $listUsuario[$count]->avatar = $rs['avatar'];
            $listUsuario[$count]->ativo = $rs['ativo'];
            $listUsuario[$count]->insc_estadual = $rs['insc_estadual'];
            $listUsuario[$count]->data_nascimento = date('d/m/Y', strtotime($rs['data_nascimento']));
            $count+=1;
        }
        return $listUsuario;
    }
}
?>
