<!-- MODALS -->
<div id="loginModals" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 overflow-hidden">
            <div class="modal-body login-modal p-5">
                <h5 class="text-white fs-20">Sem cadastro?</h5>
                <p class="text-white-50 mb-4">Se ainda não é cadastrado
                    <a href="#collapseRegister" data-bs-toggle="collapse" class="text-white">
                        clique aqui.
                    </a>
                </p>
                <div id="alert-container-fixed"></div>
                <div class="collapse" id="collapseRegister">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="modal-body">
                                <form class="auth_form" action="<?= url("/cadastrar"); ?>" method="post"
                                      enctype="multipart/form-data">
                                    <div class="ajax_response"><?= flash(); ?></div>
                                    <?= $csrf; ?>
                                    <h5 class="mb-3">Insira seus dados para se cadastrar</h5>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" name="first_name" class="form-control" placeholder="Nome" required>
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="last_name" class="form-control" placeholder="Sobrenome" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-8">
                                                <select name="athletic" class="form-select" aria-label="Default select example" required>
                                                    <option value="">Qual a sua atlética?</option>
                                                    <?php foreach ($athletics as $athletic) : ?>
                                                        <option value="<?= $athletic->id ?>"><?= $athletic->title ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <input type="number" name="document" class="form-control" placeholder="R.A." required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control" placeholder="Crie uma senha" required>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="agree" class="form-check-input" id="checkTerms" required>
                                        <label class="form-check-label" for="checkTerms">
                                            Eu aceito <span class="fw-semibold">TODAS AS REGRAS</span> de uso das
                                            quadras
                                        </label>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body p-5">
                <h5>Já tem cadastro?</h5>
                <p class="mb-3 text-muted">Digite com suas credenciais</p>
                <form action="<?= url("/"); ?>" method="post">
                    <?= $csrf; ?>
                    <div class="mb-2">
                        <input type="email" name="email" value="<?= ($cookie ?? null); ?>" class="form-control" placeholder="E-mail" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Senha" required>
                        <div class="mt-1 text-end">
                            <a href="<?= url("/recuperar"); ?>">Esqueceu a senha?</a>
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="save" class="form-check-input" id="saveCookie" <?= (!empty($cookie) ? "checked" : ""); ?>>
                        <label class="form-check-label" for="saveCookie">Lembrar de mim</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>