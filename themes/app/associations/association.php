<?php $this->layout("_theme") ?>

<?php
/**
 * Formulário de criação/edição de Associação
 *
 * Variáveis esperadas:
 * - $association (object|null): Associação existente ou null (nova)
 * - $unionsOptions (array|null): mapa id => nome das Uniões
 * - $formAction (string): rota de submissão do formulário
 */
$isEdit         = !empty($association) && !empty($association->id);
$activeChecked  = $isEdit ? ((int)($association->active ?? 0) === 1 ? 'checked' : '') : 'checked';
$logo           = $association->logo ?? null;
?>

<form action="<?= url("/app/associations/save") ?>" method="post" id="kt_association_form" enctype="multipart/form-data">
    <!-- ID oculto (apenas edição) -->
    <input type="hidden" name="id" value="<?= $association->id ?? null ?>">

    <div class="card card-flush pt-3 mb-5 mb-lg-10">
        <!-- Header -->
        <div class="card-header">
            <div class="card-title d-flex justify-content-between align-items-center w-100">
                <h2 class="fw-bold mb-0"><?= $isEdit ? "Editar Associação" : "Nova Associação" ?></h2>
                <label class="form-check form-switch form-check-custom form-check-solid mb-0">
                    <input class="form-check-input" type="checkbox" name="active" value="1" <?= $activeChecked ?> />
                    <span class="form-check-label text-gray-700">Associação ativa</span>
                </label>
            </div>
        </div>

        <div class="card-body pt-0">
            <!-- Seção: Informações básicas -->
            <div class="d-flex flex-column mb-10 fv-row">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="fs-5 fw-bold">
                        Informações básicas
                        <span class="ms-2 cursor-pointer"
                            data-bs-toggle="popover"
                            data-bs-trigger="hover"
                            data-bs-html="true"
                            data-bs-content="Selecione a União, defina nome e código da associação.">
                            <i class="ki-outline ki-information fs-7"></i>
                        </span>
                    </div>
                </div>

                <div class="row g-5">
                    <!-- União -->
                    <div class="col-md-4 fv-row">
                        <label class="required form-label">União</label>
                        <select class="form-select form-select-solid" name="union_id" data-control="select2" required>
                            <option value="">Selecione a União</option>
                            <?php if (!empty($unionsOptions)): ?>
                                <?php foreach ($unionsOptions as $uid => $uname): ?>
                                    <option value="<?= (int)$uid ?>"
                                        <?= (string)($association->union_id ?? '') === (string)$uid ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($uname) ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <!-- Nome -->
                    <div class="col-md-5 fv-row">
                        <label class="required form-label">Nome da Associação</label>
                        <input type="text" class="form-control form-control-solid" name="name"
                            placeholder="Ex.: ABaC — Associação Bahia Central"
                            value="<?= htmlspecialchars($association->name ?? '') ?>"
                            maxlength="150" required />
                    </div>

                    <!-- Código -->
                    <div class="col-md-3 fv-row">
                        <label class="required form-label">Código</label>
                        <input type="text" class="form-control form-control-solid" name="code"
                            placeholder="Ex.: abac"
                            value="<?= htmlspecialchars($association->code ?? '') ?>"
                            maxlength="30" required />
                        <div class="form-text">Ex: ABaC</div>
                    </div>
                </div>

                <div class="row g-5 mt-0">
                    <!-- Domínio -->
                    <div class="col-md-4 fv-row">
                        <label class="form-label">Domínio (opcional)</label>
                        <input type="text" class="form-control form-control-solid" name="domain"
                            placeholder="ex.: abac.org.br"
                            value="<?= htmlspecialchars($association->domain ?? '') ?>" />
                    </div>

                    <!-- E-mail -->
                    <div class="col-md-4 fv-row">
                        <label class="form-label">E-mail</label>
                        <input type="email" class="form-control form-control-solid" name="email"
                            placeholder="contato@abac.org.br"
                            value="<?= htmlspecialchars($association->email ?? '') ?>" />
                    </div>

                    <!-- Telefone -->
                    <div class="col-md-4 fv-row">
                        <label class="form-label">Telefone</label>
                        <input type="text" class="form-control form-control-solid phone" name="phone"
                            placeholder="(00) 00000-0000"
                            value="<?= htmlspecialchars($association->phone ?? '') ?>" />
                    </div>
                </div>
            </div>

            <!-- Seção: Branding -->
            <div class="d-flex flex-column mb-10 fv-row">
                <div class="fs-5 fw-bold form-label mb-3">
                    Branding
                    <span class="ms-2 cursor-pointer"
                        data-bs-toggle="popover"
                        data-bs-trigger="hover"
                        data-bs-html="true"
                        data-bs-content="Logo é opcional. Envie para substituir o atual.">
                        <i class="ki-outline ki-information fs-7"></i>
                    </span>
                </div>

                <div class="row g-5">
                    <!-- Upload Logo -->
                    <div class="col-md-6 fv-row">
                        <label class="form-label">Logo (PNG/JPG)</label>
                        <input type="file" class="form-control form-control-solid" name="logo"
                            accept=".png,.jpg,.jpeg,.webp" />
                        <div class="form-text">
                            <?= $logo ? "Envie um arquivo para substituir o logo atual." : "Opcional. Até 2MB." ?>
                        </div>
                    </div>

                    <!-- Preview -->
                    <div class="col-md-6 d-flex align-items-end">
                        <div id="kt_association_logo_preview" class="<?= $logo ? '' : 'd-none' ?>">
                            <div class="fw-semibold mb-2">Pré-visualização:</div>
                            <img src="<?= $logo ? image($logo, 600) : '#' ?>" alt="Prévia do logo"
                                class="img-fluid rounded border" style="max-height: 64px;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ações -->
            <div class="d-flex justify-content-end">
                <a href="/app/associacoes" class="btn btn-light me-3">Cancelar</a>
                <button type="submit" class="btn btn-primary">
                    <?= $isEdit ? "Salvar alterações" : "Salvar Associação" ?>
                </button>
            </div>
        </div>
    </div>
</form>

<?php $this->start("scripts") ?>
<script>
    // Inicializa popovers
    if (typeof bootstrap !== "undefined") {
        document.querySelectorAll('[data-bs-toggle="popover"]').forEach(
            (el) => new bootstrap.Popover(el)
        );
    }

    // Pré-visualização do logo
    const logoInput = document.querySelector('input[name="logo"]');
    const prevWrap = document.getElementById('kt_association_logo_preview');
    const prevImg = prevWrap?.querySelector('img');

    logoInput?.addEventListener('change', (e) => {
        const f = e.target.files?.[0];
        if (!f || !prevImg) return;
        prevImg.src = URL.createObjectURL(f);
        prevWrap.classList.remove('d-none');
    });

    // Validação nativa do form
    document.getElementById('kt_association_form')?.addEventListener('submit', (e) => {
        if (!e.target.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        e.target.classList.add('was-validated');
    });
</script>
<?php $this->end() ?>