<!DOCTYPE html>
<html>
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
        <section>
            <div class="form-generic">
                <div class="form-generic-content">
                    <h2 class="form-title">Cadastrar uma promoção</h2>

                    <div class="form-column">
                        <label for="titulo" class="label-generic">Prato à receber desconto:</label>
                        <input id="titulo" name="titulo" class="input-generic" required placeholder="Nome do prato">
                    </div>
                    <div class="form-column">
                        <label for="titulo" class="label-generic">Valor atual:</label>
                        <input id="" name="" class="input-generic" required placeholder="R$ 000,00">
                    </div>
                    <div class="form-column">
                        <label for="titulo" class="label-generic">Desconto:</label>
                        <input id="" name="" class="input-generic" required placeholder="Digite um desconto para promoção...">
                    </div>
                    <div class="form-column">
                        <label for="titulo" class="label-generic">Data de término:</label>
                        <input id="" name="" class="input-generic" required placeholder="Digite uma data de trérmino para a promoção...">
                    </div>
                    <div class="form-column">
                        <label for="titulo" class="label-generic">Status inicial da promoção:</label>
                        <div class="switch_box margin-bottom-15px">
                            <input type="checkbox" name="ativo" value="1" class="switch-styled">
                        </div>
                    </div>
                    <div class="form-row">
                        <button type="submit" class="btn-generic margin-right-20px">
                            <span>Salvar</span>
                        </button>
                        <span class="btn-cancelar">Cancelar</span>
                    </div>

                </div>
            </div>
        </section>
    </body>
</html>
