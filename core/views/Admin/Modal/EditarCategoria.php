<div class="modal fade" id="EditarCategoria">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title cliente" id="exampleModalLabel ">Editar Categoria</h5>
               
            </div>
            <form id="modal-form" action="<?= BASE_URL ?>Admin/ActualizarCategoria">
                <div class="modal-body">
                    <div class="row mb-1 resp px-2">
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="" class="form-label">Nome da Categoria</label>
                            <input type="text" name="Nomecategoria" id="Nomecategoria" class="form-control">
                            <input type="hidden" name="id_categoria" id="id_categoria" class="form-control">
                        </div>
                    </div>
                    <div class="row md-3">
                        <div class="col-12">
                            <label for="" class="form-label">Descricao</label>
                            <textarea name="descricao" id="Descricao" cols="4" rows="3" placeholder="Descricao da categoria" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <label for="" class="form-label">Status</label>
                             <select name="status" id="" class="form-control">
                                <option value="1">Ativo</option>
                                <option value="0">No-Ativo</option>
                             </select>
                        </div>
                    </div>
                </div>
                <div class="col px-3 py-2 mb-3">
                    <input type="submit" id="agendar" value="Actualizar" class="btn btn-success">
                    <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>