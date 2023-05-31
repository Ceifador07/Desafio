 <!-- Modal Cliente -->


 <div class="modal fade" id="Actual">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Dados Do Produto</h5>
                 <div>
                     <!-- <button class="btn btn-outline-success ShowEditar" data-id="<?= $cliente->id_cliente ?>"><i class="fa-solid fa-edit mx-1"></i>Editar</button> -->
                     <button class="btn btn-outline-danger focus-none RemoveProduto" data-id="<?= $produtos[0]->id ?>" data-value="<?= BASE_URL ?>Admin/DeletarProduto" id="0"><i class="fa-solid fa-trash mx-1"></i>Delete</button>
                 </div>
             </div>
             <form id="modal-form" action="<?= BASE_URL ?>Admin/ActualizarProduto" enctype="multipart/form-data">
                 <div class="modal-body">
                     <div class="row mb-2  px-2 resp">
                     </div>
                     <div class="row mb-3">
                         <div class="col-sm-12 col-md-6">
                             <label for="" class="form-label">Nome do Produto</label>
                             <input type="text" name="nome" id="ProdutoNome" class="form-control">
                             <input type="hidden" name="id_Produto" id="id_Produto" class="form-control">
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
                             <input type="text" name="preco" id="Preco" class="form-control">
                         </div>
                         <div class="col-sm-12 col-md-6">
                             <label for="" class="form-label">Quantidade Stocke</label>
                             <input type="text" name="quantidade" id="quantidade" class="form-control">

                         </div>
                     </div>
                     <div class="row mb-3">
                         <div class="col-sm-12 col-md-6">
                             <label for="files" class="form-label">Images do Produto</label>
                             <input type="file" name="images" multiple id="" class="form-control files" onchange="displayImg3(this,$(this))">
                             <div class="preview bg-info mt-2 h-50 " style="border-radius:4px">
                                 <img src="" alt="" id="cimgs" class="img-fluid img-thumbnail bg-gradient-gray">
                             </div>
                         </div>
                         <div class="col-sm-12 col-md-6">
                             <label for="" class="form-label">Descricao</label>
                             <textarea name="descricao" id="descricao" cols="4" rows="5" class="form-control" ></textarea>
                         </div>
                     </div>
                 </div>
                 <div class="col px-2 py-2 mb-3">
                     <input type="submit" id="agendar" value="Actualizar" class="btn btn-success EditarProduto">
                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                 </div>
             </form>
         </div>
     </div>
 </div>