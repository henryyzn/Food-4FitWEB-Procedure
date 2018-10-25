<?php
    class enderecoDAO{
        public function __construct(){

        }

        public function insert(){
            $sql = "insert into tbl_endereco(
            idCidade,
            logradouro,
            numero,
            bairro,
            cep,
            complemento) values (
            )";


            $PDO->execute($sql);
        }

        public function selectId(){

        }

        public function selectAll(){

        }

        public function delete(){

        }

        public function update(){

        }
    }
?>



$sql="insert into tblcontatos(
                nome,
                telefone,
                celular,
                email,
                sexo,
                dt_nasc,
                obs) values(
                '".$contato->getNome()."',
                '".$contato->getTelefone()."',
                '".$contato->getCelular()."',
                '".$contato->getEmail()."',
                '".$contato->getSexo()."',
                '".$contato->getDataNasc()."',
                '".$contato->getObs()."'
                )";
