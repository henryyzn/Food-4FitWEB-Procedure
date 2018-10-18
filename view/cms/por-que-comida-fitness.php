<span data-page-controller="PorQueComidaFitnessController" data-page-title="Por Que da Comida Fitness" data-menu-link="fit-session"></span>

<div class="saude-wrapper">
    <div class="saude-content" id="porque-lista">
        <div id="page-actions">
            <a href="#" id="btn-adicionar-publicacao">
                <img src="../assets/images/cms/symbols/adicionar.svg" alt="Adicionar">
                <span>Adicionar Publicação</span>
            </a>
        </div>
        <div id="tabela-items" data-crud-list>
            <div class="linha">
                <div class="coluna large">Título</div>
                <div class="coluna medium">Autor</div>
                <div class="coluna medium">Dt. Pub</div>
                <div class="coluna">Opções</div>
            </div>
        </div>
        <div data-crud-template>
            <div class="linha height-100" data-param-id="${id}">
                <div class="coluna large">${titulo}</div>
                <div class="coluna medium">${autor}</div>
                <div class="coluna medium">${data}</div>
                <div class="coluna">
                    <span class="toggle ${checkBoolean(ativo) ? 'desativar' : 'ativar'}"></span><hr>
                    <span class="editar"></span><hr>
                    <span class="excluir"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="saude-content form-generic display-none" id="porque-form">
        <h2 class="padding-top-30px padding-bottom-30px">POR QUE DA COMIDA FITNESS - PUBLICAÇÕES</h2>
        <form action="#" class="form-generic-content padding-left-15px padding-right-15px padding-bottom-15px padding-top-15px" data-crud-form>
            <div class="form-column">
                <label for="titulo" class="label-generic">Título:</label>
                <input type="text" name="titulo" id="titulo" class="input-generic">
            </div>
            <label for="chkdish">Status:</label>
            <div class="switch_box margin-bottom-15px">
                <input type="checkbox" name="ativo" value="1" class="switch-styled">
            </div>
            <div class="form-column">
                <label for="texto">Texto:</label>
                <textarea name="texto" id="texto" class="textarea-generic height-800px" data-sceditor></textarea>
            </div>
            <div class="form-row">
                <span class="margin-right-20px" data-form-cancel>Cancelar</span>
                <div class="btn-generic margin-right-30px" data-form-submit>
                    <span>Salvar</span>
                </div>
            </div>

            <input type="submit" name="submit" class="display-none">
        </form>
    </div>
</div>
