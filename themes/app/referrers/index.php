<?php $this->layout("_theme"); ?>

<!-- Cabeçalho -->
<div class="d-flex flex-wrap align-items-center justify-content-between mb-6">
    <div>
        <h1 class="fw-bold mb-0">Indicadores</h1>
        <div class="text-muted">Usuários que realizaram indicações</div>
    </div>
    <!-- Espaço para um CTA futuro (ex.: exportar) -->
    <?php /*
    <a href="<?= url('/app/indicadores/exportar?' . http_build_query($_GET ?? [])) ?>" class="btn btn-light-primary">
        <i class="ki-outline ki-exit-up fs-4 me-2"></i>Exportar CSV
    </a>
    */ ?>
</div>

<!-- Filtros -->
<div class="card card-flush mb-6">
    <div class="card-body pt-4">
        <form class="d-flex flex-wrap align-items-end gap-3 mb-0 ajax-off p-5" method="get" action="<?= url('/app/indicadores') ?>">

            <!-- Buscar -->
            <div class="flex-grow-1" style="min-width: 280px;">
                <label class="form-label">Buscar</label>
                <div class="position-relative">
                    <i class="ki-outline ki-magnifier fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-4"></i>
                    <input
                        type="text"
                        class="form-control form-control-solid ps-12"
                        name="q"
                        value="<?= htmlspecialchars($q ?? '') ?>"
                        placeholder="Nome, e-mail..." />
                </div>
            </div>

            <!-- Instituição -->
            <div class="flex-grow-1" style="min-width: 260px; max-width: 480px;">
                <label class="form-label">Instituição</label>
                <select
                    class="form-select form-select-solid"
                    name="institution_id"
                    data-control="select2"
                    data-placeholder="Todas">
                    <option value="">Todas</option>
                    <?php foreach (($institutions ?? []) as $i): ?>
                        <option value="<?= (int)$i->id ?>" <?= ((int)($institutionId ?? 0) === (int)$i->id ? 'selected' : '') ?>>
                            <?= htmlspecialchars($i->name) ?><?= !empty($i->code) ? ' — ' . htmlspecialchars($i->code) : '' ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Ações -->
            <div class="flex-shrink-0">
                <label class="form-label d-block">&nbsp;</label>
                <div class="d-flex gap-2">
                    <button class="btn btn-primary">
                        <i class="ki-outline ki-filter fs-5 me-1"></i>Filtrar
                    </button>
                    <a href="<?= url('/app/indicadores') ?>" class="btn btn-light">Limpar</a>
                </div>
            </div>

        </form>
    </div>
</div>

<!-- Lista -->
<div class="card card-flush">
    <div class="card-body p-0">
        <div class="px-5 py-5"><!-- padding interno para afastar das bordas -->
            <div class="table-responsive">
                <table class="table align-middle table-row-dashed gy-5 mb-0">
                    <thead>
                        <tr class="text-muted fw-bold fs-7 text-uppercase">
                            <th class="min-w-250px">Indicador</th>
                            <th class="min-w-200px">E-mail</th>
                            <th class="min-w-120px text-center">Indicações</th>
                            <th class="min-w-180px">Última indicação</th>
                            <th class="text-end min-w-140px">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($referrers)): ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-12">
                                    <i class="ki-outline ki-search-list fs-2x d-block mb-2"></i>
                                    Nenhum indicador encontrado.
                                </td>
                            </tr>
                            <?php else: foreach ($referrers as $u): ?>
                                <?php
                                $fullName = trim(($u->first_name ?? '') . ' ' . ($u->last_name ?? ''));
                                $email    = $u->email ?? '—';
                                $total    = (int)($u->total_referrals ?? 0);
                                $lastAt   = !empty($u->last_referral_at) ? date('d/m/Y H:i', strtotime($u->last_referral_at)) : '—';
                                $userId   = (int)($u->id ?? $u->user_id ?? 0);
                                $initial  = mb_strtoupper(mb_substr($fullName !== '' ? $fullName : ($email ?? 'U'), 0, 1, 'UTF-8'), 'UTF-8');
                                ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-40px me-3">
                                                <span class="symbol-label bg-light-primary text-primary fw-bold">
                                                    <?= htmlspecialchars($initial) ?>
                                                </span>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <span class="fw-semibold"><?= htmlspecialchars($fullName ?: '—') ?></span>
                                                <span class="text-muted fs-7">ID: <?= $userId ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-muted">
                                        <span class="d-inline-block text-truncate" style="max-width: 260px;">
                                            <?= htmlspecialchars($email) ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-light-primary fw-bold fw-bold"><?= $total ?></span>
                                    </td>
                                    <td><?= $lastAt ?></td>
                                    <td class="text-end">
                                        <a href="<?= url('/app/indicadores/' . $userId) ?>" class="btn btn-sm btn-icon btn-light-primary">
                                            <i class="ki-outline ki-eye fs-3"></i>
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

    <?php if (($pages ?? 1) > 1): ?>
        <div class="card-footer px-5 py-4"><!-- alinhado ao padding do body -->
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <div class="text-muted">Total: <?= (int)($total ?? 0) ?></div>
                <div class="d-flex gap-2">
                    <?php $p = (int)($page ?? 1); ?>
                    <a class="btn btn-light btn-sm <?= $p <= 1 ? 'disabled' : '' ?>"
                        href="<?= url('/app/indicadores?' . http_build_query(array_merge($_GET, ['page' => max(1, $p - 1)]))) ?>">
                        <i class="ki-outline ki-left fs-5 me-1"></i>Anterior
                    </a>
                    <a class="btn btn-light btn-sm <?= $p >= ($pages ?? 1) ? 'disabled' : '' ?>"
                        href="<?= url('/app/indicadores?' . http_build_query(array_merge($_GET, ['page' => min((int)$pages, $p + 1)]))) ?>">
                        Próxima<i class="ki-outline ki-right fs-5 ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>