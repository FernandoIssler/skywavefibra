<?php

use Source\Models\App\Campaign;

$this->layout("_theme"); ?>

<style>
    /* Deixa dropdowns aparecerem para fora da .table-responsive */
    .table-responsive.unclip-dropdowns {
        overflow: visible !important;
    }
</style>

<?php
// Espera do controller:
// $referral, $lead, $referrer, $campaign, $institution
// $rules (lista de CampaignReward com labels prontos), $rewardsMap [campaign_reward_id => ReferralReward|null]
// $referralNotes (opcional), $canEdit (bool)
$refId        = (int)($referral->id ?? 0);
$criterionMap = Campaign::rewardCriteria();     // descrições oficiais dos critérios
$labels = [
    'pending'   => 'Pendente',
    'approved'  => 'Aprovada',
    'paid'      => 'Paga',
    'cancelled' => 'Cancelada',
];

$fmtDateTime = function (?string $ts): string {
    return !empty($ts) ? date('d/m/Y H:i', strtotime($ts)) : '—';
};
?>

<div class="d-flex flex-wrap align-items-center justify-content-between mb-6">
    <div>
        <h1 class="fw-bold mb-0">Indicação #<?= $refId ?></h1>
        <div class="text-muted">Gerencie os critérios e recompensas desta indicação</div>
    </div>
    <div>
        <a href="<?= url('/app/indicacoes') ?>" class="btn btn-light">Voltar</a>
    </div>
</div>

