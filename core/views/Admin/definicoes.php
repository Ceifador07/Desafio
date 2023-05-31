<div class="row my-3 border-bottom">
    <div class="col-sm-12 col-md-6  px-2">
        <h4 class=""><i class="fas fa-users fs-5   border rounded-full cards-color p-3 mx-2"></i>Dados do Administrador</h4>
    </div>
    <div class="col-sm-12 col-md-4"></div>
    <div class="col-sm-12 col-md-2 pt-2">
        <!-- <button class="btn btn-primary border-radius-none" data-bs-toggle="modal" data-bs-target="#NovoProduto"><i class="fa-solid fa-add me-2"></i>Novo</button> -->
    </div>
</div>
<div class="row p-2">
    <form id="modal-form" enctype="" action="<?= !empty($clientes) ? BASE_URL . 'Main/AtualizarPedido' : BASE_URL . 'Main/RegistarPedido'; ?>">
        
            <div class="col-sm-12 col-md-6 md-3 py-2">
                <h3 class="py-2"></h3>
            </div>
            <div class="row resp px-3"></div>
            <div class="row mb-3">
                <div class="col-sm-12 col-md-6 mb-2">
                    <label for="" class="form-label">Nome</label>
                    <input type="text" name="nome" id="" value="<?= !empty($clientes) ?  $clientes->nome : BASE_URL . ' '; ?>" class="form-control">
                </div>
                <div class="col-sm-12 col-md-6 mb-2">
                    <label for="" class="form-label">Apelido</label>
                    <input type="text" name="apelido" id="" value="<?= !empty($clientes) ?  $clientes->apelido : ' '; ?>" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12 col-md-6">
                    <label for="" class="form-label">E-mail</label>
                    <input type="text" name="email" id="" value="<?= !empty($clientes) ?  $clientes->email : ' '; ?>" class="form-control">
                </div>
                <div class="col-sm-12 col-md-6">
                    <label for="" class="form-label">Sexo</label>
                    <select name="sexo" id="" class="form-control">
                        <option value=""><?php if($clientes->sexo == 'M'){ echo "Masculino"; }else{ echo "Femenino"; } ?></option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                        <option value="FM">Outros</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12 col-md-6 mb-2">
                    <label for="" class="form-label">Senha</label>
                    <input type="password" name="senha" value="<?= !empty($clientes) ?  $clientes->senha : ''; ?>" id="" class="form-control" disabled>
                </div>
                <div class="col-sm-12 col-md-6 my-2">
                    <label for="" class="form-label"></label>
                    
                </div>
            </div>
            <div class="row md-3">
                <div class="col-md-6">
                    <input type="submit" value="Registar" class="btn btn-primary">
                    <a href="" class="btn btn-primary col">Mudar senha</a>
                </div>
            </div>
        </form>
</div>



<!-- Modal Cliente -->