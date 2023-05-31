<div class="row my-3 border-bottom">
    <div class="col-sm-12 col-md-6  px-2">
        <h2 class="fs-3"><i class="fas fa-users fs-4   border rounded-full cards-color p-3 mx-2"></i>Pedidos</h2>
    </div>
    <div class="col-sm-12 col-md-4"></div>
    <div class="col-sm-12 col-md-2 pt-2">
        <a href="<?= BASE_URL?>Cliente/AddPedido" class="btn btn-primary border-radius-none"><i class="fa-solid fa-add me-2"></i>Novo</a>
    </div>
</div>
<div class="row">
    <div class="resp"></div>
    <div class="table-responsive">
        <table class="table table-triped table-hover" id="example">
            <thead class="bg-dark text-white">
                <tr>
                    <th>#</th>
                    <th>Nome do Produto</th>
                    <th>Quantidade</th>
                    <th>Preco</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($pedidos)){
                    $ValorTotal = '';
                     
                    foreach($pedidos as $pedido){ ?>
                <tr>
                    <td><?=$pedido->id?></td>
                    <td><?=$pedido->nome?></td>
                    <td><?=$pedido->quantidade?></td>
                    <?php $total = $pedido->preco * $pedido->quantidade; $x = 0; $ValorTotal = $total; ?>
                    <td><?=number_format($total,2)?> MT</td>
                    
                    <td><?=$pedido->status?></td>
                    <td> <?php if($pedido->status != 'Pago' ){  ?>
                            <a disabled href="<?=BASE_URL?>Cliente/AddPedido/<?= $pedido->id ?>" class="btn btn-outline-success"   ><i class="fa-solid fa-edit me-2"></i>Editar</a>
                        <?php }else{ ?> 
                        <button disabled class="btn btn-outline-success"><i class="fa-solid fa-edit me-2"></i>Editar</button><?php } ?>
                        <button  class="btn btn-outline-danger deletar" data-bs="<?=$pedido->quantidade?>" id="<?=$pedido->id?>" data-id="<?=$pedido->produtos?>"    data-value="<?=BASE_URL?>Main/DeletarPedido" <?= $pedido->status == 'Pago' ? 'disabled' : ''  ?>><i class="fa-solid fa-trash me-2"></i>Delete</button>
                    </td>
                </tr>
                <?php } ?>
                <tfoot>
                    <tr>
                        <td colspan="3">Total</td>
                        <td colspan="3"><?=number_format($ValorTotal,2)?> MT</td>
                    </tr>
                </tfoot>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>