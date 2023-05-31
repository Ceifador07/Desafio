<div class="row my-3 px-2 border-bottom ">
    <div class="col-sm-12 col-md-6  px-2">
        <h2 class="fs-3"><i class="fas fa-gear fs-4   border rounded-full cards-color p-3 mx-2"></i>Pedidos</h2>
    </div>
    <div class="col-sm-12 col-md-4"></div>
    <div class="col-sm-12 col-md-2 pt-2">

    </div>
</div>
<div class="row px-2">
    <form action="<?= BASE_URL ?>Main/RegistarCliente" class="form" method="post">
        <div class="col-sm-12 col-md-6 md-3 py-2">
            <h3 class="py-2"></h3>
        </div>
        <div class="row resp px-3"></div>
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6 mb-2">
                <label for="" class="form-label">Nome</label>
                <input type="text" name="nome" id="" value="<?= !empty($clientes) ?  $clientes->nome :' '; ?>" class="form-control">
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
                    <option value=""><?php if ($clientes->sexo == 'M') {
                                            echo "Masculino";
                                        } else {
                                            echo "Femenino";
                                        } ?></option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                    <option value="FM">Outros</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <label for="" class="form-label">Senha</label>
                <input type="password" name="nome" id="" class="form-control">
            </div>
            <div class="col-sm-12 col-md-6">
                <label for="" class="form-label">Confirmar senha</label>
                <input type="password" name="apelido" id="" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="submit" value="Actualizar" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>