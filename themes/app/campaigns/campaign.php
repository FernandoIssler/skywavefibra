<?php $this->layout("_theme") ?>

<style>
    /* realce sutil p/ histórico */
    tr.rule-row-archived td,
    tr.rule-row-locked td {
        background: var(--bs-light);
        border-left: 3px solid var(--bs-gray-300);
    }

    .rule-meta {
        margin-top: .25rem;
    }
</style>



<?php
/**
 * Formulário de Campanha
 *
 * Variáveis esperadas:
 * - $campaign        object|null
 * - $institutions    array
 * - $rewardCriteria  array   [code => label]
 * - $negCriteria     array   [code => label]
 * - $prizesByInst    array   [institution_id => [Prize,...]]
 * - $existingRules   array   (modo edição)
 * - $existingExcls   array   (modo edição)
 * - $formAction      string
 * - $canEdit         bool
 */

$isEdit        = !empty($campaign?->id);
$activeChecked = $isEdit ? ((int)($campaign->active ?? 0) === 1 ? 'checked' : '') : 'checked';

$instId  = (int)($campaign->institution_id ?? 0);
$title   = htmlspecialchars($campaign->title ?? '');
$slug    = htmlspecialchars($campaign->slug  ?? '');
$notes   = htmlspecialchars($campaign->notes ?? '');
$start = $campaign?->start_at ? date('Y-m-d\TH:i', strtotime($campaign->start_at)) : '';
$end   = $campaign?->end_at   ? date('Y-m-d\TH:i', strtotime($campaign->end_at))   : '';
$pdf     = $campaign->regulation_pdf ?? null;

$rewardCriteria = $rewardCriteria ?? [];
$negCriteria    = $negCriteria ?? [];
$prizesByInst   = $prizesByInst ?? [];
$institutions   = $institutions ?? [];
$existingRules  = $existingRules ?? [];
$existingExcls  = $existingExcls ?? [];
?>

