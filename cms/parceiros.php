<div class="parceiros-wrapper">
    <div>
        <div class="btn-generic margin-top-20px margin-bottom-20px margin-right-10px">
            <span>Pendentes</span>
        </div>
        <div class="btn-generic margin-top-20px margin-bottom-20px margin-left-10px">
            <span>Aceitos</span>
        </div>
    </div>
    <table class="cms-table">
        <tr>
            <td><span class="cms-table-title">NOME</span></td>
            <td><span class="cms-table-title">TÍTULO</span></td>
            <td><span class="cms-table-title">DESCRIÇÃO</span></td>
            <td><span class="cms-table-title">LINK</span></td>
            <td colspan="3"><span class="cms-table-title">OPÇÕES</span></td>
        </tr>
        <tr>
            <td><span class="cms-table-result">Nome do Parceiro</span></td>
            <td><span class="cms-table-result">Título do Contato</span></td>
            <td><span class="cms-table-result">Lorem Ipsum is simply dummy text of the printing and...</span></td>
            <td><a href="#" class="cms-table-result">www.sitedoparceiro.com</a></td>
            <td colspan="3">
                <div class="cms-table-opts">
                    <img src="../assets/images/cms/symbols/visualizar.svg" alt="">
                    <hr/>
                    <img src="../assets/images/cms/symbols/excluir.svg" alt="">
                    <hr/>
                    <img src="../assets/images/cms/symbols/direita.svg" alt="">
                </div>
            </td>
        </tr>
    </table>
<!--
    <table class="cms-table">
        <tr>
            <td><span class="cms-table-title" colspan="2">NOME</span></td>
            <td><span class="cms-table-title">TÍTULO</span></td>
            <td><span class="cms-table-title">DESCRIÇÃO</span></td>
            <td><span class="cms-table-title">LINK</span></td>
            <td colspan="3"><span class="cms-table-title">OPÇÕES</span></td>
        </tr>
        <tr>
            <td colspan="2" id="flex">
                <img src="../assets/images/icons/person.jpg" alt="" class="cms-table-img">
                <span class="cms-table-result">Nome do Parceiro</span>
            </td>
            <td><span class="cms-table-result">Título do Contato</span></td>
            <td><span class="cms-table-result">Lorem Ipsum is simply dummy text of the printing and...</span></td>
            <td><a href="#" class="cms-table-result">www.sitedoparceiro.com</a></td>
            <td colspan="3">
                <div class="cms-table-opts">
                    <img src="../assets/images/cms/symbols/editar.svg" alt="">
                    <hr/>
                    <img src="../assets/images/cms/symbols/excluir.svg" alt="">
                    <hr/>
                    <img src="../assets/images/cms/symbols/ativar.svg" alt="">
                </div>
            </td>
        </tr>
    </table>
-->
    <section class="aside-register-menu form-generic">
        <form action="#" class="form-generic-content width-500px">
            <h2 class="form-title">Cadastrar um Parceiro</h2>

            <div data-imagem-upload data-bind="foto">
                <img>
                <label for="foto" class="file-label">Escolher Imagem</label>
                <input id="foto" name="uploadData" type="file" accept="image/*">
            </div>

            <span class="label-fix">Nome do Usuário:</span>
            <p class="label-fix-result">João sei lá das quantas</p>

            <span class="label-fix">Link para o site:</span>
            <a href="" class="label-fix-link">www.linkdoparceiro.com</a>

            <span class="label-fix">Título do Contato:</span>
            <p class="label-fix-result">Algum Título</p>

            <span class="label-fix">Descrição:</span>
            <p class="label-fix-result">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

            <label for="nome" class="label-generic">Nome do Parceiro:</label>
            <input type="text" name="nome" id="nome" class="input-generic">

            <label for="descricao" class="label-generic">Descrição do Parceiro:</label>
            <textarea name="descricao" id="descricao" class="textarea-generic"></textarea>

            <div class="form-row">
                <span>Cancelar</span>
                <div class="btn-generic margin-left-20px">
                    <span>Salvar</span>
                </div>
            </div>
        </form>
    </section>
</div>
