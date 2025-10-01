<?php $this->layout("_theme"); ?>

<?php
/**
 * View: Lead (mini-CRM)
 *
 * Espera do controller:
 * - $lead       (obj)
 * - $referrals  (array de objetos com: id, status, created_at, referrer_name, referrer_email)
 * - $notes      (array de LeadNote com: created_at, note, author_name)
 *
 * Observações:
 * - Foco total no Lead. Nada de campanha/recompensas aqui.
 * - A tabela de indicações mostra apenas Indicador, Status, Criado em e Ações.
 */

$leadId = (int)($lead->id ?? 0);
$leadName  = htmlspecialchars($lead->name  ?? '—');
$leadEmail = htmlspecialchars($lead->email ?? '—');
$leadPhone = htmlspecialchars($lead->phone ?? '—');

$fmtDateTime = function (?string $ts): string {
    return !empty($ts) ? date('d/m/Y H:i', strtotime($ts)) : '—';
};
?>

<style>
    /* Melhorar legibilidade geral */
    .lead-pill {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        padding: .35rem .6rem;
        border-radius: 999px;
        background: var(--bs-light);
        border: 1px solid var(--bs-gray-200);
        font-size: .9rem;
        color: var(--bs-gray-700);
        white-space: nowrap;
    }

    .lead-pill i {
        opacity: .75;
    }

    /* Timeline mais arejada */
    .timeline .timeline-item {
        margin-bottom: 1.5rem;
    }

    .timeline .timeline-content .note-card {
        background: var(--bs-light);
        border: 1px solid var(--bs-gray-200);
        border-radius: .75rem;
        padding: 1rem;
    }

    /* Tabela mais compacta e sem overflow horizontal */
    .table.lead-referrals thead th {
        white-space: nowrap;
    }

    .table.lead-referrals td .sub {
        font-size: .8rem;
        color: var(--bs-gray-600);
    }

    /* Corrige dropdowns dentro de table-responsive, se algum dia voltar a usar */
    .table-responsive.unclip-dropdowns {
        overflow: visible !important;
    }
</style>

<div class="d-flex flex-wrap align-items-center justify-content-between mb-6">
    <div>
        <h1 class="fw-bold mb-1">Lead</h1>
        <div class="text-muted"><?= $leadName ?></div>
    </div>
    <div class="d-flex gap-2">
        <a href="<?= url('/app/leads') ?>" class="btn btn-light">Voltar</a>
    </div>
</div>

