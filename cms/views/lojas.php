<!DOCTYPE html><html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food 4fit - CMS</title>
        <link rel="icon" type="image/png" href="../assets/images/icons/favicon.png" />
        <link rel="stylesheet" href="../assets/css/cms/stylesheet-cms.css">
	    <link rel="stylesheet" href="../assets/public/css/jquery.toast.min.css">
        <link rel="stylesheet" href="../assets/public/css/sceditor.theme.min.css">
	    <link rel="stylesheet" href="../assets/css/font-style.css">
        <link rel="stylesheet" href="../assets/css/bases.css">
        <link rel="stylesheet" href="../assets/css/sizes.css">
        <link rel="stylesheet" href="../assets/css/align.css">
        <link rel="stylesheet" href="../assets/css/keyframes.css">
    </head>

    <body>
        <section id="main">
            <?php require_once("./components/sidebar.php") ?>
            <div id="main-content">
                <header class="animate fast fadeInDown">
                    <span id="titulo-pagina"></span>
                    <div>
                        <input type="search" placeholder="Pesquise por algo">
                        <img src="../assets/images/cms/icons/pesquisa.svg" alt="Pesquisar">
                    </div>
                    <div>
                        <span id="ultimas-interacoes">Últimas Interações</span>
                        <div id="notificacoes">
                            <img src="../assets/images/cms/icons/notificacoes.svg" alt="Notificações">
                            <span>12</span>
                        </div>
                        <img class="btn-logout" src="../assets/images/cms/icons/sair-navbar.svg" alt="Sair">
                    </div>
                </header>
                <div id="page-content">
                     <form action="#" class="form-generic-content" id="form-loja">
                        <h2 class="form-title">Cadastrar um Local Físico</h2>
                        <label for="logradouro" class="label-generic">Logradouro:</label>
                        <input type="text" name="logradouro" id="logradouro" class="input-generic" placeholder="Ex: R. Ateus">

                        <label for="numero" class="label-generic">Número:</label>
                        <input type="text" name="numero" id="numero" class="input-generic" placeholder="Ex: 438">

                        <label for="bairro" class="label-generic">Bairro:</label>
                        <input type="text" name="bairro" id="bairro" class="input-generic" placeholder="Ex: JD. Gregório Antunes">

                        <label for="estado" class="label-generic">Estado:</label>
                        <select type="text" name="idEstado" id="estado" class="input-generic" placeholder="Ex: São Paulo">
                        <option value="" disabled selected></option>

                        </select>

                        <label for="cidade" class="label-generic">Cidade:</label>
                        <select type="text" name="idCidade" id="cidade" class="input-generic" placeholder="Ex: Olímpia">


                        </select>

                        <label for="cep" class="label-generic">CEP:</label>
                        <input type="text" name="cep" id="cep" class="input-generic" placeholder="Ex: 17745-111">

                        <label for="latitude" class="label-generic">Latitude:</label>
                        <input type="text" name="latitude" id="latitude" class="input-generic" placeholder="Ex:">

                        <label for="Longitude" class="label-generic">Longitude:</label>
                        <input type="text" name="longitude" id="longitude" class="input-generic" placeholder="Ex:">

                        <label for="telefone" class="label-generic">Telefone Fixo:</label>
                        <input type="tel" name="telefone" id="telefone" class="input-generic" placeholder="Ex: (11) 98888-7777">
                        <span id="message" class="padding-bottom-20px">Este será o telefone em que clientes próximos desta instalação irão<br>ligar caso exijam alguma informação.</span>

                        <label for="funcionamento" class="label-generic">Horário de Funcionamento:</label>
                        <textarea name="funcionamento" id="funcionamento" class="textarea-generic"></textarea>
                        <div class="form-row">
                            <button type="submit" class="btn-generic margin-right-20px">
                                <span>Salvar</span>
                            </button>
                            <span class="btn-cancelar">Cancelar</span>
                        </div>
                    </form>
                </div>
            </div>
            <?php require_once("./components/modal.html") ?>
        </section>
    </body>
</html>
