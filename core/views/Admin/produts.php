<div class="row my-3 border-bottom">
    <div class="col-sm-12 col-md-6  px-2">
        <h4 class=""><i class="fas fa-tasks fs-5   border rounded-full cards-color p-3 mx-2"></i>Produtos</h4>
    </div>
    <div class="col-sm-12 col-md-4"></div>
    <div class="col-sm-12 col-md-2 pt-2">
        <button class="btn btn-primary border-radius-none" data-bs-toggle="modal" data-bs-target="#NovoProduto"><i class="fa-solid fa-add me-2"></i>Novo</button>
    </div>
</div>
<div class="row">
    <div class="table-responsive">
        <table class="table table-triped table-hover" id="example">
            <thead class="bg-dark text-white">
                <tr>
                    <th>#</th>
                    <th>Nome do Produto</th>
                    <th>categoria</th>
                    <th>Quantidade</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($produtos)) {
                    foreach ($produtos as $produto) { ?>
                        <tr>
                            <td><?= $produto->id ?></td>
                            <td><?= $produto->nome ?></td>
                            <td><?= $produto->categoria ?></td>
                            <td><?= $produto->quantidade ?></td>
                            <td><?= $produto->status ? 'Ativo' : 'No-Ativo' ?></td>
                            <td><button class="btn btn-outline-primary actionProduts" data-value="<?= BASE_URL ?>Admin/DadosProduto" data-bs-toggle="modal" data-bs-target="#Actual" data-id="<?= $produto->id ?>"><i class="fa-solid fa-eye me-2"></i>Editar</button>
                                <a href="<?= BASE_URL ?>Admin/Detalhes/<?= $produto->id ?>" class="btn btn-outline-info"><i class="fa-solid fa-info me-2"></i>Detalhe</a>
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
                <div>
                    <button class="btn btn-outline-success editarCliente" data-id="<?= $cliente->id_cliente ?>"><i class="fa-solid fa-edit mx-1"></i>Editar</button>
                    <button class="btn btn-outline-danger focus-none" data-id="<?= $cliente->id_cliente ?>"><i class="fa-solid fa-trash mx-1"></i>Delete</button>
                </div>
            </div>
            <form id="modal-form" action="<?= BASE_URL ?>Admin/RegistarProduts" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mb-2  px-2 resp">
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            <label for="" class="form-label">Nome do Produto</label>
                            <input type="text" name="nome" id="" class="form-control">
                        </div>
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
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            <label for="" class="form-label">Preço</label>
                            <input type="text" name="preco" id="" class="form-control">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="" class="form-label">Quantidade Stocke</label>
                            <input type="text" name="quantidade" id="" class="form-control">

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            <label for="files" class="form-label">Images do Produto</label>
                            <input type="file" name="images" multiple id="" class="form-control files" onchange="displayImg3(this,$(this))">
                            <div class="preview bg-info mt-2 h-50 " style="border-radius:4px">
                                <img src="" alt="" id="cimg" class="img-fluid img-thumbnail bg-gradient-gray" accept="image/png, image/jpeg">
                            </div>
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
   

 