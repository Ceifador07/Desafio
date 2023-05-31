<div class="row my-3 border-bottom">
    <div class="col-sm-12 col-md-6  px-2">
        <h4 class=""><i class="fas fa-users fs-5   border rounded-full cards-color p-3 mx-2"></i>Produtos</h4>
    </div>
    <div class="col-sm-12 col-md-4"></div>
    <div class="col-sm-12 col-md-2 pt-2">
        <button class="btn btn-primary border-radius-none" data-bs-toggle="modal" data-bs-target="#janelamodal"><i class="fa-solid fa-add me-2"></i>Novo</button>
    </div>
</div>
<div class="row">
    <div class="table-responsive">
        <table class="table table-triped table-hover" id="example">
            <thead class="bg-dark text-white">
                <tr>
                    <th>#</th>
                    <th>Nome do Produto</th>
                    <th>Email</th>
                    <th>sexo</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($clientes)) {
                    foreach ($clientes as $cliente) {
                ?>
                        <tr>
                            <td><?= $cliente->id_cliente ?></td>
                            <td><?= $cliente->nome ?> <?= $cliente->apelido ?></td>
                            <td><?= $cliente->email ?></td>
                            <td><?= $cliente->sexo ?></td>
                            <td><?php echo $cliente->status == 1 ? 'Ativo' : 'No-Ative' ?></td>
                            <td>
                                <!-- Ao clicar o bottao ver usuario ele enviar um id que esta no atributo data-id e usa a url que esta no atributo data-value  -->
                                <button class="btn btn-outline-primary VerCliente" data-id="<?= $cliente->id_cliente ?>" data-value="<?= BASE_URL ?>Admin/DadosCliente" data-bs-toggle="modal" data-bs-target="#eye"><i class="fa-solid fa-edit"></i> Editar</button>

                                <a href="<?= BASE_URL ?>Admin/DetalheCliente/<?= $cliente->id_cliente ?>" class="btn btn-outline-primary" data-id="<?= $cliente->id_cliente ?>" data-value="<?= BASE_URL ?>Main/DadosCliente"  ><i class="fa-solid fa-eye"></i> Detalhes</a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr class="text-center">
                        <td colspan="6">Tabela Vazia</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Cliente -->


<div class="modal fade" id="janelamodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registar Cliente</h5>

            </div>
            <form id="modal-form" action="<?= BASE_URL ?>Admin/RegistarCliente">
                <div class="modal-body">
                    <div class="row mb-2 resp px-2">
 
                    </div> 
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
                </div>
                <div class="col px-2 py-2 mb-3">
                    <input type="submit" id="agendar" value="Registar" class="btn btn-success">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>

