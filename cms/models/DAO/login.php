<?php
    class loginDAO{
        public function __construct(){
             require_once('dataBase.php');
            require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/loginClass.php');

        }

        public function checkLogin($matricula, $senha){

            $passwd = md5($senha);

            $sql="SELECT id, nome, sobrenome, CONCAT(nome, ' ', sobrenome) AS nome_completo, email, ativo, matricula, avatar FROM tbl_funcionario WHERE matricula = '".$matricula."' AND senha = '".$passwd."' AND ativo = '1';";

            //echo($sql);

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            if($rs=$select->fetch(PDO::FETCH_ASSOC)){

                $listLogin = new Login();
                $listLogin->id = $rs['id'];
                $listLogin->nome = $rs['nome'];
                $listLogin->sobrenome = $rs['sobrenome'];
                $listLogin->nome_completo = $rs['nome_completo'];
                $listLogin->email = $rs['email'];
                $listLogin->ativo = $rs['ativo'];
                $listLogin->matricula = $rs['matricula'];
                $listLogin->avatar = $rs['avatar'];

                $conex = new mysql_db();
                $PDO_conex = $conex->conectar();
                if($PDO_conex->query($sql))
                    echo('');
                else
                    echo('<script>alert("Erro ao realizar login no sistema. Tente novamente ou contate o técnico.");</script>');

                $conex->desconectar();

                return $listLogin;

            }else{
                echo "<script>alert('Erro ao realizar login no sistema. Tente novamente ou contate o técnico.'); window.location = 'login.php';</script>";
            }
        }
    }
?>
