<?php $this->layout("_theme") ?>

<?php
/**
 * Formulário de criação/edição de usuário
 *
 * Variáveis esperadas:
 * - $user object|null
 */
$isEdit = !empty($user) && !empty($user->id);
$photo  = $user->photo ?? null;
$status = $user->status ?? 'registered';
?>

<form action="<?= url("app/users/save") ?>" method="post" id="kt_user_form" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $user->id ?? '' ?>">

    <div class="card card-flush pt-3 mb-5 mb-lg-10">
        <!-- Cabeçalho -->
        <div class="card-header">
            <div class="card-title d-flex justify-content-between align-items-center w-100">
                <h2 class="fw-bold mb-0"><?= $isEdit ? "Editar usuário" : "Novo usuário" ?></h2>
                <div class="d-flex align-items-center gap-3">
                    <span class="text-muted">Status</span>
                    <select class="form-select form-select-solid w-200px" name="status" required>
                        <option value="registered" <?= $status === 'registered' ? 'selected' : '' ?>>Registrado</option>
                        <option value="confirmed" <?= $status === 'confirmed'  ? 'selected' : '' ?>>Confirmado</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card-body pt-0">
            <!-- Dados básicos -->
            <div class="d-flex flex-column mb-10 fv-row">
                <div class="fs-5 fw-bold form-label mb-3">
                    Dados básicos
                    <span class="ms-2 cursor-pointer" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true"
                        data-bs-content="Preencha nome e e-mail do usuário. Senha é obrigatória apenas ao criar.">
                        <i class="ki-outline ki-information fs-7"></i>
                    </span>
                </div>

                <div class="row g-5">
                    <div class="col-md-4 fv-row">
                        <label class="required form-label">Nome</label>
                        <input type="text" class="form-control form-control-solid" name="first_name"
                            value="<?= htmlspecialchars($user->first_name ?? '') ?>" maxlength="255" required />
                    </div>
                    <div class="col-md-4 fv-row">
                        <label class="form-label">Sobrenome</label>
                        <input type="text" class="form-control form-control-solid" name="last_name"
                            value="<?= htmlspecialchars($user->last_name ?? '') ?>" maxlength="255" />
                    </div>
                    <div class="col-md-4 fv-row">
                        <label class="required form-label">E-mail</label>
                        <input type="email" class="form-control form-control-solid" name="email"
                            value="<?= htmlspecialchars($user->email ?? '') ?>" maxlength="255" required />
                    </div>
                </div>

                <div class="row g-5 mt-0">
                    <div class="col-md-4 fv-row">
                        <label class="form-label">Telefone</label>
                        <input type="text" class="form-control form-control-solid phone" name="phone"
                            value="<?= htmlspecialchars($user->phone ?? '') ?>" maxlength="255" />
                    </div>
                    <div class="col-md-4 fv-row">
                        <label class="form-label">Gênero</label>
                        <select class="form-select form-select-solid" name="gender">
                            <option value="">Não informar</option>
                            <option value="male" <?= (($user->gender ?? '') === 'male') ? 'selected' : '' ?>>Masculino</option>
                            <option value="female" <?= (($user->gender ?? '') === 'female') ? 'selected' : '' ?>>Feminino</option>
                            <option value="other" <?= (($user->gender ?? '') === 'other') ? 'selected' : '' ?>>Outro</option>
                        </select>
                    </div>
                    <div class="col-md-4 fv-row">
                        <label class="form-label">Nascimento</label>
                        <input type="date" class="form-control form-control-solid" name="birthdate"
                            value="<?= htmlspecialchars($user->birthdate ?? '') ?>" />
                    </div>
                </div>

                <div class="row g-5 mt-0">
                    <div class="col-md-4 fv-row">
                        <label class="form-label">Documento (CPF)</label>
                        <input type="text" class="form-control form-control-solid cpf" name="document"
                            value="<?= htmlspecialchars($user->document ?? '') ?>" maxlength="14" />
                    </div>
                </div>

                <div class="row g-5 mt-0">
                    <div class="col-md-8 fv-row">
                        <label class="form-label">Foto (PNG/JPG)</label>
                        <input type="file" class="form-control form-control-solid" name="photo" accept=".png,.jpg,.jpeg,.webp" />
                        <div class="form-text"><?= $photo ? "Envie um arquivo para substituir a foto atual." : "Opcional. Até 2MB." ?></div>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <div id="kt_user_photo_preview" class="<?= $photo ? '' : 'd-none' ?>">
                            <div class="fw-semibold mb-2">Pré-visualização:</div>
                            <img src="<?= $photo ? image($photo, 600) : '#' ?>" alt="Prévia da foto do usuário"
                                class="img-fluid rounded border" style="max-height: 64px;">
                        </div>
                    </div>
                </div>

                <!-- Senha -->
                <?php if (!$isEdit): ?>
                    <div class="row g-5 mt-0">
                        <div class="col-md-4 fv-row">
                            <label class="required form-label">Senha</label>
                            <input type="password" class="form-control form-control-solid" name="password" id="kt_pwd"
                                minlength="6" required />
                        </div>
                        <div class="col-md-4 fv-row">
                            <label class="required form-label">Confirmar senha</label>
                            <input type="password" class="form-control form-control-solid" name="password_confirm" id="kt_pwd2"
                                minlength="6" required />
                            <div class="form-text text-danger d-none" id="kt_pwd_err">As senhas não conferem.</div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="d-flex flex-column mt-8">
                        <div class="fs-6 fw-bold mb-2">Alterar senha (opcional)</div>
                        <div class="row g-5">
                            <div class="col-md-4 fv-row">
                                <label class="form-label">Nova senha</label>
                                <input type="password" class="form-control form-control-solid" name="password" id="kt_pwd"
                                    minlength="6" />
                            </div>
                            <div class="col-md-4 fv-row">
                                <label class="form-label">Confirmar nova senha</label>
                                <input type="password" class="form-control form-control-solid" name="password_confirm" id="kt_pwd2"
                                    minlength="6" />
                                <div class="form-text text-danger d-none" id="kt_pwd_err">As senhas não conferem.</div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Observações -->
            <div class="d-flex flex-column mb-10 fv-row">
                <div class="fs-5 fw-bold form-label mb-3">Observações</div>
                <textarea class="form-control form-control-solid" name="notes" rows="3"
                    placeholder="Anotações internas (opcional)"><?= htmlspecialchars($user->notes ?? '') ?></textarea>
            </div>

            <!-- Ações -->
            <div class="d-flex justify-content-end">
                <a href="<?= url('/app/usuarios') ?>" class="btn btn-light me-3">Cancelar</a>
                <button type="submit" class="btn btn-primary"><?= $isEdit ? "Salvar alterações" : "Salvar usuário" ?></button>
            </div>
        </div>
    </div>