<div class="row g-6">
    <!-- Coluna esquerda: Lead / Indicador / Campanha -->
    <div class="col-xl-4">
        <!-- Lead -->
        <div class="card card-flush">
            <div class="card-header">
                <div class="card-title d-flex align-items-center justify-content-between w-100">
                    <h2 class="mb-0">Lead</h2>
                    <?php if (!empty($lead?->id)): ?>
                        <a href="<?= url("/app/leads/{$lead->id}") ?>" class="btn btn-sm btn-icon btn-light" title="Ver Lead">
                            <i class="ki-outline ki-exit-right-corner fs-2"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <div class="fw-bold fs-5 text-truncate" title="<?= htmlspecialchars($lead->name ?? '—') ?>">
                    <?= htmlspecialchars($lead->name ?? '—') ?>
                </div>
                <div class="text-muted text-truncate" title="<?= htmlspecialchars($lead->email ?? '—') ?>">
                    <?= htmlspecialchars($lead->email ?? '—') ?>
                </div>
                <div class="text-muted"><?= htmlspecialchars($lead->phone ?? '—') ?></div>

                <div class="separator my-4"></div>
                <div class="text-muted fs-7">
                    Criado em: <?= $fmtDateTime($referral->created_at ?? null) ?>
                </div>
            </div>
        </div>

        <!-- Indicador -->
        <div class="card card-flush mt-6">
            <div class="card-header">
                <div class="card-title d-flex align-items-center justify-content-between w-100">
                    <h2 class="mb-0">Indicador</h2>
                    <?php if (!empty($referrer?->id)): ?>
                        <a href="<?= url("/app/usuarios/{$referrer->id}") ?>" class="btn btn-sm btn-icon btn-light" title="Ver Indicador">
                            <i class="ki-outline ki-exit-right-corner fs-2"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <div class="fw-bold text-truncate"
                    title="<?= htmlspecialchars(trim(($referrer->first_name ?? '') . ' ' . ($referrer->last_name ?? ''))) ?>">
                    <?= htmlspecialchars(trim(($referrer->first_name ?? '') . ' ' . ($referrer->last_name ?? ''))) ?: '—' ?>
                </div>
                <div class="text-muted text-truncate" title="<?= htmlspecialchars($referrer->email ?? '—') ?>">
                    <?= htmlspecialchars($referrer->email ?? '—') ?>
                </div>
            </div>
        </div>

        <!-- Campanha -->
        <div class="card card-flush mt-6">
            <div class="card-header">
                <div class="card-title d-flex align-items-center justify-content-between w-100">
                    <h2 class="mb-0">Campanha</h2>
                    <?php if (!empty($campaign?->id)): ?>
                        <a href="<?= url("/app/campanhas/{$campaign->id}") ?>" class="btn btn-sm btn-icon btn-light" title="Ver Campanha">
                            <i class="ki-outline ki-exit-right-corner fs-2"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <div class="fw-bold text-truncate" title="<?= htmlspecialchars($campaign->title ?? '—') ?>">
                    <?= htmlspecialchars($campaign->title ?? '—') ?>
                </div>
                <div class="text-muted text-truncate"
                    title="<?= htmlspecialchars(($institution->name ?? '—') . (!empty($institution->code) ? ' (' . $institution->code . ')' : '')) ?>">
                    <?= htmlspecialchars($institution->name ?? '—') ?>
                    <?php if (!empty($institution->code)): ?>
                        (<?= htmlspecialchars($institution->code) ?>)
                    <?php endif; ?>
                </div>
                <div class="text-muted fs-7 mt-2">
                    <i class="ki-outline ki-calendar fs-5 me-1"></i>
                    Período:
                    <?= !empty($campaign->start_at) ? date('d/m/Y', strtotime($campaign->start_at)) : '—' ?>
                    a
                    <?= !empty($campaign->end_at) ? date('d/m/Y', strtotime($campaign->end_at)) : '—' ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Coluna direita: Critérios & Recompensas + Timeline -->
    <div class="col-xl-8">
        <div id="alert-container-fixed"></div>
        <?= csrf_input() ?>

        <!-- Critérios & Recompensas -->
        <div class="card card-flush">
            <div class="card-header">
                <div class="card-title d-flex align-items-center">
                    <h2 class="mb-0">Critérios &amp; Recompensas</h2>
                    <span class="ms-2" data-bs-toggle="popover" data-bs-html="true" data-bs-trigger="hover"
                        data-bs-content="Ao aprovar um critério, a recompensa vinculada é criada/atualizada para esta indicação.">
                        <i class="ki-outline ki-information fs-7"></i>
                    </span>
                </div>
            </div>

            <div class="card-body p-5">
                <div class="table-responsive unclip-dropdowns">
                    <table class="table align-middle table-row-dashed fs-6 gy-4 mb-0" style="table-layout:fixed;">
                        <colgroup>
                            <col style="width:35%;"> <!-- Critério & prêmio -->
                            <col style="width:45%;"> <!-- Status -->
                            <col style="width:20%;"> <!-- Ações -->
                        </colgroup>
                        <thead>
                            <tr class="text-start text-muted fw-bold text-uppercase gs-0">
                                <th>Critério &amp; prêmio</th>
                                <th>Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($rules)): ?>
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-10">
                                        Nenhuma regra de premiação para esta campanha.
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php $hasRows = false; ?>
                                <?php foreach ($rules as $rule): ?>
                                    <?php
                                    $rid    = (int)$rule->id;                    // campaign_reward_id
                                    $rr     = $rewardsMap[$rid] ?? null;         // ReferralReward|null
                                    $status = $rr->status ?? 'pending';

                                    // Filtro: só mostra regra ativa; se arquivada/inativa, só mostra se já houve recompensa aprovada/paga
                                    $isArchived  = !empty($rule->archived_at);
                                    $isActiveNow = ((int)($rule->active ?? 1) === 1) && !$isArchived;
                                    $isGranted   = $rr && in_array($rr->status, ['approved', 'paid'], true);

                                    if (!$isActiveNow && !$isGranted) {
                                        continue; // pula regra inativa/arquivada sem histórico de concessão
                                    }
                                    $hasRows = true;

                                    $badgeClass = match ($status) {
                                        'paid'      => 'badge-light-success',
                                        'approved'  => 'badge-light-info',
                                        'cancelled' => 'badge-light-danger',
                                        default     => 'badge-light-warning',
                                    };

                                    // Ex.: "CASH — R$ 100,00"
                                    $prizeLine = trim(
                                        ($rule->prize_type ?? '')
                                            . (!empty($rule->prize_value) ? (" — R$ " . number_format((float)$rule->prize_value, 2, ',', '.')) : '')
                                    );

                                    $criterionDesc = $criterionMap[$rule->criterion ?? '']
                                        ?? ($rule->criterion_label ?? $rule->criterion ?? '—');
                                    ?>
                                    <tr data-row="<?= $rid ?>">
                                        <!-- Critério & prêmio -->
                                        <td>
                                            <div class="fw-semibold text-truncate" title="<?= htmlspecialchars($criterionDesc) ?>">
                                                <?= htmlspecialchars($criterionDesc) ?>
                                            </div>
                                            <div class="text-muted fs-7 text-truncate"
                                                title="<?= htmlspecialchars(($rule->prize_name ?? '—') . ($prizeLine ? ' · ' . $prizeLine : '')) ?>">
                                                <?= htmlspecialchars($rule->prize_name ?? '—') ?>
                                                <?php if ($prizeLine): ?>
                                                    <span class="text-gray-500"><br><?= htmlspecialchars($prizeLine) ?></span>
                                                <?php endif; ?>

                                                <?php if (!$isActiveNow && $isGranted): ?>
                                                    <span class="badge badge-light-dark ms-2" title="Regra arquivada/inativa; exibida para manter o histórico">
                                                        Arquivada
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </td>

                                        <!-- Status -->
                                        <td>
                                            <?php
                                            // status atual e datas
                                            $st         = $status ?? 'pending';
                                            $approvedAt = $rr->approved_at ?? null;
                                            $paidAt     = $rr->paid_at ?? null;

                                            // mapa de ícone + classes por status
                                            $statusIcon = match ($st) {
                                                'paid'      => 'ki-dollar-square',
                                                'approved'  => 'ki-check-circle',
                                                'cancelled' => 'ki-cross-circle',
                                                default     => 'ki-time',
                                            };
                                            $statusTextClass = match ($st) {
                                                'paid'      => 'text-success',
                                                'approved'  => 'text-info',
                                                'cancelled' => 'text-danger',
                                                default     => 'text-warning',
                                            };
                                            ?>

                                            <div class="p-3 bg-light rounded border">
                                                <!-- Cabeçalho do status -->
                                                <div class="d-flex align-items-center gap-2 mb-2">
                                                    <i class="ki-outline <?= $statusIcon ?> <?= $statusTextClass ?> fs-5"></i>
                                                    <span class="badge <?= $badgeClass ?>">
                                                        <?= $labels[$st] ?? $st ?>
                                                    </span>
                                                </div>

                                                <!-- Metadados (aprovado / pago) -->
                                                <div class="d-flex flex-wrap gap-3 fs-8 text-gray-700">
                                                    <span class="d-inline-flex align-items-center">
                                                        <i class="ki-outline ki-check-circle me-1 <?= $approvedAt ? 'text-success' : 'text-gray-400' ?>"></i>
                                                        <span class="<?= $approvedAt ? '' : 'text-gray-500' ?>">
                                                            Aprovado: <?= $approvedAt ? $fmtDateTime($approvedAt) : '—' ?>
                                                        </span>
                                                    </span>

                                                    <span class="d-inline-flex align-items-center">
                                                        <i class="ki-outline ki-dollar me-1 <?= $paidAt ? 'text-success' : 'text-gray-400' ?>"></i>
                                                        <span class="<?= $paidAt ? '' : 'text-gray-500' ?>">
                                                            Pago: <?= $paidAt ? $fmtDateTime($paidAt) : '—' ?>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Ações -->
                                        <td class="text-end">
                                            <?php if (!empty($canEdit)): ?>
                                                <div class="dropdown position-static">
                                                    <button class="btn btn-sm btn-light-primary d-block w-100"
                                                        data-bs-toggle="dropdown"
                                                        data-bs-display="static">
                                                        Status
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item js-status-action"
                                                            href="#"
                                                            data-action="approve"
                                                            data-referral-id="<?= $refId ?>"
                                                            data-campaign-reward-id="<?= $rid ?>">
                                                            <i class="ki-outline ki-check-circle me-2"></i>Aprovar
                                                        </a>
                                                        <a class="dropdown-item js-status-action"
                                                            href="#"
                                                            data-action="paid"
                                                            data-referral-id="<?= $refId ?>"
                                                            data-campaign-reward-id="<?= $rid ?>">
                                                            <i class="ki-outline ki-dollar me-2"></i>Marcar paga
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item js-status-action"
                                                            href="#"
                                                            data-action="pending"
                                                            data-referral-id="<?= $refId ?>"
                                                            data-campaign-reward-id="<?= $rid ?>">
                                                            <i class="ki-outline ki-time me-2"></i>Voltar p/ pendente
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item text-danger js-status-action"
                                                            href="#"
                                                            data-action="cancel"
                                                            data-referral-id="<?= $refId ?>"
                                                            data-campaign-reward-id="<?= $rid ?>">
                                                            <i class="ki-outline ki-cross-circle me-2"></i>Cancelar
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <span class="text-muted">Sem permissão</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                <?php if (empty($hasRows)): ?>
                                    <tr>
                                        <td colspan="3" class="text-center text-muted py-10">
                                            Nenhuma regra ativa aplicável a esta indicação.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Timeline (opcional) -->
        <?php if (!empty($referralNotes) || true): // mantém o card mesmo vazio para consistência 
        ?>
            <div class="card card-flush mt-6">
                <div class="card-header">
                    <div class="card-title">
                        <h2 class="mb-0">Atividades desta indicação</h2>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-muted">Registre aqui marcos relevantes desta indicação (opcional).</div>

                    <form class="mt-4" method="post" action="<?= url('/app/referrals/notes/new') ?>">
                        <?= csrf_input() ?>
                        <input type="hidden" name="referral_id" value="<?= $refId ?>">
                        <textarea name="note" class="form-control mb-3" rows="3" placeholder="Anotação..."></textarea>
                        <button class="btn btn-light-primary">Adicionar anotação</button>
                    </form>

                    <?php if (!empty($referralNotes)): ?>
                        <div class="separator my-5"></div>
                        <div class="timeline">
                            <?php foreach ($referralNotes as $n): ?>
                                <div class="timeline-item mb-7">
                                    <div class="timeline-label fw-bold text-muted">
                                        <?= date('d/m H:i', strtotime($n->created_at)) ?>
                                    </div>

                                    <div class="timeline-badge">
                                        <i class="ki-outline ki-message-text-2 text-primary me-2"></i>
                                    </div>

                                    <div class="timeline-content w-100">
                                        <div class="p-4 bg-light rounded border shadow-sm">
                                            <div class="fw-semibold text-gray-900 text-break mb-2">
                                                <?= nl2br(htmlspecialchars($n->note)) ?>
                                            </div>
                                            <div class="text-muted fs-8">
                                                por <?= htmlspecialchars($n->author_name ?? '—') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php $this->start("scripts") ?>