<form action="<?= url("/app/campaigns/save") ?>" method="post" id="kt_campaign_form" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $campaign->id ?? '' ?>">

    <div class="card card-flush pt-3 mb-5 mb-lg-10">
        <!-- Header -->
        <div class="card-header">
            <div class="card-title d-flex justify-content-between align-items-center w-100">
                <h2 class="fw-bold mb-0"><?= $isEdit ? "Editar campanha" : "Nova campanha" ?></h2>
                <label class="form-check form-switch form-check-custom form-check-solid mb-0">
                    <input class="form-check-input" type="checkbox" name="active" value="1" <?= $activeChecked ?> />
                    <span class="form-check-label text-gray-700">Campanha ativa</span>
                </label>
            </div>
        </div>

        <div class="card-body pt-0">
            <!-- ===================== INFORMAÇÕES BÁSICAS ===================== -->
            <div class="mb-10">
                <div class="fs-5 fw-bold mb-3">
                    Informações básicas
                    <i class="ki-outline ki-information fs-7 ms-2 text-muted"
                        data-bs-toggle="popover"
                        data-bs-trigger="hover"
                        data-bs-content="Defina o título, a instituição e o slug público. O slug compõe o link de divulgação."></i>
                </div>

                <div class="row g-5">
                    <div class="col-md-6">
                        <label class="required form-label">Título da campanha</label>
                        <input type="text" class="form-control form-control-solid"
                            name="title" id="kt_campaign_title"
                            value="<?= $title ?>"
                            placeholder="Ex.: Indica e Ganhe 2025/2"
                            maxlength="160" required />
                        <div class="form-text">
                            URL pública:
                            <code>
                                <?= rtrim(url('/'), '/') ?>/c/<span id="kt_code_preview">---</span>/<span id="kt_slug_preview"><?= $slug ?: '---' ?></span>
                            </code>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="required form-label">Slug</label>
                        <input type="text" class="form-control form-control-solid"
                            name="slug" id="kt_campaign_slug"
                            value="<?= $slug ?>"
                            placeholder="ex.: indica-ganhe-2025-2"
                            maxlength="180" required />
                        <div class="form-text">Gerado do título (ajustável).</div>
                    </div>

                    <div class="col-md-3">
                        <label class="required form-label">Instituição</label>
                        <select class="form-select form-select-solid" name="institution_id" id="kt_institution" required>
                            <option value="">Selecione</option>
                            <?php foreach ($institutions as $inst): ?>
                                <option
                                    value="<?= (int)$inst->id ?>"
                                    data-code="<?= htmlspecialchars($inst->code ?? '') ?>"
                                    <?= ($instId === (int)$inst->id ? 'selected' : '') ?>>
                                    <?= htmlspecialchars($inst->name) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- ===================== PERÍODO ===================== -->
            <div class="mb-10">
                <div class="fs-5 fw-bold mb-3">
                    Período da campanha
                    <i class="ki-outline ki-information fs-7 ms-2 text-muted"
                        data-bs-toggle="popover"
                        data-bs-trigger="hover"
                        data-bs-content="A campanha é válida somente entre as datas informadas."></i>
                </div>

                <div class="row g-5">
                    <div class="col-md-4">
                        <label class="required form-label">Início</label>
                        <input type="datetime-local" class="form-control form-control-solid"
                            name="start_at" id="kt_start_at" value="<?= $start ?>" required />
                    </div>
                    <div class="col-md-4">
                        <label class="required form-label">Fim</label>
                        <input type="datetime-local" class="form-control form-control-solid"
                            name="end_at" id="kt_end_at" value="<?= $end ?>" required />
                        <div class="form-text text-danger d-none" id="kt_err_end"></div>
                    </div>
                </div>
            </div>

            <div class="mb-10">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="fs-5 fw-bold">
                        Regras de premiação
                        <i class="ki-outline ki-information fs-7 ms-2 text-muted"
                            data-bs-toggle="popover"
                            data-bs-trigger="hover"
                            data-bs-content="Você pode ativar/desativar regras sem perder histórico. Regras arquivadas (cadeado) ficam visíveis para consulta, mas não são editáveis."></i>

                    </div>

                    <!-- Habilita depois que a Instituição é selecionada -->
                    <button type="button" class="btn btn-light-primary" id="kt_campaign_rules_add" disabled>
                        + Adicionar regra
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fw-semibold fs-6 gy-4" id="kt_campaign_rules">
                        <thead>
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-35">Critério</th>
                                <th class="w-50">Prêmio</th>
                                <th class="w-15 text-end">Remover</th>
                            </tr>
                        </thead>
                        <tbody><!-- linhas via JS --></tbody>
                    </table>
                </div>
            </div>

            <!-- Repositório oculto com TODAS as opções de prêmios (para montagem dinâmica por Instituição) -->
            <select id="kt_all_prizes" class="d-none">
                <option value=""></option>
                <?php foreach (($prizesByInst ?? []) as $pi => $prizes): ?>
                    <?php foreach ($prizes as $p): ?>
                        <option value="<?= (int)$p->id ?>" data-inst="<?= (int)$p->institution_id ?>">
                            <?= htmlspecialchars($p->name) ?> (<?= htmlspecialchars($p->type) ?> — R$ <?= number_format((float)$p->value, 2, ',', '.') ?>)
                        </option>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </select>

            <!-- ===================== CRITÉRIOS NEGATIVOS ===================== -->
            <div class="mb-10">
                <div class="fs-5 fw-bold mb-3">Critérios negativos (exclusões)</div>
                <select class="form-select form-select-solid" name="exclusions[]" id="kt_exclusions"
                    multiple data-control="select2" data-placeholder="Escolha um ou mais">
                    <?php foreach ($negCriteria as $code => $label): ?>
                        <option value="<?= $code ?>" <?= in_array($code, $existingExcls, true) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($label) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- ===================== REGULAMENTO & NOTAS ===================== -->
            <div class="mb-10">
                <div class="fs-5 fw-bold mb-3">Regulamento & Observações</div>
                <div class="row g-5">
                    <div class="col-md-6">
                        <label class="form-label">Regulamento (PDF)</label>

                        <input
                            type="file"
                            class="form-control form-control-solid"
                            name="regulation_pdf"
                            accept="application/pdf" />

                        <?php if (!empty($pdf)): ?>
                            <!-- mantém o arquivo atual caso nada seja enviado -->
                            <input type="hidden" name="regulation_pdf" value="<?= htmlspecialchars($pdf) ?>">

                            <div class="d-flex align-items-center bg-light rounded p-3 mt-3 bg-light-primary">
                                <i class="ki-outline ki-file fs-2x text-primary me-3"></i>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold text-gray-900">Regulamento atual</div>
                                    <div class="text-muted fs-8">
                                        <?= htmlspecialchars(basename($pdf)) ?>
                                    </div>
                                </div>
                                <a class="btn btn-sm btn-light-primary"
                                    href="<?= url(CONF_UPLOAD_DIR . '/' . ltrim($pdf, '/')) ?>"
                                    target="_blank" rel="noopener">
                                    <i class="ki-outline ki-eye me-1"></i> Ver PDF
                                </a>
                            </div>
                            <div class="form-text mt-2">
                                Enviar um novo arquivo irá <strong>substituir</strong> o regulamento atual.
                            </div>
                        <?php else: ?>
                            <div class="form-text">Opcional. Até 10 MB.</div>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Observações</label>
                        <textarea class="form-control form-control-solid" name="notes" rows="4"><?= $notes ?></textarea>
                    </div>
                </div>
            </div>

            <!-- ===================== AÇÕES ===================== -->
            <div class="d-flex justify-content-end">
                <a href="<?= url('/app/campanhas') ?>" class="btn btn-light me-3">Cancelar</a>
                <?php if ($canEdit ?? true): ?>
                    <button type="submit" class="btn btn-primary"><?= $isEdit ? "Salvar alterações" : "Salvar campanha" ?></button>
                <?php else: ?>
                    <button type="button" class="btn btn-secondary" disabled>Sem permissão</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</form>

