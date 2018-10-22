

<div id="form-two-sides">
    <div id="form-left-side" class="no-padding">
        <div id="tabela-items" data-crud-list>
            <div class="linha">
                <div class="coluna full padding-left-15px">Categorias de Ingredientes</div>
            </div>
        </div>
        <div data-crud-template>
            <div class="linha" data-param-id="${id}">
                <div class="coluna image-small">
                    <img src="../${foto}" alt="${titulo}">
                </div>
                <div class="coluna middle-left-align"><span>${titulo}</span></div>
                <div class="coluna">
                    <span class="toggle ${checkBoolean(ativo) ? 'desativar' : 'ativar'}"></span><hr>
                    <span class="editar"></span><hr>
                    <span class="excluir"></span>
                </div>
            </div>
        </div>
    </div>
    <form id="form-right-side" class="form-generic" data-crud-form>
        <div class="form-generic-content">
            <h2 class="form-title margin-left-20px margin-top-20px">Cadastrar uma Categoria</h2>
            <div data-imagem-upload data-bind="foto">
                <img>
                <label for="foto" class="file-label">Escolher Imagem</label>
                <input id="foto" name="uploadData" type="file" accept="image/*">
            </div>
            <div class="margin-right-20px margin-left-20px margin-top-30px">
                <label for="titulo" class="label-generic">Nome</label>
                <input id="titulo" name="titulo" class="input-generic" required placeholder="Ex: Saladas">
            </div>
            <div class="margin-right-20px margin-left-20px margin-top-30px">
                <label for="titulo" class="label-generic">Categoria Pai</label>
                <select id="parent" name="parent" class="input-generic">
                    <option value="" selected>Nenhuma categoria</option>
                    <?= $categorias ?>
                </select>
            </div>
        </div>
        <div>
            <span class="status margin-bottom-10px">Status Inicial desta Categoria:</span>
            <div class="select-block">
                <div class="switch_box">
                    <input type="checkbox" name="ativo" id="ativo" class="switch-styled" value="1">
                </div>
                <label for="ativo" class="padding-left-15px">Ativado/Desativado</label>
            </div>
            <div id="btn-save" data-form-submit>
                <img src="../assets/images/cms/symbols/salvar.svg" alt="Salvar">
                <span>Salvar</span>
            </div>
        </div>
        <input type="submit" class="display-none">
    </form>
</div>
