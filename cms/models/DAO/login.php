<?php
    @session_start();

    class loginDAO{
        public function __construct(){
            require_once('dataBase.php');
            //require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/funcionarioClass.php');
            require_once($_SESSION['path'].'cms/models/funcionarioClass.php');
        }
        public function checkLogin($matricula, $senha){
            $passwd = md5($senha);
            $sql = "SELECT id, nome, sobrenome, CONCAT(nome, ' ', sobrenome) AS nome_completo, email, ativo, matricula, avatar, data_efetivacao, genero, RG, CPF, data_nasc, salario FROM tbl_funcionario WHERE matricula = '".$matricula."' AND senha = '".$passwd."' AND ativo = '1';";
            
            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);
            if($rs=$select->fetch(PDO::FETCH_ASSOC)){
                $listLogin = new funcionario();
                $listLogin->id = $rs['id'];
                $listLogin->nome = $rs['nome'];
                $listLogin->sobrenome = $rs['sobrenome'];
                $listLogin->nome_completo = $rs['nome_completo'];
                $listLogin->email = $rs['email'];
                $listLogin->ativo = $rs['ativo'];
                $listLogin->matricula = $rs['matricula'];
                $listLogin->avatar = $rs['avatar'];
                $listLogin->data_efetivacao = date('d/m/Y', strtotime($rs['data_efetivacao']));
                $listLogin->data_nascimento = date('d/m/Y', strtotime($rs['data_nasc']));
                $listLogin->genero = $rs['genero'];
                $listLogin->salario = $rs['salario'];
                $listLogin->rg = $rs['RG'];
                $listLogin->cpf = $rs['CPF'];
                
                return $listLogin;

                $conex->desconectar();
            }else{
                return null;
            }
        }
    }
?>
