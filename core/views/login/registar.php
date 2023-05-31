<div class="container">
    <div class="container-fluid">
        <div class="card col-md-10">
            <div class="card-card p-2">
                <form action="<?=BASE_URL?>Main/RegistarCliente" class="form" method="post">
                    <div class="col-sm-12 col-md-6 md-3 py-2">
                        <h3 class="py-2">Registar Cliente</h3>
                    </div>
                    <div class="row resp px-3"></div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            <label for="" class="form-label">Nome</label>
                            <input type="text" name="nome" id="" class="form-control">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="" class="form-label">Apelido</label>
                            <input type="text" name="apelido" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            <label for="" class="form-label">E-mail</label>
                            <input type="text" name="email" id="" class="form-control">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="" class="form-label">Sexo</label>
                            <select name="sexo" id="" class="form-control">
                                <option value=""></option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="FM">Outros</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            <label for="" class="form-label">Senha</label>
                            <input type="password" name="senha" id="" class="form-control">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="" class="form-label">Confirmar senha</label>
                            <input type="password" name="confirSenha" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row md-3">
                        <div class="col-md-6">
                            <input type="submit" value="Registar" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <a href="<?=BASE_URL?>" class="btn" class="pt-2">Entrar no Painel</a>
            </div>
        </div>
    </div>
</div>