<?php $this->layout("_theme") ?>

<?php
/**
 * Formulário de Criação/Edição de Recompensas
 *
 * Variáveis esperadas:
 * - $prize         object|null   Recompensa (em edição)
 * - $institutions  array|null    Lista de instituições disponíveis
 * - $formAction    string        Action do formulário (override opcional)
 * - $canEdit       bool          Se o usuário pode editar
 */

$isEdit        = !empty($prize) && !empty($prize->id);
$activeChecked = $isEdit ? ((int)($prize->active ?? 0) === 1 ? 'checked' : '') : 'checked';
$image         = $prize->image ?? null;
$readOnly      = empty($canEdit) && $isEdit; // só leitura se edição sem permissão
?>

<form action="<?= url('/app/rewards/save') ?>" method="post" id="kt_prize_form" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $prize->id ?? '' ?>">

    <div class="card card-flush pt-3 mb-5 mb-lg-10">
        <!-- Cabeçalho -->
        <div class="card-header">
            <div class="card-title d-flex justify-content-between align-items-center w-100">
                <h2 class="fw-bold mb-0"><?= $isEdit ? "Editar recompensa" : "Nova recompensa" ?></h2>
                <label class="form-check form-switch form-check-custom form-check-solid mb-0">
                    <input class="form-check-input" type="checkbox" name="active" value="1"
                        <?= $activeChecked ?> <?= $readOnly ? 'disabled' : '' ?> />
                    <span class="form-check-label text-gray-700">Recompensa ativa</span>
                </label>
            </div>
        </div>

        <!-- Corpo -->
        <div class="card-body pt-0">
            <!-- Informações básicas -->
            <div class="d-flex flex-column mb-10 fv-row">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="fs-5 fw-bold">
                        Informações básicas
                        <span class="ms-2 cursor-pointer" data-bs-toggle="popover" data-bs-html="true"
                            data-bs-content="Selecione a instituição, defina tipo, nome e valor do prêmio.">
                            <i class="ki-outline ki-information fs-7"></i>
                        </span>
                    </div>
                </div>

                <div class="row g-5">
                    <!-- Instituição -->
                    <div class="col-md-4 fv-row">
                        <label class="required form-label">Instituição</label>
                        <select class="form-select form-select-solid" name="institution_id"
                            <?= $readOnly ? 'disabled' : '' ?> required>
                            <option value=""></option>
                            <?php foreach (($institutions ?? []) as $inst): ?>
                                <option value="<?= (int)$inst->id ?>"
                                    <?= ((int)($prize->institution_id ?? 0) === (int)$inst->id ? 'selected' : '') ?>>
                                    <?= htmlspecialchars($inst->name) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Tipo -->
                    <div class="col-md-4 fv-row">
                        <label class="required form-label">Tipo</label>
                        <select class="form-select form-select-solid" name="type"
                            <?= $readOnly ? 'disabled' : '' ?> required>
                            <option value=""></option>
                            <?php foreach (['CASHBACK' => 'Cashback', 'PRODUCT' => 'Produto', 'VOUCHER' => 'Voucher'] as $k => $v): ?>
                                <option value="<?= $k ?>" <?= (($prize->type ?? '') === $k ? 'selected' : '') ?>><?= $v ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Valor -->
                    <div class="col-md-4 fv-row">
                        <label class="required form-label">Valor (R$)</label>
                        <input type="text" step="0.01" min="0"
                            class="form-control form-control-solid money"
                            name="value" value="<?= htmlspecialchars($prize->value ?? '') ?>"
                            <?= $readOnly ? 'readonly' : '' ?> required />
                    </div>
                </div>

                <div class="row g-5 mt-0">
                    <!-- Nome -->
                    <div class="col-md-8 fv-row">
                        <label class="required form-label">Nome</label>
                        <input type="text" class="form-control form-control-solid"
                            name="name" value="<?= htmlspecialchars($prize->name ?? '') ?>"
                            maxlength="150" <?= $readOnly ? 'readonly' : '' ?> required />
                        <div class="form-text">
                            Esse nome ficará visível para os usuários
                        </div>
                    </div>

                    <!-- Estoque -->
                    <div class="col-md-4 fv-row">
                        <label class="form-label">Estoque (opcional)</label>
                        <input type="number" step="1" min="0"
                            class="form-control form-control-solid"
                            name="stock" value="<?= htmlspecialchars($prize->stock ?? '') ?>"
                            <?= $readOnly ? 'readonly' : '' ?> />
                    </div>
                </div>

                <div class="row g-5 mt-0">
                    <!-- Descrição -->
                    <div class="col-md-8 fv-row">
                        <label class="form-label">Descrição</label>
                        <textarea class="form-control form-control-solid"
                            name="description" rows="3"
                            <?= $readOnly ? 'readonly' : '' ?>><?= htmlspecialchars($prize->description ?? '') ?></textarea>
                    </div>

                    <!-- Imagem -->
                    <div class="col-md-4">
                        <label class="form-label">Imagem (PNG/JPG)</label>
                        <input type="file" class="form-control form-control-solid"
                            name="image" accept=".png,.jpg,.jpeg,.webp"
                            <?= $readOnly ? 'disabled' : '' ?> />
                        <div class="form-text">
                            <?= $image ? "Envie um arquivo para substituir a imagem." : "Opcional. Até 2MB." ?>
                        </div>

                        <!-- Preview -->
                        <div id="kt_prize_img_preview" class="mt-3 <?= $image ? '' : 'd-none' ?>">
                            <div class="fw-semibold mb-2">Pré-visualização:</div>
                            <img src="<?= $image ? image($image, 600) : '#' ?>"
                                alt="Prévia" class="img-fluid rounded border"
                                style="max-height: 80px;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ações -->
            <div class="d-flex justify-content-end">
                <a href="<?= url('/app/recompensas') ?>" class="btn btn-light me-3">Cancelar</a>
                <?php if (!$readOnly): ?>
                    <button type="submit" class="btn btn-primary">
                        <?= $isEdit ? "Salvar alterações" : "Salvar recompensa" ?>
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</form>

<?php $this->start("scripts") ?>
<!-- jQuery Mask para telefone -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $('.money').mask("#.##0,00", {
        reverse: true
    });
</script>
<script>
    // Popovers
    if (typeof bootstrap !== "undefined") {
        document.querySelectorAll('[data-bs-toggle="popover"]').forEach(el => new bootstrap.Popover(el));
    }

    // Preview de imagem
    (() => {
        const input = document.querySelector('input[name="image"]');
        const wrap = document.getElementById('kt_prize_img_preview');
        const img = wrap?.querySelector('img');
        if (!input || !wrap || !img) return;

        input.addEventListener('change', e => {
            const f = e.target.files?.[0];
            if (!f) return;
            img.src = URL.createObjectURL(f);
            wrap.classList.remove('d-none');
        });
    })();

    // Validação nativa no submit
    document.getElementById('kt_prize_form')?.addEventListener('submit', e => {
        if (!e.target.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        e.target.classList.add('was-validated');
    });
</script>
<?php $this->end() ?>