<?php $this->start("scripts") ?>
<script>
    // Mapa de rótulos dos critérios (vindo do PHP)
    const CRITERIA_LABELS = <?= json_encode($rewardCriteria ?? [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;

    // Busca o label do prêmio pelo <select> repositório (fallback seguro)
    function getPrizeLabelById(id) {
        const sel = document.getElementById('kt_all_prizes');
        if (!sel) return `Prêmio #${id}`;
        const opt = sel.querySelector(`option[value="${id}"]`);
        return opt ? opt.text : `Prêmio #${id}`;
    }

    // Badge com prioridade: Arquivada > Bloqueada > (Ativa/Inativa)
    function renderStatusBadge({
        archivedAt,
        locked,
        active
    }) {
        if (archivedAt) return `
      <span class="badge badge-light-dark">
        <i class="ki-outline ki-archive fs-6 me-1"></i>Arquivada
      </span>`;
        if (locked) return `
      <span class="badge badge-light-dark">
        <i class="ki-outline ki-lock fs-6 me-1"></i>Bloqueada
      </span>`;
        return active ?
            `<span class="badge badge-light-success"><i class="ki-outline ki-check fs-6 me-1"></i>Ativa</span>` :
            `<span class="badge badge-light-secondary"><i class="ki-outline ki-minus fs-6 me-1"></i>Inativa</span>`;
    }

    // Data BR (mesmo helper que você já usa)
    const formatBR = (d) => {
        const dt = new Date(d);
        if (isNaN(dt)) return d;
        const pad = n => String(n).padStart(2, '0');
        return `${pad(dt.getDate())}/${pad(dt.getMonth()+1)}/${dt.getFullYear()} ${pad(dt.getHours())}:${pad(dt.getMinutes())}`;
    };
</script>

<script>
    (function() {
        // ===================== HELPERS GERAIS =====================
        const slugify = str => (str || "")
            .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
            .toLowerCase().replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '').substring(0, 180);

        const titleEl = document.getElementById('kt_campaign_title');
        const slugEl = document.getElementById('kt_campaign_slug');
        const slugPrev = document.getElementById('kt_slug_preview');
        const startEl = document.getElementById('kt_start_at');
        const endEl = document.getElementById('kt_end_at');
        const errEnd = document.getElementById('kt_err_end');
        const instEl = document.getElementById('kt_institution');
        const addBtn = document.getElementById('kt_campaign_rules_add');
        const tbody = document.querySelector('#kt_campaign_rules tbody');
        const allPrizes = document.getElementById('kt_all_prizes');

        // Monta índice de opções por instituição para reconstrução rápida
        const prizeOptionsByInst = (() => {
            const map = {};
            [...allPrizes.options].forEach(opt => {
                const inst = parseInt(opt.dataset.inst || '0', 10);
                if (!map[inst]) map[inst] = ['<option value=""></option>'];
                if (inst) map[inst].push(`<option value="${opt.value}">${opt.text}</option>`);
            });
            return map;
        })();

        // ===================== SLUG em tempo real =====================
        (function() {
            // ---------- refs ----------
            const titleEl = document.getElementById('kt_campaign_title');
            const slugEl = document.getElementById('kt_campaign_slug');
            const instEl = document.getElementById('kt_institution');
            const codePrev = document.getElementById('kt_code_preview');
            const slugPrev = document.getElementById('kt_slug_preview');

            // ---------- helpers ----------
            const slugify = s => (s || '')
                .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
                .toLowerCase().replace(/[^a-z0-9]+/g, '-')
                .replace(/^-+|-+$/g, '')
                .slice(0, 180);

            function getSelectedInstCode() {
                const opt = instEl?.selectedOptions?.[0];
                const code = (opt?.dataset?.code || '').trim();
                return code ? code.toUpperCase() : '---';
            }

            // Atualiza somente o texto do slug (sem tocar na sigla)
            function syncSlug(fromTitle = false) {
                if (fromTitle && (!slugEl.value || slugEl.value.length < 30)) {
                    slugEl.value = slugify(titleEl?.value);
                } else {
                    slugEl.value = slugify(slugEl.value);
                }
                slugPrev.textContent = slugEl.value || '---';
            }

            // Atualiza a sigla (--- se nada selecionado)
            function syncInstCode() {
                codePrev.textContent = getSelectedInstCode();
            }

            // Atualiza ambos (útil no carregamento inicial)
            function syncAll() {
                syncInstCode();
                syncSlug(false);
            }

            // ---------- eventos ----------
            titleEl?.addEventListener('input', () => syncSlug(true));
            slugEl?.addEventListener('input', () => syncSlug(false));
            instEl?.addEventListener('change', syncInstCode);

            // ---------- first paint ----------
            syncAll();
        })();

        // ===================== Validação de datas =====================
        function validateDates() {
            errEnd?.classList.add('d-none');
            if (startEl?.value && endEl?.value && new Date(endEl.value) < new Date(startEl.value)) {
                errEnd.textContent = 'A data de fim não pode ser anterior ao início.';
                errEnd.classList.remove('d-none');
                endEl.classList.add('is-invalid');
            } else {
                endEl?.classList.remove('is-invalid');
            }
        }
        startEl?.addEventListener('change', validateDates);
        endEl?.addEventListener('change', validateDates);

        // ===================== Regras de premiação =====================
        let ruleIdx = 0;

        function buildPrizeSelectHTML(instId, selectedPrizeId = '') {
            const inst = parseInt(instId || '0', 10);
            const opts = prizeOptionsByInst[inst] || ['<option value=""></option>'];
            return {
                html: opts.join(''),
                selected: String(selectedPrizeId || '')
            };
        }

        function addRuleRow(preset = {}) {
            const tr = document.createElement('tr');
            const thisIdx = ruleIdx++;
            const idVal = preset.id ? parseInt(preset.id, 10) : '';
            const criterion = String(preset.criterion || preset.criterion_code || '');
            const prizeId = preset.prize_id ? String(preset.prize_id) : '';
            const archivedAt = preset.archived_at ? String(preset.archived_at) : '';
            const locked = !!preset.locked;
            const activeVal = preset.active !== undefined ? !!preset.active : true;
            const isReadOnly = !!archivedAt || locked;

            // monta selects "normais" (caso editável)
            const instId = instEl?.value || '';
            const prizeHTML = buildPrizeSelectHTML(instId, prizeId);

            // rótulos legíveis
            const criterionLabel = CRITERIA_LABELS[criterion] || criterion || '—';
            const prizeLabel = (preset.prize_label && preset.prize_label.trim()) ?
                preset.prize_label :
                (prizeId ? getPrizeLabelById(prizeId) : '—');

            if (isReadOnly) {
                // ======== SOMENTE LEITURA (texto) ========
                tr.classList.add(archivedAt ? 'rule-row-archived' : 'rule-row-locked');
                tr.innerHTML = `
                    <td>
                        <div class="fw-semibold text-gray-900 ms-5">${escapeHtml(criterionLabel)}</div>
                        ${idVal ? `<div class="fs-8 text-muted rule-meta ms-5">ID regra: #${idVal}</div>` : ''}
                    </td>
                    <td>
                        <div class="text-gray-800">${escapeHtml(prizeLabel)}</div>
                    </td>
                    <td class="text-end">
                        <div class="d-flex justify-content-end align-items-center gap-2 me-5">
                        ${renderStatusBadge({ archivedAt, locked, active: activeVal })}
                        </div>
                        ${archivedAt ? `<div class="fs-8 text-muted rule-meta me-5">Arquivada em ${formatBR(archivedAt)}</div>` : ''}
                    </td>
                    `;
            } else {
                // ======== EDITÁVEL (selects) ========
                tr.innerHTML = `
                    <td>
                        ${idVal ? `<input type="hidden" name="rules[${thisIdx}][id]" value="${idVal}">` : ''}
                        <select class="form-select form-select-solid" name="rules[${thisIdx}][criterion]" required>
                        <option value=""></option>
                        <?php foreach (($rewardCriteria ?? []) as $code => $label): ?>
                            <option value="<?= $code ?>"><?= htmlspecialchars($label) ?></option>
                        <?php endforeach; ?>
                        </select>
                        ${idVal ? `<div class="fs-8 text-muted rule-meta ms-5">ID regra: #${idVal}</div>` : ''}
                    </td>
                    <td>
                        <select class="form-select form-select-solid js-prize" name="rules[${thisIdx}][prize_id]" required>
                        ${prizeHTML.html}
                        </select>
                    </td>
                    <td class="text-end">
                        <div class="d-flex justify-content-end align-items-center gap-2">
                        <button type="button" class="btn btn-icon btn-flex btn-active-light-primary w-30px h-30px" data-action="remove" title="Remover">
                            <i class="ki-outline ki-trash fs-3"></i>
                        </button>
                        </div>
                    </td>
                    `;

                // set selecionados pós-render
                const critSel = tr.querySelector(`select[name="rules[${thisIdx}][criterion]"]`);
                const prizeSel = tr.querySelector(`select[name="rules[${thisIdx}][prize_id]"]`);
                if (critSel) critSel.value = criterion || '';
                if (prizeSel) {
                    const has = [...prizeSel.options].some(o => o.value === prizeId);
                    prizeSel.value = has ? prizeId : '';
                }

                // switch ativa -> hidden
                const activeChk = tr.querySelector('.js-active');
                const activeHid = tr.querySelector(`input[name="rules[${thisIdx}][active]"]`);
                activeChk?.addEventListener('change', () => {
                    if (activeHid) activeHid.value = activeChk.checked ? 1 : 0;
                });

                // remover
                tr.querySelector('[data-action="remove"]')?.addEventListener('click', () => tr.remove());
            }

            tbody.appendChild(tr);

            // util simples para escapar (evita XSS se prize_label vier do BD)
            function escapeHtml(s) {
                return String(s)
                    .replaceAll('&', '&amp;')
                    .replaceAll('<', '&lt;')
                    .replaceAll('>', '&gt;')
                    .replaceAll('"', '&quot;')
                    .replaceAll("'", '&#039;');
            }
        }


        // Utilitário de data BR
        function formatBR(dt) {
            // aceita "YYYY-MM-DD HH:MM:SS" e similares
            const d = new Date(dt.replace(' ', 'T'));
            if (isNaN(d.getTime())) return dt;
            const pad = n => String(n).padStart(2, '0');
            return `${pad(d.getDate())}/${pad(d.getMonth()+1)}/${d.getFullYear()} ${pad(d.getHours())}:${pad(d.getMinutes())}`;
        }

        // Habilita o botão “Adicionar regra” só após escolher uma instituição
        function syncAddButton() {
            const ok = !!instEl?.value;
            addBtn.disabled = !ok;
            // ao trocar instituição, reconstruir todas as opções de prêmio
            if (ok) {
                const rows = tbody.querySelectorAll('tr');
                rows.forEach(row => {
                    const prizeSel = row.querySelector('select.js-prize');
                    const current = prizeSel?.value || '';
                    const rebuilt = buildPrizeSelectHTML(instEl.value, current);
                    prizeSel.innerHTML = rebuilt.html;
                    // tenta manter a seleção válida; se não existir no novo catálogo, zera
                    const has = [...prizeSel.options].some(o => o.value === current);
                    prizeSel.value = has ? current : '';
                });
            } else {
                // sem instituição selecionada, limpa as linhas para evitar inconsistência
                // (opcional: pode apenas desabilitar os selects)
            }
        }
        instEl?.addEventListener('change', syncAddButton);
        syncAddButton();

        addBtn?.addEventListener('click', () => addRuleRow());

        // Sementes de edição
        <?php if (!empty($existingRules)): foreach ($existingRules as $r): ?>
                addRuleRow({
                    id: "<?= (int)$r->id ?>",
                    criterion: "<?= $r->criterion ?>",
                    prize_id: "<?= (int)$r->prize_id ?>",
                    active: <?= (int)($r->active ?? 1) === 1 ? 'true' : 'false' ?>,
                    archived_at: "<?= $r->archived_at ?? '' ?>",
                    locked: <?= (int)($r->locked ?? 0) ?>
                });
            <?php endforeach;
        else: ?>
            // Em novo cadastro, cria uma linha padrão se a instituição já vier pré-selecionada
            if (instEl?.value) addRuleRow();
        <?php endif; ?>

        // ===================== Select2 (exclusões) =====================
        if (typeof $ !== 'undefined' && $.fn.select2) {
            $('#kt_exclusions').select2({
                width: '100%'
            });
        }

        // ===================== Submit =====================
        document.getElementById('kt_campaign_form')?.addEventListener('submit', e => {
            validateDates();
            if (!e.target.checkValidity() || (errEnd && !errEnd.classList.contains('d-none'))) {
                e.preventDefault();
                e.stopPropagation();
            }
            e.target.classList.add('was-validated');
        });

        // Popovers
        if (typeof bootstrap !== 'undefined') {
            document.querySelectorAll('[data-bs-toggle="popover"]').forEach(el => new bootstrap.Popover(el));
        }
    })();
</script>
<?php $this->end() ?>