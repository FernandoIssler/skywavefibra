<?php $this->layout("_theme") ?>

<?php
/**
 * Formulário de criação/edição de União.
 *
 * Variáveis esperadas:
 * - $union (Union|null): objeto existente (edição) ou null (criação).
 */
$isEdit         = !empty($union) && !empty($union->id);
$activeChecked  = $isEdit ? ((int)($union->active ?? 0) === 1 ? 'checked' : '') : 'checked';
$logo           = $union->logo ?? null;
?>

<form action="<?= url("/app/unions/save") ?>" method="post" id="kt_union_form" enctype="multipart/form-data">
    <!-- ID oculto para edição -->
    <input type="hidden" name="id" value="<?= $union->id ?? null ?>">

    <div class="card card-flush pt-3 mb-5 mb-lg-10">
        <!-- Header -->
        <div class="card-header">
            <div class="card-title d-flex justify-content-between align-items-center w-100">
                <h2 class="fw-bold mb-0"><?= $isEdit ? "Editar União" : "Nova União" ?></h2>

                <!-- Status -->
                <label class="form-check form-switch form-check-custom form-check-solid mb-0">
                    <input class="form-check-input" type="checkbox" name="active" value="1" <?= $activeChecked ?> />
                    <span class="form-check-label text-gray-700">União ativa</span>
                </label>
            </div>
        </div>

        <div class="card-body pt-0">
            <!-- Seção: Informações básicas -->
            <div class="d-flex flex-column mb-10 fv-row">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="fs-5 fw-bold">
                        Informações básicas
                        <span class="ms-2 cursor-pointer" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true"
                            data-bs-content="Cadastre o nome oficial da União. O código será usado em URLs e integrações.">
                            <i class="ki-outline ki-information fs-7"></i>
                        </span>
                    </div>
                </div>

                <div class="row g-5">
                    <!-- Nome -->
                    <div class="col-md-6 fv-row">
                        <label class="required form-label">Nome da União</label>
                        <input type="text" class="form-control form-control-solid" name="name"
                            placeholder="Ex.: União Leste Brasileira"
                            value="<?= htmlspecialchars($union->name ?? '') ?>"
                            maxlength="150" required />
                    </div>

                    <!-- Código -->
                    <div class="col-md-3 fv-row">
                        <label class="required form-label">Código</label>
                        <input type="text" class="form-control form-control-solid" name="code" id="kt_union_code"
                            placeholder="Informe o código da União"
                            value="<?= htmlspecialchars($union->code ?? '') ?>"
                            maxlength="30" required />
                        <div class="form-text">Ex: ULB</div>
                    </div>

                    <!-- Domínio -->
                    <div class="col-md-3 fv-row">
                        <label class="form-label">Domínio (opcional)</label>
                        <input type="text" class="form-control form-control-solid" name="domain"
                            placeholder="ex.: ulb.org.br"
                            value="<?= htmlspecialchars($union->domain ?? '') ?>" />
                    </div>
                </div>
            </div>

            <!-- Seção: Contato & Branding -->
            <div class="d-flex flex-column mb-10 fv-row">
                <div class="fs-5 fw-bold form-label mb-3">
                    Contato & Branding
                    <span class="ms-2 cursor-pointer" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true"
                        data-bs-content="Campos opcionais para comunicação e identidade visual.">
                        <i class="ki-outline ki-information fs-7"></i>
                    </span>
                </div>

                <div class="row g-5">
                    <!-- E-mail -->
                    <div class="col-md-6 fv-row">
                        <label class="form-label">E-mail</label>
                        <input type="email" class="form-control form-control-solid" name="email"
                            placeholder="contato@ulb.org.br"
                            value="<?= htmlspecialchars($union->email ?? '') ?>" />
                    </div>

                    <!-- Telefone -->
                    <div class="col-md-6 fv-row">
                        <label class="form-label">Telefone</label>
                        <input type="text" class="form-control form-control-solid phone" name="phone"
                            placeholder="(00) 00000-0000"
                            value="<?= htmlspecialchars($union->phone ?? '') ?>" />
                    </div>

                    <!-- Upload Logo -->
                    <div class="col-md-6 fv-row">
                        <label class="form-label">Logo (PNG/JPG)</label>
                        <input type="file" class="form-control form-control-solid" name="logo" accept=".png,.jpg,.jpeg,.webp" />
                        <div class="form-text"><?= $logo ? "Envie um arquivo para substituir o logo atual." : "Opcional. Até 2MB." ?></div>
                    </div>

                    <!-- Preview Logo -->
                    <div class="col-md-6 d-flex align-items-end">
                        <div id="kt_union_logo_preview" class="<?= $logo ? '' : 'd-none' ?>">
                            <div class="fw-semibold mb-2">Pré-visualização:</div>
                            <img src="<?= $logo ? image($logo, 600) : '#' ?>" alt="Prévia do logo"
                                class="img-fluid rounded border" style="max-height: 64px;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Seção: Ações -->
            <div class="d-flex justify-content-end">
                <a href="<?= url("app/unioes") ?>" class="btn btn-light me-3">Cancelar</a>
                <button type="submit" class="btn btn-primary"><?= $isEdit ? "Salvar alterações" : "Salvar União" ?></button>
            </div>
        </div>
    </div>
</form>

<?php $this->start("scripts") ?>
<!-- jQuery Mask para telefone -->
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
</script>

<script>
    // Inicializa popovers
    if (typeof bootstrap !== "undefined") {
        document.querySelectorAll('[data-bs-toggle="popover"]').forEach((el) => new bootstrap.Popover(el));
    }

    // Preview de logo no upload
    const logoInput = document.querySelector('input[name="logo"]');
    const prevWrap = document.getElementById('kt_union_logo_preview');
    const prevImg = prevWrap?.querySelector('img');
    logoInput?.addEventListener('change', (e) => {
        const f = e.target.files?.[0];
        if (!f || !prevImg) return;
        prevImg.src = URL.createObjectURL(f);
        prevWrap.classList.remove('d-none');
    });

    // Validação nativa do form
    document.getElementById('kt_union_form')?.addEventListener('submit', (e) => {
        if (!e.target.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        e.target.classList.add('was-validated');
    });
</script>
<?php $this->end() ?>