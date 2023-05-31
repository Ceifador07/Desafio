

<div class="modal fade" id="eye">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title cliente" id="exampleModalLabel ">Dados do Cliente</h5>
                <div>
                    <button class="btn btn-outline-success editarCliente" data-id="<?= $cliente->id_cliente ?>"><i class="fa-solid fa-edit mx-1"></i>Editar</button>
                    <button class="btn btn-outline-danger focus-none RemoveProduto" data-id="<?= $cliente->id_cliente ?>" data-value="<?=BASE_URL?>Admin/DeletarCliente" ><i class="fa-solid fa-trash mx-1"></i>Delete</button>
                </div>
            </div>
            <form id="modal-form" action="<?= BASE_URL ?>Admin/ActualizarCliente ">
                <div class="modal-body">
                    <div class="row mb-2 resp px-2">

                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            <label for="" class="form-label">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control">
                            <input type="hidden" name="id" id="id_cliente" class="form-control">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="" class="form-label">Apelido</label>
                            <input type="text" name="apelido" id="apelido" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            <label for="" class="form-label">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="" class="form-label">Sexo</label>
                            <select name="sexo" id="sexo" class="form-control">
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="FM">Outros</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            <label for="" class="form-label">Senha</label>
                            <input type="password" name="senha" id="senha" class="form-control" disabled>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="" class="form-label">Status</label>
                            <select name="status" id="ative" class="form-control">
                                <option value="1">Ativo</option>
                                <option value="0">No-Ativo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col px-2 py-2 mb-3">
                    <input type="submit" id="agendar" value="Actualizar" class="btn btn-success buttons">
                    <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>