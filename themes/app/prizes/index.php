<?php $this->layout("_theme") ?>

<?php
/**
 * Listagem de Recompensas
 *
 * Variáveis esperadas:
 * - $prizes        array|null   Lista de recompensas
 * - $institutions  array|null   Instituições acessíveis
 * - $canCreate     bool         Permissão para criar nova recompensa
 * - $page          int          Página atual
 * - $perPage       int          Itens por página
 * - $total         int          Total de itens
 */

$q       = trim($_GET['q'] ?? '');
$type    = $_GET['type'] ?? '';
$status  = $_GET['status'] ?? '';
$instId  = $_GET['institution_id'] ?? '';
$page    = (int)($page ?? 1);
$perPage = (int)($perPage ?? 25);
$total   = (int)($total ?? 0);
$pages   = (int)ceil(max(1, $total) / $perPage);

// Helper para manter filtros na paginação
$buildLink = function (int $p) use ($q, $type, $status, $instId) {
    $params = ['page' => $p];
    if ($q !== '')      $params['q'] = $q;
    if ($type !== '')   $params['type'] = $type;
    if ($status !== '') $params['status'] = $status;
    if ($instId !== '') $params['institution_id'] = $instId;
    return url('/app/recompensas') . '?' . http_build_query($params);
};

// Map de tipos
$typeLabels = [
    'CASHBACK' => 'Cashback',
    'PRODUCT'  => 'Produto',
    'VOUCHER'  => 'Voucher',
];
?>

<div class="card card-flush">
    <!-- Cabeçalho -->
    <div class="card-header flex-column align-items-start pt-5 px-5 pb-0">
        <!-- Linha 1: título + ação -->
        <div class="d-flex w-100 justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Recompensas</h2>
            <?php if (!empty($canCreate)): ?>
                <a href="<?= url('/app/recompensas/nova') ?>" class="btn btn-primary">
                    <i class="ki-outline ki-plus fs-2 me-2"></i>Nova
                </a>
            <?php endif; ?>
        </div>


        <!-- Filtros -->
        <form method="get" action="<?= url("/app/recompensas") ?>" class="w-100 my-5 ajax-off">
            <!-- Linha 1: busca + status -->
            <div class="d-flex flex-wrap gap-3 mb-3">
                <div class="position-relative flex-grow-1">
                    <input type="text" name="q" value="<?= htmlspecialchars($q) ?>"
                        class="form-control form-control-solid"
                        placeholder="Nome ou descrição..." />
                </div>
                <div class="flex-shrink-0" style="min-width:200px;">
                    <select class="form-select form-select-solid" name="type">
                        <option value="">Todos os tipos</option>
                        <?php foreach ($typeLabels as $k => $v): ?>
                            <option value="<?= $k ?>" <?= $type === $k ? 'selected' : '' ?>><?= $v ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="d-flex flex-wrap gap-3">
                <div class="flex-grow-1">
                    <select class="form-select form-select-solid" name="institution_id">
                        <option value="">Todas as Instituições</option>
                        <?php foreach (($institutions ?? []) as $inst): ?>
                            <option value="<?= (int)$inst->id ?>" <?= (string)$instId === (string)$inst->id ? 'selected' : '' ?>>
                                <?= htmlspecialchars($inst->name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex-grow-1">
                    <select class="form-select form-select-solid" name="status">
                        <option value="">Todos os Status</option>
                        <option value="1" <?= $status === '1' ? 'selected' : '' ?>>Ativas</option>
                        <option value="0" <?= $status === '0' ? 'selected' : '' ?>>Inativas</option>
                    </select>
                </div>

                <div class="flex-shrink-0">
                    <button class="btn btn-light">Filtrar</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Tabela -->
    <div class="card-body pt-0">
        <div class="table-responsive">
            <table class="table align-middle table-row-dashed fw-semibold fs-6 gy-4">
                <thead>
                    <tr class="text-start text-muted fw-bold text-uppercase gs-0">
                        <th class="w-20">Recompensa</th>
                        <th class="w-10">Tipo</th>
                        <th class="w-15">Valor</th>
                        <th class="w-25">Instituição</th>
                        <th class="w-10">Status</th>
                        <th class="w-10 text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($prizes)): ?>
                        <?php foreach ($prizes as $p): ?>
                            <?php
                            $isActive = (int)($p->active ?? 0) === 1;
                            $badge = $isActive ? 'badge-light-success' : 'badge-light-danger';
                            $label = $isActive ? 'Ativa' : 'Inativa';
                            ?>
                            <tr>
                                <td>
                                    <div class="d-flex flex-column">
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold text-gray-900"><?= htmlspecialchars($p->name) ?></span>
                                            <span class="text-muted fs-7"><?= htmlspecialchars($p->description ?? '') ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td>

                                    <span class="text-gray-800"><?= $typeLabels[$p->type] ?? $p->type ?></span>

                                </td>
                                <td>

                                    R$ <?= number_format((float)$p->value, 2, ',', '.') ?>

                                </td>
                                <td>

                                    <span class="fw-bold text-gray-900">
                                        <?= htmlspecialchars($p->institution_code ?? '—') ?> <span class="text-muted"><?= htmlspecialchars($p->institution_name) ?></span>
                                    </span>

                                </td>
                                <td>

                                    <span class="badge <?= $badge ?>"><?= $label ?></span>

                                </td>
                                <td class="text-end">

                                    <a href="<?= url('/app/recompensas/' . (int)$p->id) ?>" class="btn btn-sm btn-light">Ver/Editar</a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted py-10">Nenhuma recompensa encontrada.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
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