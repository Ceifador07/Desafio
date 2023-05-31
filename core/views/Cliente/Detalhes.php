<div class="row my-3 border-bottom">
    <div class="col-sm-12 col-md-6  px-2">
        <h4 class=""><i class="fas fa-users fs-5   border rounded-full cards-color p-3 mx-2"></i>Detalhes do Produto</h4>
    </div>
    <div class="col-sm-12 col-md-2"></div>
    <div class="col-sm-12 col-md-4 pt-2 text-end">

    </div>
</div>
<div class="row px-2">
    <div class="col-md-7 imgs">
        <!-- continuiacao -->
        <img src="<?= BASE_URL ?>public/assets/images/<?= $produtos[0]->images ?>" alt="">
    </div>
    <div class="col-md-5">
        <div class="title border-bottom">
            <h3><?= $produtos[0]->nome ?></h3>
        </div>
        <div class="describe pt-2">
            <p>Categoria : <?= $produtos[0]->categoria ?></p>

        </div>
        <div class="describe">
            <p class="h5 text-muted">Descricao</p>
            <p><?= $produtos[0]->descricao ?></p>
        </div>
        <div class="describe ">
            <p class="">Quantidade em Stocke</p>
            <p><?= $produtos[0]->quantidade ?></p>
        </div>
        <div class="describe pt-2 ">
            <p class="">Preço Por Unidade</p>
            <p><b><?= number_format($produtos[0]->preco, '2') ?></b> MT</p>
        </div>
        <div class="describe ">
            <p class="">Status : <?= $produtos[0]->status ? "Ativo" : "No-Ativo" ?></p>

        </div>
        <div class="row justify-content-end">
            <div class="col-md-6 text-end ">
                <?php if ($produtos[0]->quantidade <= 0) { ?>
                    <button class="btn btn-primary" disabled>Reservado</button> 
                <?php } else { ?>
                    <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#Actual" >Reservar</button>
                <?php } ?>
            </div>
        </div>
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
                            <label for="" class="form-label">Images do Produto</label>
                            <input type="file" name="images" multiple id="" class="form-control">
                            <div class="preview bg-info mt-2 h-50 " style="border-radius:4px"></div>
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