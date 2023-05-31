

<div class="modal fade" id="Actual">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title cliente" id="exampleModalLabel ">Reservar Produto</h5>
                <!-- <div>
                    <button class="btn btn-outline-success editarCliente" data-id="<?= $cliente->id_cliente ?>"><i class="fa-solid fa-edit mx-1"></i>Editar</button>
                    <button class="btn btn-outline-danger focus-none RemoveProduto" data-id="<?= $cliente->id_cliente ?>" data-value="<?=BASE_URL?>Admin/DeletarCliente" ><i class="fa-solid fa-trash mx-1"></i>Delete</button>
                </div> -->
            </div>
            <form id="modal-form" action="<?= BASE_URL ?>Main/RegistarPedido ">
                <div class="modal-body">
                    <div class="row mb-2 resp px-2">
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 ">
                            <label for="" class="form-label">Quantidade</label>
                            <input type="text" name="quantidade" id="" class="form-control">
                            <input type="hidden" name="produtos" id="" value="<?=$produtos[0]->id?>" class="form-control">
                            <input type="hidden" name="cliente" id="" value="<?=$_SESSION['idCliente']?>" class="form-control">
                            <input type="hidden" name="status" id="" value="Em Aberto" class="form-control">
                        </div>
                    </div>
                <div class="col px-2 py-2 mb-3">
                    <input type="submit" id="agendar" value="Reservar" class="btn btn-success">
                    <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>