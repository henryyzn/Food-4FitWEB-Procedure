<?php
    @session_start();
    
    class loginUsuarioDAO{
        public function __construct(){
            require_once('dataBase.php');
            //require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/usuarioClass.php');
            @require_once($_SESSION['path'].'cms/models/usuarioClass.php');

            error_reporting(E_ALL);
            ini_set('display_errors',1);

        }
        public function selectPerguntas(){
            $listPerguntas = null;
            $sql = "select * from tbl_pergunta_secreta;";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            $count=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC)){
                $listPerguntas[] = new Usuario();
                $listPerguntas[$count]->id = $rs['id'];
                $listPerguntas[$count]->pergunta = $rs['pergunta'];
                $count+=1;
            }

            return $listPerguntas;
        }
        public function checkLogin($login, $senha){

            $passwd = md5($senha);

            $sql = "SELECT
            u.id AS id,
            u.nome AS nome,
            u.sobrenome AS sobrenome,
            CONCAT(u.nome, ' ', u.sobrenome) AS nome_completo,
            u.tipo_pessoa AS tipo_pessoa,
            u.nome_fantasia AS nome_fantasia,
            u.razao_social AS razao_social,
            u.email AS email,
            u.data_nascimento AS data_nascimento,
            u.cpf AS cpf,
            u.cnpj AS cnpj,
            u.rg AS rg,
            u.genero AS genero,
            u.telefone AS telefone,
            u.celular AS celular,
            u.avatar AS avatar,
            u.resp_secreta AS resp_secreta,
            ps.id AS id_pergunta_secreta,
            ps.pergunta AS pergunta_secreta
            FROM tbl_usuario AS u
            INNER JOIN tbl_pergunta_secreta AS ps
            WHERE u.id_pergunta_secreta = ps.id 
            AND u.email = '".$login."'
            AND u.senha = '".$passwd."';";
            
            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            if($rs=$select->fetch(PDO::FETCH_ASSOC)){

                $listUsuario = new usuario();
                $listUsuario->id = $rs['id'];
                $listUsuario->nome = $rs['nome'];
                $listUsuario->sobrenome = $rs['sobrenome'];
                $listUsuario->nome_completo = $rs['nome_completo'];
                $listUsuario->razao_social = $rs['razao_social'];
                $listUsuario->tipo_pessoa = $rs['tipo_pessoa'];
                $listUsuario->nome_fantasia = $rs['nome_fantasia'];
                $listUsuario->email = $rs['email'];
                $listUsuario->data_nascimento = date('d/m/Y', strtotime($rs['data_nascimento']));
                $listUsuario->cpf = $rs['cpf'];
                $listUsuario->cnpj = $rs['cnpj'];
                $listUsuario->rg = $rs['rg'];
                $listUsuario->genero = $rs['genero'];
                $listUsuario->telefone = $rs['telefone'];
                $listUsuario->celular = $rs['celular'];
                $listUsuario->avatar = $rs['avatar'];
                $listUsuario->resp_secreta = $rs['resp_secreta'];
                $listUsuario->pergunta_secreta = $rs['pergunta_secreta'];
                $listUsuario->id_pergunta_secreta = $rs['id_pergunta_secreta'];

                $conex = new mysql_db();
                $PDO_conex = $conex->conectar();
                if($PDO_conex->query($sql))
                    echo('');
                else
                    echo('<script>alert("Erro ao realizar login no sistema. Tente novamente ou contate o técnico.");</script>');

                $conex->desconectar();

                return $listUsuario;

            }else{
                echo "<script>alert('Erro ao realizar login no sistema. Tente novamente ou contate o técnico.'); window.location = 'login.php';</script>";
            }
        }
    }
?>