<script>
    // Popovers
    if (typeof bootstrap !== "undefined") {
        document.querySelectorAll('[data-bs-toggle="popover"]').forEach((el) => new bootstrap.Popover(el));
    }

    async function postReward(btn) {
        const data = new FormData();
        const token = document.querySelector('input[name="csrf"]')?.value || '';

        data.append('csrf', token);
        data.append('referral_id', btn.dataset.referralId);
        data.append('campaign_reward_id', btn.dataset.campaignRewardId);
        data.append('action', btn.dataset.action); // approve|paid|cancel|pending

        btn.classList.add('disabled');
        try {
            const res = await fetch("<?= url('/app/referrals/reward/update') ?>", {
                method: 'POST',
                body: data
            });
            const json = await res.json();

            let message = json.message;
            if (message) alertRender(message.type, message.style, message.text, message.title)

            if (json.success) {
                location.reload(); // simples para refletir datas/badges
            }
        } catch (e) {
            console.error(e);
            alert('Falha ao atualizar o status. Tente novamente.');
        } finally {
            btn.classList.remove('disabled');
        }
    }

    document.querySelectorAll('.js-status-action').forEach(a => {
        a.addEventListener('click', (ev) => {
            ev.preventDefault();
            postReward(a);
        });
    });
</script>
<?php $this->end() ?>