</form>

<?php $this->start("scripts") ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    const SPMaskBehavior = function(val) {
        return val.replace(/\D/g, '').length === 11 ?
            '(00) 00000-0000' :
            '(00) 0000-00009';
    };

    const spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };

    $('.phone').mask(SPMaskBehavior, spOptions);
    $('.cpf').mask('000.000.000-00', {reverse: true});
</script>
<script>
    // --- Popovers ---
    if (typeof bootstrap !== "undefined") {
        document.querySelectorAll('[data-bs-toggle="popover"]').forEach((el) => new bootstrap.Popover(el));
    }

    // --- Pré-visualização da foto ---
    (function() {
        const input = document.querySelector('input[name="photo"]');
        const wrap = document.getElementById('kt_user_photo_preview');
        const img = wrap ? wrap.querySelector('img') : null;

        if (!input || !wrap || !img) return;

        input.addEventListener('change', (e) => {
            const f = e.target.files?.[0];
            if (!f) return;
            img.src = URL.createObjectURL(f);
            wrap.classList.remove('d-none');
        });
    })();

    // --- Validação de senha ---
    (function() {
        const f = document.getElementById('kt_user_form');
        if (!f) return;

        const pwd = document.getElementById('kt_pwd');
        const pwd2 = document.getElementById('kt_pwd2');
        const err = document.getElementById('kt_pwd_err');

        function checkPwd() {
            if (!pwd || !pwd2) return true;
            if (!pwd.value && !pwd2.value) {
                err?.classList.add('d-none');
                return true;
            }
            if (pwd.value !== pwd2.value) {
                err?.classList.remove('d-none');
                return false;
            }
            err?.classList.add('d-none');
            return true;
        }

        f.addEventListener('submit', (e) => {
            if (!f.checkValidity() || !checkPwd()) {
                e.preventDefault();
                e.stopPropagation();
            }
            f.classList.add('was-validated');
        });

        pwd?.addEventListener('input', checkPwd);
        pwd2?.addEventListener('input', checkPwd);
    })();
</script>
<?php $this->end() ?>