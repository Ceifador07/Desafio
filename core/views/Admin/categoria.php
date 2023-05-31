<div class="row my-3 border-bottom">
    <div class="col-sm-12 col-md-6  px-2">
        <h4 class=""><i class="fas fa-tags fs-5   border rounded-full cards-color p-3 mx-2"></i>Categorias</h4>
    </div>
    <div class="col-sm-12 col-md-4"></div>
    <div class="col-sm-12 col-md-2 pt-2">
        <button class="btn btn-primary border-radius-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-add me-2"></i>Novo</button>
    </div>
</div>
<div class="row">
    <div class="resp"></div>
    <div class="table-responsive">
        <table class="table table-triped table-hover" id="example">
            <thead class="bg-dark text-white">
                <tr>
                    <th>#</th>
                    <th>Nome da Categoria</th>
                    <th>descricao</th>
                    <th>status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(!empty($categorias)){
                        foreach($categorias as $categoria){
                ?>
                <tr>
                    <td><?=$categoria->id?></td>
                    <td><?=$categoria->nomeCategoria?></td>
                    <td>---</td>
                    <td>
                        <?= $categoria->nomeCategoria ? 'Ativo' : 'No-Ativo' ?>
                    </td>
                    <td>
                         
                        <?php if($categoria->status != 0){ ?>
                        <button class="btn btn-outline-primary CATEGORIAdADOS" data-bs-toggle="modal" data-bs-target="#EditarCategoria" data-id="<?=$categoria->id?>" data-value="<?= BASE_URL ?>Admin/DadosCategoria"> <i class="fa-solid fa-edit me-2"></i>Editar</button>
                        <button class="btn btn-outline-danger RemoveProduto" data-id="<?=$categoria->id?>" id="0" data-value="<?= BASE_URL ?>Admin/RemoverCategoria"><i class="fa-solid fa-trash me-2"></i>Delete</button> 
                         <?php }else{ ?>
                            <button class="btn btn-outline-danger RemoveProduto" data-id="<?=$categoria->id?>" id="1" data-value="<?= BASE_URL ?>Admin/RemoverCategoria" title="Habilitar Categoria <?=$categoria->nomeCategoria?>"><i class="fa-solid fa-thumbs-down" ></i></button>
                         <?php } ?>
                    </td>
                </tr>
                <?php
                } }
                ?>
            </tbody>
        </table>
    </div>
</div>




<div class="modal fade" id="staticBackdrop">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title cliente" id="exampleModalLabel ">Registar Nova Categoria</h5>
               
            </div>
            <form id="modal-form" action="<?= BASE_URL ?>Admin/RegistarCategoria">
                <div class="modal-body">
                    <div class="row mb-1 resp px-2">
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="" class="form-label">Nome da Categoria</label>
                            <input type="text" name="nome" id="categoria" class="form-control">
                        </div>
                    </div>
                    <div class="row md-3">
                        <div class="col-12">
                            <label for="" class="form-label">Descricao</label>
                            <textarea name="descricao" id="" cols="4" rows="3" placeholder="Descricao da categoria" class="form-control"></textarea>
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
                    <input type="submit" id="agendar" value="Registar" class="btn btn-success">
                    <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>
