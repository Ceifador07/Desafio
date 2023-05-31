<div class="row my-3 border-bottom">
    <div class="col-sm-12 col-md-6  px-2">
        <h4 class=""><i class="fas fa-hand-holding fs-5   border rounded-full cards-color p-3 mx-2"></i>Pedidos</h4>
    </div>
    <div class="col-sm-12 col-md-4"></div>
    <div class="col-sm-12 col-md-2 pt-2">
        <a href="<?=BASE_URL?>Admin/AddPedido" class="btn btn-primary border-radius-none" ><i class="fa-solid fa-add me-2"></i>Novo</a>
    </div>
</div>
<div class="row">
    <div class="table-responsive">
        <table class="table table-triped table-hover" id="example">
            <thead class="bg-dark text-white">
                <tr>
                    <th>#</th>
                    <th>Nome do Produto</th>
                    <th>Cliente</th>
                    <th>Quantidade</th>
                    <th>Estado</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($Pedidos)) {
                    foreach ($Pedidos as $Pedido) { ?>
                        <tr>
                            <td><?= $Pedido->id ?></td>
                            <td><a href="<?=BASE_URL?>Admin/DetalheCliente/<?= $Pedido->id_cliente ?>"><?= $Pedido->cliente ?></a></td>
                            <td><?= $Pedido->produto ?></td>
                            <td><?= $Pedido->quantidade ?></td>
                            <td>
                                <select name="status" id="Estado" class="form-control" data-id="<?= $Pedido->id ?>"  data-value="<?=BASE_URL?>Main/EstadoPedido" >
                                    <option value="<?= $Pedido->status ?>" ><?= $Pedido->status ?></option>
                                    <option value="Em Aberto" >Em Aberto</option>
                                    <option value="Pago" >Pago</option>
                                    <option value="Cancelado" >Cancelado</option>
                                </select>
                            </td>
                            <td>
                                <a href="<?=BASE_URL?>Admin/AddPedido/<?= $Pedido->id ?>" class="btn btn-outline-primary"><i class="fa-solid fa-edit me-2"></i>Editar</a>
                                
                                <button class="btn btn-outline-danger deletar" id="<?= $Pedido->id_produto ?>"  data-id="<?= $Pedido->id ?>"  data-value="<?=BASE_URL?>Main/DeletarPedido" ><i class="fa-solid fa-trash me-2"></i>Deletar</button>

                                <a href="<?=BASE_URL?>Admin/DetalhePedido/<?= $Pedido->id_cliente ?>" class="btn btn-outline-success  " id="<?= $Pedido->id_produto ?>"  data-id="<?= $Pedido->id ?>"  data-value="<?=BASE_URL?>Main/DeletarPedido" ><i class="fa-solid fa-eye me-2"></i>Detalhes</a>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</div>



<!-- Modal Cliente -->


<div class="modal fade" id="NovoProduto">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registar Novo Produto</h5>
            </div>
            <form id="modal-form" action="<?= BASE_URL ?>Admin/RegistarProduts" enctype="">
                <div class="modal-body">
                    <div class="row mb-2  px-2 resp">
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            <label for="" class="form-label">Produto</label>
                            <select name="categoria" id="" class="form-control" placeholder="">
                                <option value="">Escolhe a Produto</option>
                                <?php if (!empty($categorias)) {
                                    foreach ($categorias as $categoria) { ?>
                                        <option value="<?= $categoria->id ?>"><?= $categoria->nomeCategoria ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="" class="form-label">Cliente</label>
                            <select name="categoria" id="" class="form-control" placeholder="">
                                <option value="">Escolhe o Cliente</option>
                                <?php if (!empty($categorias)) {
                                    foreach ($categorias as $categoria) { ?>
                                        <option value="<?= $categoria->id ?>"><?= $categoria->nomeCategoria ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                        <label for="" class="form-label">Categoria</label>
                            <select name="categoria" id="" class="form-control" placeholder="">
                                <option value="">Escolhe a Categoria</option>
                                <?php if (!empty($categorias)) {
                                    foreach ($categorias as $categoria) { ?>
                                        <option value="<?= $categoria->id ?>"><?= $categoria->nomeCategoria ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="" class="form-label">Quantidade Stocke</label>
                            <input type="text" name="quantidade" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                        <label for="" class="form-label">Status</label>
                        <select name="status" id="" class="form-control" placeholder="">
                                <option value="Em Aberto">Em Aberto</option>
                                <option value="Pago ">Pago </option>
                                <option value="Cancelado">Cancelado</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="" class="form-label">Descricao</label>
                            <textarea name="descricao" id="" cols="4" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col px-2 py-2 mb-3">
                    <input type="submit" id="agendar" value="Registar" class="btn btn-success">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>