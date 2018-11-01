<?php
    class cadUsuarioDAO{
        public function __construct(){
            require_once('dataBase.php');
        }

        public function insert($classCadUser){
            $sql = "insert into tbl_usuario(
                 id_pergunta_secreta,
                 tipo_pessoa,
                 nome,
                 sobrenome,
                 nome_fantasia,
                 razao_social,
                 email,
                 rg,
                 cpf,
                 cnpj,
                 data_nascimento,
                 genero,
                 telefone,
                 celular,
                 senha,
                 resp_secreta,
                 avatar,
                 rede_social,
                 token,
                 ativo,
                 email_confirma,
                 insc_estadual,
                 altura,
                 peso) values (
                 '".$classCadUser->tipoPessoa."',
                 '".$classCadUser->nome."',
                 '".$classCadUser->sobrenome."',
                 '".$classCadUser->nome_fantasia."',
                 '".$classCadUser->razao_social."',
                 '".$classCadUser->email."',
                 '".$classCadUser->rg."',
                 '".$classCadUser->cnpj."',
                 '".$classCadUser->dataNasc."',
                 '".$classCadUser->genero."',
                 '".$classCadUser->telefone."',
                 '".$classCadUser->celular."',
                 '".$classCadUser->senha."',
                 '".$classCadUser->respSecreta."',
                 '".$classCadUser->avatar."',
                 '".$classCadUser->redeSocial."',
                 '".$classCadUser->token."',
                 '".$classCadUser->ativo."',
                 '".$classCadUser->emailConfirma."',
                 '".$classCadUser->inscEstadual."',
                 '".$classCadUser->altura."',
                 '".$classCadUser->peso."',
            );";

            $conex = new mysql_db();
            //Teste
            //echo($sql);
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:cadastro-usuario.php');
            $conex->desconectar();
        }
    }
?>
