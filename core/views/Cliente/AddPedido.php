<div class="row my-3 border-bottom">
    <div class="col-sm-12 col-md-6  px-2">
        <h4 class=""><i class="fas fa-hand-holding fs-5   border rounded-full cards-color p-3 mx-2"></i>Adicionar Pedido</h4>
    </div>
    <div class="col-sm-12 col-md-4"></div>
    <div class="col-sm-12 col-md-2 pt-2">
        <!-- <button class="btn btn-primary border-radius-none" data-bs-toggle="modal" data-bs-target="#NovoProduto"><i class="fa-solid fa-add me-2"></i>Novo</button> -->
    </div>
</div>
<div class="row p-2">
    <form id="modal-form" enctype="" action="<?= !empty($PedidoUnico) ? BASE_URL . 'Main/AtualizarPedido' : BASE_URL . 'Main/RegistarPedido'; ?>">
        <div class="row mb-2  px-2 resp">
        </div>
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <label for="" class="form-label">Categoria</label>
                <input type="hidden" name="id" value="<?= !empty($PedidoUnico) ? $PedidoUnico[0]->id : '' ?>">
                <select name="categoria" id="categoria" class="form-control" placeholder="" data-value="<?= BASE_URL ?>Main/ProdutoEspecidico">
                    <option value="">Escolhe a Categoria</option>
                    <?php if (!empty($categorias)) {
                        foreach ($categorias as $categoria) { ?>
                            <option value="<?= $categoria->id ?>"><?= $categoria->nomeCategoria ?></option>
                    <?php }
                    } ?>
                </select>
            </div>
            <div class="col-sm-12 col-md-6">
                <label for="" class="form-label">Produto</label>
                <select name="produtos" id="produtos" class="form-control" placeholder="" title="Escolhe a categoria do Produto Primeiro">
                    <option value="<?= !empty($PedidoUnico) ? $PedidoUnico[0]->id_produto : '' ?>"><?= !empty($PedidoUnico) ? $PedidoUnico[0]->produto : 'Escolhe o Produto' ?></option>
                </select>
                <input type="hidden" name="cliente" value="<?= $_SESSION['idCliente'] ?>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-12 col-md-6  mt-4 mb-3">
                <!-- <label for="" class="form-label">Descricao</label> -->
                <input type="submit" id="agendar" value="Registar Pedido" class="btn btn-success">
            </div>

            <div class="col-sm-12 col-md-6">
                <label for="" class="form-label">Quantidade Stocke</label>
                <input type="text" name="quantidade" id="" value="<?= !empty($PedidoUnico) ? $PedidoUnico[0]->quantidade : '' ?>" class="form-control">
                <input type="hidden" name="status" value="Em Aberto">
            </div>
        </div>
    </form>
</div>



<!-- Modal Cliente -->