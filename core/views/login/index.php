 <div class="container">
    <div class="container-fluid">
        <div class="card col-md-6 ">
            <div class="card-body">
                <form action="<?=BASE_URL?>Main/LoginSistem">
                    <div class="col-sm-10 col-md-12 md-3 py-2">
                        <h3 class="py-2">Login</h3>
                        <p>Acesse a sua conta </p>
                    </div>
                    <div class="col-md-12 resp"></div>
                    <div class="col-sm-10 col-md-12 mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control "  >
                    </div>
                    <div class="col-sm-10 col-md-12">
                        <label for="" class="form-label">senha</label>
                        <input type="password" name="senha" class="form-control"  >
                    </div>
                    <div class="col-sm-10 col-md-12 mt-3">
                        <input type="submit" value="Entrar" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <a href="<?=BASE_URL?>Main/registar" class="btn" class="pt-2">Criar conta</a>
                <p class="pt-2"><span class="px-2">Esqueceu a senha ?</span><a href="#">Click aqui</a></p>
            </div>
        </div>
    </div>
</div>
