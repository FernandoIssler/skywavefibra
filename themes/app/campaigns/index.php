<?php $this->layout("_theme") ?>

<?php
/**
 * Listagem de Campanhas
 *
 * Variáveis esperadas:
 * - $campaigns     array|null
 * - $institutions  array|null
 * - $q, $status, $institutionId
 * - $page, $pages, $perPage, $total
 * - $canCreate     bool
 */

$q      = $q ?? '';
$status = $status ?? '';
$instId = $institutionId ?? '';
$page   = (int)($page ?? 1);
$pages  = (int)($pages ?? 1);

$buildLink = function (int $p) use ($q, $status, $instId) {
    $url = url('/app/campanhas') . '?page=' . $p;
    if ($q !== '')      $url .= '&q=' . urlencode($q);
    if ($status !== '') $url .= '&status=' . urlencode($status);
    if ($instId !== '' && $instId !== null) $url .= '&institution_id=' . (int)$instId;
    return $url;
};

$now = new DateTime();
?>

<div class="card card-flush">
    <!-- Cabeçalho -->
    <div class="card-header flex-column align-items-start pt-5 px-5 pb-0">
        <!-- Linha 1: título + ação -->
        <div class="d-flex w-100 justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Campanhas</h2>
            <?php if (!empty($canCreate)): ?>
                <a href="<?= url('/app/campanhas/nova') ?>" class="btn btn-primary">
                    <i class="ki-outline ki-plus fs-2 me-2"></i>Nova
                </a>
            <?php endif; ?>
        </div>

        <!-- Linha 2: filtros -->
        <form method="get" action="<?= url('/app/campanhas') ?>" class="w-100 my-5 ajax-off">
            <!-- Linha 1: busca + status -->
            <div class="d-flex flex-wrap gap-3 mb-3">
                <div class="position-relative flex-grow-1">
                    <i class="ki-outline ki-magnifier fs-2 text-gray-500 position-absolute 
                        top-50 translate-middle-y ms-4"></i>
                    <input type="text" name="q" value="<?= htmlspecialchars($q) ?>"
                        class="form-control form-control-solid ps-12"
                        placeholder="Buscar por nome ou slug..." />
                </div>
                <div class="flex-shrink-0" style="min-width:200px;">
                    <select name="status" class="form-select form-select-solid w-100">
                        <option value="" <?= $status === '' ? 'selected' : '' ?>>Todos os status</option>
                        <option value="active" <?= $status === 'active' ? 'selected' : '' ?>>Ativas</option>
                        <option value="inactive" <?= $status === 'inactive' ? 'selected' : '' ?>>Inativas</option>
                        <option value="running" <?= $status === 'running' ? 'selected' : '' ?>>Em andamento</option>
                        <option value="scheduled" <?= $status === 'scheduled' ? 'selected' : '' ?>>Agendadas</option>
                        <option value="finished" <?= $status === 'finished' ? 'selected' : '' ?>>Encerradas</option>
                    </select>
                </div>
            </div>

            <!-- Linha 2: instituição + botão -->
            <div class="d-flex flex-wrap gap-3">
                <?php if (!empty($institutions)): ?>
                    <div class="flex-grow-1">
                        <select name="institution_id" class="form-select form-select-solid w-100"
                            data-control="select2" data-placeholder="Todas as instituições">
                            <option value="">Todas as instituições</option>
                            <?php foreach ($institutions as $inst): ?>
                                <option value="<?= (int)$inst->id ?>" <?= ((string)$instId === (string)$inst->id ? 'selected' : '') ?>>
                                    <?= htmlspecialchars($inst->name) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endif; ?>

                <div class="flex-shrink-0">
                    <button class="btn btn-light">Filtrar</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Corpo -->
    <div class="card-body pt-0">
        <div class="table-responsive">
            <table class="table align-middle table-row-dashed fs-6 gy-4">
                <thead>
                    <tr class="text-start text-muted fw-bold text-uppercase gs-0">
                        <th class="w-40">Campanha</th>
                        <th class="w-25">Período</th>
                        <th class="w-20">Instituição</th>
                        <th class="w-10">Status</th>
                        <th class="text-end w-15">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($campaigns)): ?>
                        <?php foreach ($campaigns as $c):
                            $active = (int)($c->active ?? 0) === 1;
                            $start  = $c->start_at ? new DateTime($c->start_at) : null;
                            $end    = $c->end_at   ? new DateTime($c->end_at)   : null;

                            // Status visual
                            if (!$active) {
                                $badge = 'badge-light-danger';
                                $label = 'Inativa';
                            } elseif ($start && $start > $now) {
                                $badge = 'badge-light-info';
                                $label = 'Agendada';
                            } elseif ($end && $end < $now) {
                                $badge = 'badge-light-dark';
                                $label = 'Encerrada';
                            } else {
                                $badge = 'badge-light-success';
                                $label = 'Em andamento';
                            }
                        ?>
                            <tr>
                                <!-- Nome + slug -->
                                <td>
                                    <div class="d-flex flex-column">
                                        <!-- Título -->
                                        <a href="<?= url('/app/campanhas/' . (int)$c->id) ?>"
                                            class="text-gray-900 text-hover-primary fw-bold">
                                            <?= htmlspecialchars($c->title) ?>
                                        </a>

                                        <!-- Slug -->
                                        <span class="text-muted fs-7">
                                            Slug: <span class="fw-semibold"><?= htmlspecialchars($c->slug ?? '') ?></span>
                                        </span>

                                        <!-- Link público -->
                                        <?php if (!empty($c->slug)): ?>
                                            <div class="d-flex align-items-center">
                                                <a href="<?= url("/c/{$c->institution_code}/" . $c->slug) ?>" target="_blank"
                                                    class="fs-7 text-primary text-hover-underline flex-grow-1 text-truncate"
                                                    style="max-width: 250px;">
                                                    <?= url("/c/{$c->institution_code}/" . $c->slug) ?>
                                                </a>
                                                <button type="button" class="btn btn-icon btn-sm btn-clean ms-1"
                                                    data-link="<?= url("/c/{$c->institution_code}/" . $c->slug) ?>"
                                                    onclick="copyLink(this)"
                                                    title="Copiar link">
                                                    <i class="ki-outline ki-copy fs-5 text-muted"></i>
                                                </button>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </td>

                                <!-- Período -->
                                <td class="text-gray-800">
                                    <div class="d-flex flex-column">
                                        <span><i class="ki-outline ki-calendar fs-5 me-1 text-muted"></i>
                                            <?= $start ? $start->format("d/m/Y H:i") : '—' ?>
                                        </span>
                                        <span class="fs-7 text-muted">até <?= $end ? $end->format("d/m/Y H:i") : '—' ?></span>
                                    </div>
                                </td>

                                <!-- Instituição -->
                                <td><span class="text-gray-800"><?= htmlspecialchars($c->institution_code ?? ('#' . (int)$c->institution_id)) ?></span></td>

                                <!-- Status -->
                                <td><span class="badge <?= $badge ?>"><?= $label ?></span></td>

                                <!-- Ações -->
                                <td class="text-end">
                                    <a href="<?= url('/app/campanhas/' . (int)$c->id) ?>" class="btn btn-sm btn-light">Ver/Editar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted py-10">
                                Nenhuma campanha encontrada.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        <?php if ($pages > 1): ?>
            <div class="d-flex justify-content-end mt-6">
                <ul class="pagination">
                    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?= $buildLink(max(1, $page - 1)) ?>">‹</a>
                    </li>
                    <?php for ($p = 1; $p <= $pages; $p++): ?>
                        <li class="page-item <?= $page === $p ? 'active' : '' ?>">
                            <a class="page-link" href="<?= $buildLink($p) ?>"><?= $p ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?= $page >= $pages ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?= $buildLink(min($pages, $page + 1)) ?>">›</a>
                    </li>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php $this->start("scripts") ?>
<script>
    function copyLink(btn) {
        const link = btn.getAttribute('data-link');
        if (!link) return;
        navigator.clipboard.writeText(link).then(() => {
            // feedback visual rápido
            btn.innerHTML = '<i class="ki-outline ki-check fs-5 text-success"></i>';
            setTimeout(() => {
                btn.innerHTML = '<i class="ki-outline ki-copy fs-5"></i>';
            }, 2000);
        });
    }
</script>
<?php $this->end() ?>