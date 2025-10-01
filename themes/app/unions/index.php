<?php $this->layout("_theme") ?>

<?php
/**
 * Listagem de Uniões
 *
 * Variáveis esperadas:
 * - $unions (array|null): lista de objetos Union
 * - $q (string): termo de busca
 * - $status (string): status filtrado ('' | '0' | '1')
 * - $page (int): página atual
 * - $pages (int): total de páginas
 */
$q      = $q ?? '';
$status = $status ?? '';
$page   = (int)($page ?? 1);
$pages  = (int)($pages ?? 1);

/**
 * Gera link de paginação preservando filtros (q e status).
 */
$buildLink = function (int $p) use ($q, $status) {
    $url = url('/app/unioes') . '?page=' . $p;
    if ($q !== '')      $url .= '&q=' . urlencode($q);
    if ($status !== '') $url .= '&status=' . $status;
    return $url;
};
?>

<div class="card card-flush">
    <!-- Cabeçalho -->
    <div class="card-header flex-column align-items-start pt-5 px-5 pb-0">
        <!-- Linha 1: título + ação -->
        <div class="d-flex w-100 justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Uniões</h2>
            <a href="<?= url('/app/unioes/nova') ?>" class="btn btn-primary">
                <i class="ki-outline ki-plus fs-2 me-2"></i>Nova
            </a>
        </div>

        <!-- Linha 2: filtros -->
        <form method="get" action="<?= url('/app/unioes') ?>"
            class="d-flex flex-wrap gap-3 w-100 my-5 ajax-off">
            <!-- Campo de busca -->
            <div class="position-relative flex-grow-1">
                <i class="ki-outline ki-magnifier fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-4"></i>
                <input type="text" name="q" value="<?= htmlspecialchars($q) ?>"
                    class="form-control form-control-solid ps-12"
                    placeholder="Buscar por nome, código ou domínio..." />
            </div>

            <!-- Status -->
            <select name="status" class="form-select form-select-solid w-175px">
                <option value="" <?= $status === ''  ? 'selected' : '' ?>>Todos os status</option>
                <option value="1" <?= $status === '1' ? 'selected' : '' ?>>Ativas</option>
                <option value="0" <?= $status === '0' ? 'selected' : '' ?>>Inativas</option>
            </select>

            <!-- Botão -->
            <button class="btn btn-light">Filtrar</button>
        </form>
    </div>


    <!-- Corpo (tabela) -->
    <div class="card-body pt-0">
        <div class="table-responsive">
            <table class="table align-middle table-row-dashed fs-6 gy-4">
                <thead>
                    <tr class="text-start text-muted fw-bold text-uppercase gs-0">
                        <th class="min-w-200px">União</th>
                        <th class="min-w-150px">Domínio</th>
                        <th class="min-w-200px">Contato</th>
                        <th class="min-w-100px">Status</th>
                        <th class="text-end min-w-150px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($unions)): ?>
                        <?php foreach ($unions as $u): ?>
                            <?php
                            $statusInt = (int)($u->active ?? 0);
                            $badge     = $statusInt ? 'badge-light-success' : 'badge-light-danger';
                            $label     = $statusInt ? 'Ativa' : 'Inativa';
                            ?>
                            <tr>
                                <!-- União -->
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-45px symbol-light me-4">
                                            <span class="symbol-label fw-bold text-primary">
                                                <?= strtoupper(substr((string)$u->code, 0, 5)) ?>
                                            </span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="<?= url('/app/unioes/' . (int)$u->id) ?>"
                                                class="text-gray-900 text-hover-primary fw-bold">
                                                <?= htmlspecialchars($u->name) ?>
                                            </a>
                                        </div>
                                    </div>
                                </td>

                                <!-- Domínio -->
                                <td>
                                    <?php if (!empty($u->domain)): ?>
                                        <span class="text-gray-800">
                                            <a href="<?= htmlspecialchars($u->domain) ?>" target="_blank">
                                                <?= htmlspecialchars($u->domain) ?>
                                            </a>
                                        <?php else: ?>
                                            <span class="text-muted">—</span>
                                        <?php endif; ?>
                                </td>

                                <!-- Contato -->
                                <td>
                                    <div class="text-gray-800">
                                        <?php if (!empty($u->email)): ?>
                                            <div>
                                                <i class="ki-outline ki-sms fs-5 me-1 text-muted"></i>
                                                <?= htmlspecialchars($u->email) ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($u->phone)): ?>
                                            <div>
                                                <i class="ki-outline ki-phone fs-5 me-1 text-muted"></i>
                                                <?= htmlspecialchars($u->phone) ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (empty($u->email) && empty($u->phone)): ?>
                                            <span class="text-muted">—</span>
                                        <?php endif; ?>
                                    </div>
                                </td>

                                <!-- Status -->
                                <td><span class="badge <?= $badge ?>"><?= $label ?></span></td>

                                <!-- Ações -->
                                <td class="text-end">
                                    <a href="<?= url('/app/unioes/' . (int)$u->id) ?>" class="btn btn-sm btn-primary">
                                        Editar
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted py-10">Nenhuma união encontrada.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        <?php if ($pages > 1): ?>
            <div class="d-flex justify-content-end mt-6">
                <ul class="pagination">
                    <!-- Anterior -->
                    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?= $buildLink(max(1, $page - 1)) ?>">‹</a>
                    </li>

                    <!-- Páginas -->
                    <?php for ($p = 1; $p <= $pages; $p++): ?>
                        <li class="page-item <?= $page === $p ? 'active' : '' ?>">
                            <a class="page-link" href="<?= $buildLink($p) ?>"><?= $p ?></a>
                        </li>
                    <?php endfor; ?>

                    <!-- Próximo -->
                    <li class="page-item <?= $page >= $pages ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?= $buildLink(min($pages, $page + 1)) ?>">›</a>
                    </li>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>