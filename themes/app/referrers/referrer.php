<?php $this->layout("_theme"); ?>

<?php
// Pequenas ajudas para o resumo
$referralsCount = (int)(is_countable($referrals ?? []) ? count($referrals) : 0);
$lastReferralAt = '—';
if (!empty($referrals)) {
    $maxTs = 0;
    foreach ($referrals as $r) {
        $ts = !empty($r->created_at) ? strtotime($r->created_at) : 0;
        if ($ts > $maxTs) $maxTs = $ts;
    }
    if ($maxTs) $lastReferralAt = date('d/m/Y H:i', $maxTs);
}
$fullName = trim($referrer->fullName() ?: '');
$email    = $referrer->email ?? '—';
$phone    = $referrer->phone ?? '';
$initial  = mb_strtoupper(mb_substr($fullName !== '' ? $fullName : ($email ?: 'U'), 0, 1, 'UTF-8'), 'UTF-8');
?>

<!-- Cabeçalho -->
<div class="d-flex flex-wrap align-items-center justify-content-between mb-6">
    <div>
        <h1 class="fw-bold mb-0">Indicador</h1>
        <div class="text-muted"><?= $fullName !== '' ? htmlspecialchars($fullName) : '—' ?></div>
    </div>
    <div class="d-flex gap-2">
        <a href="<?= url('/app/indicadores') ?>" class="btn btn-light">
            <i class="ki-outline ki-left fs-5 me-2"></i>Voltar
        </a>
    </div>
</div>

<div class="row g-6">
    <!-- Coluna esquerda: Perfil -->
    <div class="col-xl-4">
        <div class="card card-flush">
            <div class="card-header">
                <div class="card-title">
                    <h2 class="mb-0">Dados do indicador</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-4">
                    <div>
                        <div class="fw-bold fs-5"><?= $fullName !== '' ? htmlspecialchars($fullName) : '—' ?></div>
                        <div class="text-muted">
                            <?php if ($email && $email !== '—'): ?>
                                <a href="mailto:<?= htmlspecialchars($email) ?>" class="text-muted text-hover-primary"><?= htmlspecialchars($email) ?></a>
                            <?php else: ?>
                                —
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($phone)): ?>
                            <div class="text-muted"><?= htmlspecialchars($phone) ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3 mb-4">
                    <div class="d-flex align-items-center">
                        <span class="badge badge-light-primary me-2">
                            <i class="ki-duotone ki-profile-user">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <div>
                            <div class="fw-bold"><?= $referralsCount ?></div>
                            <div class="text-muted fs-7">Indicaç<?= $referralsCount > 1 ? "ões" : "ão" ?></div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge badge-light me-2"><i class="ki-outline ki-time fs-6"></i></span>
                        <div>
                            <div class="fw-bold"><?= $lastReferralAt ?></div>
                            <div class="text-muted fs-7">Última indicação</div>
                        </div>
                    </div>
                </div>

                <div class="separator my-4"></div>

                <div class="text-muted fs-7">
                    Cadastrado em:
                    <?= !empty($referrer->created_at) ? date('d/m/Y H:i', strtotime($referrer->created_at)) : '—' ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Coluna direita: Lista de indicações -->
    <div class="col-xl-8">
        <div class="card card-flush">
            <div class="card-header">
                <div class="card-title d-flex align-items-center">
                    <h2 class="mb-0">Indicações realizadas</h2>
                    <span class="badge badge-light ms-3"><?= $referralsCount ?></span>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="px-5 py-5">
                    <div class="table-responsive"><!-- mantém, mas não deve ter scroll agora -->
                        <table class="table table-sm align-middle table-row-dashed gy-4 mb-0">
                            <thead>
                                <tr class="text-muted fw-bold fs-7 text-uppercase">
                                    <th>Lead / Campanha</th>
                                    <th>Instituição</th>
                                    <th>Criado em</th>
                                    <th class="text-end">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($referrals)): ?>
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-12">
                                            <i class="ki-outline ki-search-list fs-2x d-block mb-2"></i>
                                            Nenhuma indicação deste usuário.
                                        </td>
                                    </tr>
                                    <?php else: foreach ($referrals as $r): ?>
                                        <?php
                                        $id   = (int)($r->id ?? 0);
                                        $name = trim((string)($r->lead_name ?? '—'));
                                        $mail = (string)($r->lead_email ?? '—');
                                        $tel  = !empty($r->lead_phone) ? ' • ' . htmlspecialchars($r->lead_phone) : '';
                                        $camp = (string)($r->campaign_title ?? '—');
                                        $inst = (string)($r->institution_name ?? '—');
                                        $icode = !empty($r->institution_code) ? ' (' . htmlspecialchars($r->institution_code) . ')' : '';
                                        $date = !empty($r->created_at) ? date('d/m/Y H:i', strtotime($r->created_at)) : '—';
                                        ?>
                                        <tr>
                                            <!-- Coluna 1: tudo do lead + campanha empilhado -->
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="badge badge-light fw-bold">#<?= $id ?></span>
                                                        <span class="fw-semibold text-wrap"><?= htmlspecialchars($name) ?></span>
                                                    </div>
                                                    <div class="text-muted fs-7 text-wrap"><?= htmlspecialchars($mail) ?><?= $tel ?></div>
                                                    <div class="mt-1">
                                                        <span class="badge badge-light-info"><?= htmlspecialchars($camp) ?></span>
                                                    </div>
                                                </div>
                                            </td>

                                            <!-- Coluna 2: instituição -->
                                            <td class="text-wrap">
                                                <?= htmlspecialchars($inst) ?><?= $icode ?>
                                            </td>

                                            <!-- Coluna 3: data -->
                                            <td><?= $date ?></td>

                                            <!-- Coluna 4: ações (ícone) -->
                                            <td class="text-end">
                                                <a href="<?= url('/app/indicacoes/' . $id) ?>"
                                                    class="btn btn-icon btn-sm btn-light-primary"
                                                    title="Gerenciar">
                                                    <i class="ki-outline ki-setting-2 fs-5"></i>
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

        </div>
    </div>

</div>