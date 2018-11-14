<?php
    class loginUsuarioDAO{
        public function __construct(){
            require_once('dataBase.php');
            require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/usuarioClass.php');

        }

        public function checkLogin($login, $senha){

            $passwd = md5($senha);

            $sql="SELECT id, nome, sobrenome, CONCAT(nome, ' ', sobrenome) AS nome_completo, email, data_nascimento, cpf, rg, genero, telefone, celular, avatar FROM tbl_usuario WHERE email = '".$login."' AND senha = '".$senha."';";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            if($rs=$select->fetch(PDO::FETCH_ASSOC)){

                $listUsuario = new usuario();
                $listUsuario->id = $rs['id'];
                $listUsuario->nome = $rs['nome'];
                $listUsuario->sobrenome = $rs['sobrenome'];
                $listUsuario->nome_completo = $rs['nome_completo'];
                $listUsuario->email = $rs['email'];
                $listUsuario->data_nascimento = date('d/m/Y', strtotime($rs['data_nascimento']));
                $listUsuario->cpf = $rs['cpf'];
                $listUsuario->rg = $rs['rg'];
                $listUsuario->genero = $rs['genero'];
                $listUsuario->telefone = $rs['telefone'];
                $listUsuario->celular = $rs['celular'];
                $listUsuario->avatar = $rs['avatar'];

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
