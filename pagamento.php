<?php
    require_once("cms/models/DAO/cartaoDAO.php");
    require_once("cms/models/DAO/enderecoDAO.php");

    require_once(__DIR__ . "/pagarme_php/Pagarme.php");
    PagarMe::setApiKey("ak_test_6ODswd6mGEXZambHL7fq0ctlcBfzbo");

    function validarCPF($cpf) {
        $cpf = preg_replace("/[^0-9]/is", "", $cpf);
        if (strlen($cpf) != 11) {
            return false;
        }
        
        if (preg_match("/(\d)\1{10}/", $cpf)) {
            return false;
        }
        
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        
        return true;
    }

    function realizarPagamento($valor, $idEndereco, $idCartao, $codigoSeguranca) {
        $pessoaJuridica = $_SESSION["tipo_pessoa_usuario"] == "J";
        
        $telefones = array();
        $telefone = "+55" . str_replace(array("(", ")", " ", "-"), "", $_SESSION["telefone_usuario"]);
        if (preg_match('/^\+(?:[0-9] ?){6,14}[0-9]$/', $telefone)) {
            $telefones[] = $telefone;
        }
        
        $celular = "+55" . str_replace(array("(", ")", " ", "-"), "", $_SESSION["celular_usuario"]);
        if (preg_match('/^\+(?:[0-9] ?){6,14}[0-9]$/', $celular)) {
            $telefones[] = $celular;
        }
        
        if (empty($telefones)) {
            $telefones[] = "+551199999999";
        }
        
        $cpf = str_replace(array(".", "-"), "", $_SESSION["cpf_usuario"]);
        if (!validarCPF($cpf)) {
             $cpf = "11111111111";
        }
        
        $cartaoDAO = new cartaoDAO();
        $cartao = $cartaoDAO->selectId($idCartao);
        
        $enderecoDAO = new enderecoDAO();
        $endereco = $enderecoDAO->selectId($idEndereco);
        
        $itens = array();
        foreach ($_SESSION["carrinho"] as $carrinho) {
            $itens[] = array(
                "id" => $carrinho["id_prato"],
                "title" => $carrinho["titulo"],
                "unit_price" => doubleval($carrinho["preco"]) * 100,
                "quantity" => intval($carrinho["quantidade"]),
                "tangible" => true
            );
        }
        
        $transacao = new PagarMe_Transaction(array(
            "amount" => $valor * 100,
            "card_number" => $cartao->numero,
            "card_cvv" => $codigoSeguranca,
            "card_expiration_month" => $cartao->mes_validade,
            "card_expiration_year" => intval($cartao->ano_validade) % 2000,
            "card_holder_name" => $cartao->titular,
            "payment_method" => "credit_card",
            "customer" => array(
                "external_id" => $_SESSION["id_usuario"],
                "name" => $pessoaJuridica ? $_SESSION["razao_social_usuario"] : $_SESSION["nome_usuario"],
                "type" => $pessoaJuridica ? "corporation" : "individual",
                "country" => "br",
                "documents" => array(
                    array(
                        "type" =>$pessoaJuridica ? "cnpj" : "cpf",
                        "number" => $cpf
                    )
                ),
                "phone_numbers" => $telefones,
                "email" => $_SESSION["email_usuario"]
            ),
            "billing" => array(
                "name" => $pessoaJuridica ? $_SESSION["razao_social_usuario"] : $_SESSION["nome_usuario"],
                "address" => array(
                    "country" => "br",
                    "street" => $endereco->logradouro,
                    "street_number" => $endereco->numero,
                    "state" => strtolower($endereco->uf),
                    "city" => $endereco->cidade,
                    "neighborhood" => $endereco->bairro,
                    "zipcode" => str_replace("-", "", $endereco->cep)
                )
            ),
            "items" => $itens
        ));

        try {
            $resultado = $transacao->charge();
            if ($resultado["status"] == "paid") {
                return true;
            } else {
                return false;
            }
            
        } catch (Exception $e) {
            return false;
        }
    }
?>