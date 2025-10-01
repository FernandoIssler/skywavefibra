<?php $this->layout("_theme"); ?>

<?php
// Espera:
// $leads, $institutions, $q, $institutionId, $page, $pages, $perPage, $total
?>

<div class="d-flex flex-wrap align-items-center justify-content-between mb-6">
    <div>
        <h1 class="fw-bold mb-0">Leads</h1>
        <div class="text-muted">Pessoas indicadas</div>
    </div>
</div>

<div class="card card-flush mb-6">
    <div class="card-body pt-4">
        <form class="row g-4" method="get" action="<?= url('/app/leads') ?>">
            <div class="col-md-6">
                <label class="form-label">Busca</label>
                <input type="text" class="form-control" name="q" value="<?= htmlspecialchars($q ?? '') ?>" placeholder="Nome, e-mail, telefone...">
            </div>
            <div class="col-md-4">
                <label class="form-label">Instituição (com indicação para)</label>
                <select class="form-select" name="institution_id">
                    <option value="">Todas</option>
                    <?php foreach ($institutions ?? [] as $i): ?>
                        <option value="<?= (int)$i->id ?>" <?= ((int)($institutionId ?? 0) === (int)$i->id ? 'selected' : '') ?>>
                            <?= htmlspecialchars($i->name) ?> (<?= htmlspecialchars($i->code ?? '') ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-12 d-flex gap-2">
                <button class="btn btn-primary">Filtrar</button>
                <a class="btn btn-light" href="<?= url('/app/leads') ?>">Limpar</a>
            </div>
        </form>
    </div>
</div>

<div class="card card-flush">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table align-middle table-row-dashed mb-0">
                <thead>
                    <tr class="text-muted fw-bold text-uppercase">
                        <th>Lead</th>
                        <th>Contato</th>
                        <th>Indicações</th>
                        <th>Última indicação</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($leads)): ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted py-10">Nenhum lead encontrado.</td>
                        </tr>
                        <?php else: foreach ($leads as $l): ?>
                            <tr>
                                <td class="fw-semibold"><?= htmlspecialchars($l->name ?? '—') ?></td>
                                <td class="text-muted">
                                    <?= htmlspecialchars($l->email ?? '—') ?>
                                    <?= !empty($l->phone) ? ' • ' . htmlspecialchars($l->phone) : '' ?>
                                </td>
                                <td class="fw-bold"><?= (int)($l->total_referrals ?? 0) ?></td>
                                <td><?= !empty($l->last_referral_at) ? date('d/m/Y H:i', strtotime($l->last_referral_at)) : '—' ?></td>
                                <td class="text-end">
                                    <a href="<?= url('/app/leads/' . (int)($l->id ?? 0)) ?>" class="btn btn-sm btn-light-primary">Ver / Editar</a>
                                </td>
                            </tr>
                    <?php endforeach;
                    endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php if (($pages ?? 1) > 1): ?>
        <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-muted">Total: <?= (int)($total ?? 0) ?></div>
                <div class="d-flex gap-2">
                    <?php $p = (int)($page ?? 1); ?>
                    <a class="btn btn-light btn-sm <?= $p <= 1 ? 'disabled' : '' ?>"
                        href="<?= url('/app/leads?' . http_build_query(array_merge($_GET, ['page' => max(1, $p - 1)]))) ?>">Anterior</a>
                    <a class="btn btn-light btn-sm <?= $p >= ($pages ?? 1) ? 'disabled' : '' ?>"
                        href="<?= url('/app/leads?' . http_build_query(array_merge($_GET, ['page' => min((int)$pages, $p + 1)]))) ?>">Próxima</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>