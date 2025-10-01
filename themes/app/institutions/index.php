<?php $this->layout("_theme") ?>

<?php
/**
 * Listagem de Instituições
 *
 * Variáveis esperadas:
 * - $institutions        array|null  Lista de instituições
 * - $unionsOptions       array|null  id => name (para filtro)
 * - $associationsOptions array|null  id => ['name'=>..., 'union_id'=>...]
 */

$q              = $q ?? '';
$status         = $status ?? '';
$union_id       = (string)($union_id ?? '');
$association_id = (string)($association_id ?? '');
$page           = (int)($page ?? 1);
$pages          = (int)($pages ?? 1);

// Helper de paginação
$buildLink = function (int $p) use ($q, $status, $union_id, $association_id) {
    $url = url('/app/instituicoes') . '?page=' . $p;
    if ($q !== '')               $url .= '&q=' . urlencode($q);
    if ($status !== '')          $url .= '&status=' . $status;
    if ($union_id !== '')        $url .= '&union_id=' . $union_id;
    if ($association_id !== '')  $url .= '&association_id=' . $association_id;
    return $url;
};
?>

<div class="card card-flush">
    <!-- Cabeçalho -->
    <div class="card-header flex-column align-items-start pt-5 px-5 pb-0">
        <!-- Linha 1: título + ação -->
        <div class="d-flex w-100 justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Instituições</h2>
            <a href="<?= url('/app/instituicoes/nova') ?>" class="btn btn-primary">
                <i class="ki-outline ki-plus fs-2 me-2"></i>Nova
            </a>
        </div>

        <!-- Linha 2: filtros -->
        <form method="get" action="<?= url('/app/instituicoes') ?>"
            class="w-100 my-5 ajax-off">

            <!-- Linha 1: busca + status -->
            <div class="d-flex flex-wrap gap-3 mb-3">
                <!-- Busca -->
                <div class="position-relative flex-grow-1">
                    <i class="ki-outline ki-magnifier fs-2 text-gray-500 position-absolute 
                      top-50 translate-middle-y ms-4"></i>
                    <input type="text" name="q" value="<?= htmlspecialchars($q) ?>"
                        class="form-control form-control-solid ps-12"
                        placeholder="Buscar por nome, código ou domínio..." />
                </div>

                <!-- Status -->
                <div class="flex-shrink-0" style="min-width:150px;">
                    <select name="status" class="form-select form-select-solid w-100">
                        <option value="" <?= $status === ''  ? 'selected' : '' ?>>Todos</option>
                        <option value="1" <?= $status === '1' ? 'selected' : '' ?>>Ativas</option>
                        <option value="0" <?= $status === '0' ? 'selected' : '' ?>>Inativas</option>
                    </select>
                </div>
            </div>

            <!-- Linha 2: união + associação + botão -->
            <div class="d-flex flex-wrap gap-3">
                <!-- União -->
                <div class="flex-grow-1">
                    <select name="union_id" id="filter_union"
                        class="form-select form-select-solid"
                        style="width:100%;"
                        data-control="select2" data-placeholder="Todas as uniões">
                        <option value="" <?= $union_id === '' ? 'selected' : '' ?>>Todas as uniões</option>
                        <?php if (!empty($unionsOptions)): ?>
                            <?php foreach ($unionsOptions as $uid => $uname): ?>
                                <option value="<?= (int)$uid ?>" <?= $union_id === (string)$uid ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($uname) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <!-- Associação -->
                <div class="flex-grow-1">
                    <select name="association_id" id="filter_association"
                        class="form-select form-select-solid"
                        style="width:100%;"
                        data-control="select2" data-placeholder="Todas as associações">
                        <option value="" <?= $association_id === '' ? 'selected' : '' ?>>Todas as associações</option>
                        <?php if (!empty($associationsOptions)): ?>
                            <?php foreach ($associationsOptions as $aid => $row): ?>
                                <option value="<?= (int)$aid ?>"
                                    data-union="<?= (int)$row['union_id'] ?>"
                                    <?= $association_id === (string)$aid ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($row['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <!-- Botão -->
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
                        <th class="w-35">Instituição</th>
                        <th class="d-none d-md-table-cell w-20">União / Associação</th>
                        <th class="d-none d-lg-table-cell w-20">Contato</th>
                        <th class="w-10">Status</th>
                        <th class="text-end w-15">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($institutions)): ?>
                        <?php foreach ($institutions as $i):
                            $statusInt = (int)($i->active ?? 0);
                            $badge     = $statusInt ? 'badge-light-success' : 'badge-light-danger';
                            $label     = $statusInt ? 'Ativa' : 'Inativa';
                        ?>
                            <tr>
                                <!-- Instituição -->
                                <td>
                                    <div class="d-flex flex-column">
                                        <!-- Nome + Código -->
                                        <a href="<?= url('/app/instituicoes/' . (int)$i->id) ?>"
                                            class="text-gray-900 text-hover-primary fw-bold">
                                            <?= htmlspecialchars($i->name) ?>
                                        </a>
                                        <span class="text-muted fs-7">
                                            <span class="fw-bold"><?= htmlspecialchars($i->code) ?></span>
                                        </span>
                                    </div>
                                </td>

                                <!-- União + Associação (substitui o domínio) -->
                                <td class="d-none d-md-table-cell">
                                    <span class="text-gray-800 d-block">
                                        <?= htmlspecialchars($i->union_name ?? '-') ?>
                                    </span>
                                    <span class="text-muted fs-7">
                                        <?= htmlspecialchars($i->association_name ?? '-') ?>
                                    </span>
                                </td>

                                <!-- Contato -->
                                <td class="d-none d-lg-table-cell">
                                    <?php if (!empty($i->email)): ?>
                                        <a href="mailto:<?= htmlspecialchars($i->email) ?>"
                                            class="btn btn-icon btn-light btn-sm me-1"
                                            data-bs-toggle="tooltip"
                                            title="<?= htmlspecialchars($i->email) ?>">
                                            <i class="ki-outline ki-sms fs-5"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($i->phone)): ?>
                                        <a href="tel:<?= htmlspecialchars($i->phone) ?>"
                                            class="btn btn-icon btn-light btn-sm"
                                            data-bs-toggle="tooltip"
                                            title="<?= htmlspecialchars($i->phone) ?>">
                                            <i class="ki-outline ki-phone fs-5"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (empty($i->email) && empty($i->phone)): ?>
                                        <span class="text-muted">—</span>
                                    <?php endif; ?>
                                </td>

                                <!-- Status -->
                                <td><span class="badge <?= $badge ?>"><?= $label ?></span></td>

                                <!-- Ações -->
                                <td class="text-end">
                                    <a href="<?= url('/app/instituicoes/' . (int)$i->id) ?>"
                                        class="btn btn-sm btn-primary">Editar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted py-10">
                                Nenhuma instituição encontrada.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>


            <script>
                // Inicializa tooltips do Bootstrap
                if (typeof bootstrap !== "undefined") {
                    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
                        new bootstrap.Tooltip(el);
                    });
                }
            </script>
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
    // Relacionamento dinâmico União → Associações
    (function() {
        const unionSel = document.getElementById('filter_union');
        const assocSel = document.getElementById('filter_association');
        if (!unionSel || !assocSel) return;

        function applyFilter() {
            const uid = unionSel.value;
            Array.from(assocSel.options).forEach(opt => {
                if (opt.value === '') {
                    opt.hidden = false;
                    return;
                }
                const optUnion = opt.getAttribute('data-union');
                opt.hidden = (uid !== '' && optUnion !== uid);
            });
        }

        unionSel.addEventListener('change', applyFilter);
        applyFilter();
    })();
</script>
<?php $this->end() ?>