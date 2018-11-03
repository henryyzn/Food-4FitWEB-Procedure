<?php
    class cadUsuarioDAO{
        public function __construct(){
            require_once('dataBase.php');
        }

        public function insert($classCadUser){


            $data = explode("/", $classCadUser->dataNasc);
            $dataNasc = $data[2]."-".$data[0]."-".$data[1];

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
                 resp_secreta
                 ) values (
                 '".$classCadUser->idPerguntaSecreta."',
                 '".$classCadUser->tipoPessoa."',
                 '".$classCadUser->nome."',
                 '".$classCadUser->sobrenome."',
                 '".$classCadUser->nome_fantasia."',
                 '".$classCadUser->razao_social."',
                 '".$classCadUser->email."',
                 '".$classCadUser->rg."',
                 '".$classCadUser->cpf."',
                 '".$classCadUser->cnpj."',
                 '".$dataNasc."',
                 '".$classCadUser->genero."',
                 '".$classCadUser->telefone."',
                 '".$classCadUser->celular."',
                 '".$classCadUser->senha."',
                 '".$classCadUser->respSecreta."'
            );";




            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                //header('location:cadastro-usuario.php');
                echo($sql);
            $conex->desconectar();
        }
    }
?>
