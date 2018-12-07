<?php
    class cadUsuarioDAO{
        public function __construct(){
            require_once('dataBase.php');
            @require_once($_SESSION['path'].'cms/models/cadastro-usuarioClass.php');
        }

        public function insert($classCadUser){

            if (isset($classCadUser->dataNasc) && $classCadUser->dataNasc) {
                $data = explode("/", $classCadUser->dataNasc);
                $dataNasc = $data[2]."-".$data[0]."-".$data[1];
            } else {
                $dataNasc = null;
            }

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
                 insc_estadual
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
                 " . ($dataNasc ? "'$dataNasc'" : "NULL") . ",
                 '".$classCadUser->genero."',
                 '".$classCadUser->telefone."',
                 '".$classCadUser->celular."',
                 '".$classCadUser->senha."',
                 '".$classCadUser->respSecreta."',
                 '".$classCadUser->inscEstadual."'
            );";

            //Teste sql

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:login.php');

            $conex->desconectar();
        }

        public function selectAll(){
            $listUsuario = null;
            $sql = "select * from tbl_usuario order by id desc";

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            $select = $PDO_conex->query($sql);

            $cont=0;
            while($rs=$select->fetch(PDO::FETCH_ASSOC))
            {
                $listUsuario[] = new cadastroUsuario();
                $listUsuario[$cont]->id = $rs['id'];
                $listUsuario[$cont]->idPerguntaSecreta = $rs['id_pergunta_secreta'];
                $listUsuario[$cont]->tipoPessoa = $rs['tipo_pessoa'];
                $listUsuario[$cont]->nome = $rs['nome'];
                $listUsuario[$cont]->sobrenome = $rs['sobrenome'];
                $listUsuario[$cont]->nome_fantasia = $rs['nome_fantasia'];
                $listUsuario[$cont]->razao_social = $rs['razao_social'];
                $listUsuario[$cont]->email = $rs['email'];
                $listUsuario[$cont]->rg = $rs['rg'];
                $listUsuario[$cont]->cpf = $rs['cpf'];
                $listUsuario[$cont]->cnpj = $rs['cnpj'];
                $listUsuario[$cont]->dataNasc = $rs['data_nascimento'];
                $listUsuario[$cont]->genero = $rs['genero'];
                $listUsuario[$cont]->telefone = $rs['telefone'];
                $listUsuario[$cont]->celular = $rs['celular'];
                $listUsuario[$cont]->senha = $rs['senha'];
                $listUsuario[$cont]->respSecreta = $rs['resp_secreta'];
                $listUsuario[$cont]->avatar = $rs['avatar'];
                $listUsuario[$cont]->redeSocial = $rs['rede_social'];
//                $listUsuario[$cont]->token = $rs['token'];
                $listUsuario[$cont]->ativo = $rs['ativo'];
                $listUsuario[$cont]->inscEstadual = $rs['insc_estadual'];

                $cont+=1;
            }

            return $listUsuario;
        }

        public function delete($id){
            $sql = "delete from tbl_usuario where id=".$id;

            $conex = new mysql_db();
            $PDO_conex = $conex->conectar();
            if($PDO_conex->query($sql))
                header('location:usuarios.php');

        }
    }
?>
