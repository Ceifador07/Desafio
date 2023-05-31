<div class="row my-3 border-bottom">
    <div class="col-sm-12 col-md-6  px-2">
        <h4 class=""><i class="fas fa-users fs-5   border rounded-full cards-color p-3 mx-2"></i>Dados do Cliente</h4>
    </div>
    <div class="col-sm-12 col-md-2"></div>
    <div class="col-sm-12 col-md-4 pt-2 text-end">
        <button class="btn btn-outline-success VerCliente" data-id="<?= $clientes[0]->id_cliente ?>" data-value="<?= BASE_URL ?>Admin/DadosCliente" data-bs-toggle="modal" data-bs-target="#eye" ><i class="fa-solid fa-edit mx-1"></i>Editar</button>
        <button class="btn btn-outline-danger  RemoveProduto" data-id="<?= $clientes[0]->id_cliente ?>" data-value="<?=BASE_URL?>Admin/DeletarCliente" id="0"><i class="fa-solid fa-trash mx-1"></i>Delete</button>
    </div>
</div>
<div class="row px-2">
    <div class="col-md-7 imgs">
        <!-- continuiacao -->
        <img src="<?= BASE_URL ?>public/assets/images/<?= $produtos[0]->images ?>" alt="">
    </div>
    <div class="col-md-5">
        <div class="title border-bottom">
            <h3><?= $clientes[0]->nome ?></h3>
        </div>
        <div class="describe pt-2">
            <p>Apelido : <?= $clientes[0]->apelido ?></p>
           
        </div>
        <div class="describe ">
            <p>Sexo : <?= $clientes[0]->sexo ?></p>
        </div>
         <div class="describe">
            <p class="h5 text-muted"></p>
            <p>Email : <?= $clientes[0]->email ?></p>
        </div>
        <div class="describe pt-2 ">
            <p>Nivel de Acesso : <?=$clientes[0]->Nivel_acesso?></p>
        </div>
        <div class="describe ">
            <p class="">Status : <?= $clientes[0]->status ? "Ativo" : "No-Ativo" ?></p>
        </div> 
        <div class="describe ">
            <p class="">Data de Criacao : <?= $clientes[0]->data_created?></p>
        </div> 
        <div class="describe ">
            <p class="">Total Encomendas : <b><?=count($Pedidos)?></b></p>
        </div> 
    </div>
</div>
<div class="row m-3 ">
    <h5 class="border-bottom py-3 fw-bold">Historico de Pedidos</h5>
    <div class="table-responsive">
    <table class="table table-triped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Data do Pedido</th>
                <th>Nome Produto</th>
                <th>Quantidade Pedida</th>
                <th>status</th>
                <th>Action</th>
            </tr>
            <?php foreach($Pedidos as $Pedido){ ?>
            <tr>
                <td><?=$Pedido->id?></td>
                <td><?=$Pedido->data?></td>
                <td><?=$Pedido->nome?></td>
                <td><?=$Pedido->quantidade?></td>
                <td><?=$Pedido->status?></td>
                <td><button class="btn btn-outline-primary"><i class="fa-solid fa-eye me-2"></i>Ver</button></td>
            </tr>
            <?php } ?>
             
        </thead>
    </table>
    </div>
</div>