<div class="row g-6">
    <!-- Coluna esquerda: dados e anotações -->
    <div class="col-xl-4">
        <!-- Dados do lead -->
        <div class="card card-flush">
            <div class="card-header">
                <div class="card-title">
                    <h2 class="mb-0">Dados do lead</h2>
                </div>
            </div>
            <div class="card-body">
                <!-- Nome -->
                <div class="fw-bold fs-5 mb-3 text-truncate" title="<?= $leadName ?>">
                    <?= $leadName ?>
                </div>

                <!-- Contatos (clicáveis) -->
                <div class="d-flex flex-wrap gap-2 mb-3">
                    <a class="lead-pill text-decoration-none" href="<?= $lead->email ? 'mailto:' . htmlspecialchars($lead->email) : '#' ?>"
                        title="Enviar e-mail" <?= $lead->email ? '' : 'tabindex="-1" aria-disabled="true"' ?>>
                        <i class="ki-outline ki-sms fs-5"></i>
                        <span class="text-truncate" style="max-width: 220px;"><?= $leadEmail ?></span>
                    </a>

                    <a class="lead-pill text-decoration-none" href="<?= $lead->phone ? 'tel:' . preg_replace('/\D+/', '', $lead->phone) : '#' ?>"
                        title="Ligar" <?= $lead->phone ? '' : 'tabindex="-1" aria-disabled="true"' ?>>
                        <i class="ki-outline ki-call fs-5"></i>
                        <span><?= $leadPhone ?></span>
                    </a>
                </div>

                <div class="separator my-4"></div>

                <div class="text-muted fs-7">
                    Criado em: <?= $fmtDateTime($lead->created_at ?? null) ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Coluna direita: Indicações do lead (sem campanha) -->
    <div class="col-xl-8">
        <div class="card card-flush">
            <div class="card-header">
                <div class="card-title d-flex align-items-center">
                    <h2 class="mb-0">Indicações deste lead</h2>
                    <span class="ms-2" data-bs-toggle="popover" data-bs-html="true" data-bs-trigger="hover"
                        data-bs-content="Um lead pode ter múltiplas indicações, por diferentes indicadores.">
                        <i class="ki-outline ki-information fs-7"></i>
                    </span>
                </div>
            </div>

            <div class="card-body p-5">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-4 mb-0 lead-referrals">
                        <thead>
                            <tr class="text-start text-muted fw-bold text-uppercase gs-0">
                                <th class="w-10">#</th>
                                <th class="w-40">Indicador</th>
                                <th class="w-20">Status</th>
                                <th class="w-20">Criado em</th>
                                <th class="text-end w-10">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($referrals)): ?>
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-10">
                                        Nenhuma indicação para este lead.
                                    </td>
                                </tr>
                                <?php else: foreach ($referrals as $r): ?>
                                    <?php
                                    $rid   = (int)($r->id ?? 0);
                                    $rname = htmlspecialchars($r->referrer_name  ?? '—');
                                    $remail = htmlspecialchars($r->referrer_email ?? '—');
                                    $rdate = !empty($r->created_at) ? date('d/m/Y H:i', strtotime($r->created_at)) : '—';
                                    $st    = (string)($r->status ?? 'new');
                                    ?>
                                    <tr>
                                        <!-- ID -->
                                        <td class="fw-bold">#<?= $rid ?></td>

                                        <!-- Indicador (nome + email menor) -->
                                        <td>
                                            <div class="fw-semibold text-truncate" title="<?= $rname ?>">
                                                <?= $rname ?>
                                            </div>
                                            <div class="sub text-truncate" title="<?= $remail ?>" style="max-width: 360px;">
                                                <?= $remail ?>
                                            </div>
                                        </td>

                                        <!-- Status (mini-CRM inline) -->
                                        <td>
                                            <select class="form-select form-select-sm js-referral-status"
                                                data-referral-id="<?= $rid ?>">
                                                <option value="new" <?= $st === 'new'        ? 'selected' : '' ?>>Novo</option>
                                                <option value="contacted" <?= $st === 'contacted'  ? 'selected' : '' ?>>Contactado</option>
                                                <option value="qualified" <?= $st === 'qualified'  ? 'selected' : '' ?>>Qualificado</option>
                                                <option value="won" <?= $st === 'won'        ? 'selected' : '' ?>>Ganho</option>
                                                <option value="lost" <?= $st === 'lost'       ? 'selected' : '' ?>>Perdido</option>
                                            </select>
                                        </td>

                                        <!-- Criado em -->
                                        <td><?= $rdate ?></td>

                                        <!-- Ações -->
                                        <td class="text-end">
                                            <a href="<?= url('/app/indicacoes/' . $rid) ?>"
                                                class="btn btn-sm btn-light-primary">
                                                Abrir
                                            </a>
                                        </td>
                                    </tr>
                            <?php endforeach;
                            endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Atividades (CRM) -->
        <div class="card card-flush mt-6">
            <div class="card-header">
                <div class="card-title">
                    <h2 class="mb-0">Atividades (CRM)</h2>
                </div>
            </div>
            <div class="card-body">
                <div id="alert-container-fixed"></div>

                <!-- Nova anotação -->
                <form class="mb-5" method="post" action="<?= url('/app/leads/notes/new') ?>">
                    <input type="hidden" name="lead_id" value="<?= $leadId ?>">
                    <textarea name="note" class="form-control mb-3" rows="3" placeholder="Anotação..."></textarea>
                    <button class="btn btn-light-primary">Adicionar anotação</button>
                </form>

                <!-- Timeline -->
                <?php if (!empty($notes)): ?>
                    <div class="separator my-5"></div>
                    <div class="timeline">
                        <?php foreach ($notes as $n): ?>
                            <div class="timeline-item">
                                <div class="timeline-label fw-bold text-muted">
                                    <?= date('d/m H:i', strtotime($n->created_at)) ?>
                                </div>
                                <div class="timeline-badge">
                                    <i class="ki-outline ki-message-text-2 text-primary me-2"></i>
                                </div>
                                <div class="timeline-content w-100">
                                    <div class="note-card">
                                        <div class="fw-semibold text-gray-900 text-break mb-2">
                                            <?= nl2br(htmlspecialchars($n->note)) ?>
                                        </div>
                                        <div class="text-muted fs-8">por <?= htmlspecialchars($n->author_name ?? '—') ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="text-muted">Sem atividades registradas.</div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<script>
    // popovers
    if (typeof bootstrap !== "undefined") {
        document.querySelectorAll('[data-bs-toggle="popover"]').forEach((el) => new bootstrap.Popover(el));
    }

    // Atualização inline do status da indicação (mini-CRM)
    document.querySelectorAll('.js-referral-status').forEach(sel => {
        sel.addEventListener('change', async () => {
            const referralId = sel.dataset.referralId;
            const status = sel.value;
            const tokenEl = document.querySelector('input[name="csrf"]');
            const token = tokenEl ? tokenEl.value : '';

            const fd = new FormData();
            fd.append('csrf', token);
            fd.append('referral_id', referralId);
            fd.append('status', status);

            try {
                const res = await fetch("<?= url('/app/referrals/status/update') ?>", {
                    method: 'POST',
                    body: fd
                });
                const json = await res.json();

                // feedback
                let message = json.message;
                if (message) alertRender(message.type, message.style, message.text, message.title)
            } catch (e) {
                console.error(e);
            }
        });
    });
</script>