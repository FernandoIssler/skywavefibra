<?php $this->layout("_theme"); ?>

<!-- Cabeçalho -->
<div class="d-flex flex-wrap align-items-center justify-content-between mb-6">
    <div>
        <h1 class="fw-bold mb-0">Indicações</h1>
        <div class="text-muted">Visualize e gerencie todas as indicações</div>
    </div>
</div>

<!-- Filtros -->
<div class="card card-flush mb-6 p-5">
    <div class="card-body pt-4">
        <form class="row g-3 align-items-end ajax-off" method="get" action="<?= url('/app/indicacoes') ?>">
            <!-- Busca -->
            <div class="col-md-4">
                <label class="form-label">Busca</label>
                <div class="position-relative">
                    <i class="ki-outline ki-magnifier fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-4"></i>
                    <input
                        type="text"
                        class="form-control form-control-solid ps-12"
                        name="q"
                        value="<?= htmlspecialchars($q ?? '') ?>"
                        placeholder="Lead, indicador, e-mail, telefone..." />
                </div>
            </div>

            <!-- Instituição -->
            <div class="col-md-3">
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

            <!-- Campanha -->
            <div class="col-md-3">
                <label class="form-label">Campanha</label>
                <select
                    class="form-select form-select-solid"
                    name="campaign_id"
                    data-control="select2"
                    data-placeholder="Todas">
                    <option value="">Todas</option>
                    <?php foreach (($campaigns ?? []) as $c): ?>
                        <option value="<?= (int)$c->id ?>" <?= ((int)($campaignId ?? 0) === (int)$c->id ? 'selected' : '') ?>>
                            <?= htmlspecialchars($c->title) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Status -->
            <div class="col-md-2">
                <label class="form-label">Status</label>
                <select class="form-select form-select-solid" name="status">
                    <?php $opts = ['' => 'Todos', 'pending' => 'Pendente', 'approved' => 'Aprovada', 'paid' => 'Paga', 'cancelled' => 'Cancelada'];
                    $st = $status ?? ''; ?>
                    <?php foreach ($opts as $k => $label): ?>
                        <option value="<?= $k ?>" <?= ($st === $k ? 'selected' : '') ?>><?= $label ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Ações -->
            <div class="col-md-auto">
                <label class="form-label d-block">&nbsp;</label>
                <div class="d-flex gap-2">
                    <button class="btn btn-primary">
                        <i class="ki-outline ki-filter fs-5 me-1"></i>Filtrar
                    </button>
                    <a class="btn btn-light" href="<?= url('/app/indicacoes') ?>">Limpar</a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Lista -->
<div class="card card-flush">
    <div class="card-body p-5">
        <div class="table-responsive">
            <table class="table align-middle table-row-dashed mb-0">
                <thead>
                    <tr class="text-muted fw-bold text-uppercase">
                        <th>#</th>
                        <th>Lead</th>
                        <th>Indicador</th>
                        <th>Campanha</th>
                        <th>Instituição</th>
                        <th>Criado em</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($referrals)): ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted py-10">Nenhuma indicação encontrada.</td>
                        </tr>
                        <?php else: foreach ($referrals as $r): ?>
                            <tr>
                                <td class="fw-bold">#<?= (int)($r->id ?? 0) ?></td>
                                <td>
                                    <div class="fw-semibold"><?= htmlspecialchars($r->lead_name ?? '—') ?></div>
                                    <div class="text-muted fs-7"><?= htmlspecialchars($r->lead_email ?? '—') ?><?= !empty($r->lead_phone) ? ' <br> ' . htmlspecialchars($r->lead_phone) : '' ?></div>
                                </td>
                                <td>
                                    <div class="fw-semibold"><?= htmlspecialchars($r->referrer_name ?? '—') ?></div>
                                    <div class="text-muted fs-7"><?= htmlspecialchars($r->referrer_email ?? '—') ?></div>
                                </td>
                                <td><?= htmlspecialchars($r->campaign_title ?? '—') ?></td>
                                <td>
                                    <?= htmlspecialchars($r->institution_name ?? '—') ?>
                                    <?php if (!empty($r->institution_code)): ?>
                                        <span class="text-muted"> (<?= htmlspecialchars($r->institution_code) ?>)</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= !empty($r->created_at) ? date('d/m/Y H:i', strtotime($r->created_at)) : '—' ?></td>
                                <td class="text-end">
                                    <div class="btn-group">
                                        <a href="<?= url('/app/indicacoes/' . (int)($r->id ?? 0)) ?>" class="btn btn-sm btn-light-primary">Indicação</a>
                                        <?php if (!empty($r->lead_id)): ?>
                                            <a href="<?= url('/app/leads/' . (int)$r->lead_id) ?>" class="btn btn-sm btn-light">Lead</a>
                                        <?php endif; ?>
                                        <?php if (!empty($r->referrer_user_id)): ?>
                                            <a href="<?= url('/app/indicadores/' . (int)$r->referrer_user_id) ?>" class="btn btn-sm btn-light">Indicador</a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                    <?php endforeach;
                    endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php if (($pages ?? 1) > 1): ?>
        <div class="card-footer px-5 py-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-muted">Total: <?= (int)($total ?? 0) ?></div>
                <div class="d-flex gap-2">
                    <?php $p = (int)($page ?? 1); ?>
                    <a class="btn btn-light btn-sm <?= $p <= 1 ? 'disabled' : '' ?>"
                        href="<?= url('/app/indicacoes?' . http_build_query(array_merge($_GET, ['page' => max(1, $p - 1)]))) ?>">
                        <i class="ki-outline ki-left fs-5 me-1"></i>Anterior
                    </a>
                    <a class="btn btn-light btn-sm <?= $p >= ($pages ?? 1) ? 'disabled' : '' ?>"
                        href="<?= url('/app/indicacoes?' . http_build_query(array_merge($_GET, ['page' => min((int)$pages, $p + 1)]))) ?>">
                        Próxima<i class="ki-outline ki-right fs-5 ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>