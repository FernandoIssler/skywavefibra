<?php $this->layout("_theme") ?>

<?php
/**
 * Listagem de Usuários
 *
 * Variáveis esperadas:
 * - $users                      array|null
 * - $institutions               array|null (restritas ao escopo do ator)
 * - $unions                     array|null (restritas ao escopo do ator)
 * - $associations               array|null (restritas ao escopo do ator)
 * - $globalRoles                array|null
 * - $institutionScopedRoles     array|null
 * - $unionScopedRoles           array|null
 * - $associationScopedRoles     array|null
 * - $isSuper                    bool
 * - $canAssignGlobals           bool
 * - $canAssignUnionRoles        bool
 * - $canAssignAssocRoles        bool
 * - $canAssignInstRoles         bool
 * - $canCreateUsers             bool
 */
$q        = $q ?? ($_GET['q'] ?? '');
$roleCode = $roleCode ?? ($_GET['role_code'] ?? '');
$instId   = $institutionId ?? ($_GET['institution_id'] ?? '');
$status   = $status ?? ($_GET['status'] ?? '');
?>

<!--begin::Users Index-->
<div class="card card-flush">
    <!-- Cabeçalho -->
    <div class="card-header flex-column align-items-start pt-5 px-5 pb-0">
        <div class="d-flex w-100 justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Usuários do sistema</h2>

            <?php if (!empty($canCreateUsers)): ?>
                <a href="<?= url("/app/usuarios/nova") ?>" class="btn btn-primary">
                    <i class="ki-outline ki-plus fs-2 me-2"></i>Novo usuário
                </a>
            <?php endif; ?>
        </div>

        <!-- Filtros -->
        <form method="get" action="<?= url("/app/usuarios") ?>" class="w-100 my-5 ajax-off">
            <!-- Linha 1: busca + papel -->
            <div class="d-flex flex-wrap gap-3 mb-3">
                <div class="position-relative flex-grow-1">
                    <i class="ki-outline ki-magnifier fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-4"></i>
                    <input type="text" name="q" value="<?= htmlspecialchars($q ?? '') ?>"
                        class="form-control form-control-solid ps-12"
                        placeholder="Nome, e-mail, telefone..." />
                </div>

                <div class="flex-shrink-0" style="min-width:260px;">
                    <select name="role_code" id="filter_role_code" class="form-select form-select-solid w-100">
                        <option value="">Todas as funções</option>

                        <?php if (!empty($globalRoles)): ?>
                            <optgroup label="Globais">
                                <?php foreach ($globalRoles as $r): ?>
                                    <option value="<?= $r->code ?>"
                                        data-scope="GLOBAL"
                                        <?= ($roleCode ?? '') === $r->code ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($r->name) ?>
                                    </option>
                                <?php endforeach; ?>
                            </optgroup>
                        <?php endif; ?>

                        <?php if (!empty($isSuper) || !empty($unions)): ?>
                            <optgroup label="Por união">
                                <?php foreach (($unionScopedRoles ?? []) as $r): ?>
                                    <option value="<?= $r->code ?>"
                                        data-scope="UNION"
                                        <?= ($roleCode ?? '') === $r->code ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($r->name) ?>
                                    </option>
                                <?php endforeach; ?>
                            </optgroup>
                        <?php endif; ?>

                        <?php if (!empty($isSuper) || !empty($associations)): ?>
                            <optgroup label="Por associação">
                                <?php foreach (($associationScopedRoles ?? []) as $r): ?>
                                    <option value="<?= $r->code ?>"
                                        data-scope="ASSOCIATION"
                                        <?= ($roleCode ?? '') === $r->code ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($r->name) ?>
                                    </option>
                                <?php endforeach; ?>
                            </optgroup>
                        <?php endif; ?>

                        <?php if (!empty($institutions)): ?>
                            <optgroup label="Por instituição">
                                <?php foreach (($institutionScopedRoles ?? []) as $r): ?>
                                    <option value="<?= $r->code ?>"
                                        data-scope="INSTITUTION"
                                        <?= ($roleCode ?? '') === $r->code ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($r->name) ?>
                                    </option>
                                <?php endforeach; ?>
                            </optgroup>
                        <?php endif; ?>
                    </select>
                </div>
            </div>

            <!-- Linha 2: união + associação + instituição + status + botão -->
            <div class="d-flex flex-wrap gap-3">
                <?php if (!empty($unions)): ?>
                    <div class="flex-grow-1" id="filter_union_wrap" style="min-width:220px;">
                        <select name="union_id" id="filter_union_id" class="form-select form-select-solid w-100"
                            data-control="select2" data-placeholder="Todas as uniões">
                            <option value="">Todas as uniões</option>
                            <?php
                            $selUnion = (string)($_GET['union_id'] ?? '');
                            foreach ($unions as $u): ?>
                                <option value="<?= (int)$u->id ?>" <?= $selUnion === (string)$u->id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($u->name) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endif; ?>

                <?php if (!empty($associations)): ?>
                    <div class="flex-grow-1" id="filter_assoc_wrap" style="min-width:220px;">
                        <select name="association_id" id="filter_association_id" class="form-select form-select-solid w-100"
                            data-control="select2" data-placeholder="Todas as associações">
                            <option value="">Todas as associações</option>
                            <?php
                            $selAssoc = (string)($_GET['association_id'] ?? '');
                            foreach ($associations as $a): ?>
                                <option value="<?= (int)$a->id ?>"
                                    data-union="<?= (int)$a->union_id ?>"
                                    <?= $selAssoc === (string)$a->id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($a->name) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endif; ?>

                <?php if (!empty($institutions)): ?>
                    <div class="flex-grow-1" id="filter_inst_wrap" style="min-width:260px;">
                        <select name="institution_id" id="filter_institution_id" class="form-select form-select-solid w-100"
                            data-control="select2" data-placeholder="Todas as instituições">
                            <option value="">Todas as instituições</option>
                            <?php
                            $selInst = (string)($_GET['institution_id'] ?? '');
                            foreach ($institutions as $inst): ?>
                                <option value="<?= (int)$inst->id ?>" <?= $selInst === (string)$inst->id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($inst->name) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endif; ?>

                <div class="flex-shrink-0" style="min-width:200px;">
                    <select name="status" class="form-select form-select-solid w-100">
                        <option value="">Todos os status</option>
                        <option value="registered" <?= ($status ?? '') === 'registered' ? 'selected' : '' ?>>Registrado</option>
                        <option value="confirmed" <?= ($status ?? '') === 'confirmed'  ? 'selected' : '' ?>>Confirmado</option>
                    </select>
                </div>

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
                        <th>Usuário</th>
                        <th>E-mail / Telefone</th>
                        <th>Funções</th>
                        <th>Status</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $u): ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-40px me-3">
                                            <span class="symbol-label bg-light-primary text-primary fw-bold">
                                                <?= strtoupper(mb_substr(($u->first_name ?? 'U'), 0, 1)) ?>
                                            </span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold text-gray-900"><?= htmlspecialchars(trim(($u->first_name . ' ' . $u->last_name))) ?></span>
                                            <span class="text-muted fs-7">#<?= (int)$u->id ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <span class="text-gray-800"><?= htmlspecialchars($u->email) ?></span>
                                        <?php if (!empty($u->phone)): ?>
                                            <span class="text-muted fs-7"><?= htmlspecialchars($u->phone) ?></span>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-wrap gap-2">
                                        <?php
                                        // --- Globais ---
                                        foreach (($u->global_role_codes ?? []) as $code):
                                            $label = match ($code) {
                                                'SUPER_ADMIN' => 'Super Admin',
                                                'REFERRER'    => 'Indicador',
                                                default       => $code,
                                            };
                                        ?>
                                            <span class="badge badge-light-dark"><?= htmlspecialchars($label) ?></span>
                                        <?php endforeach; ?>

                                        <?php
                                        // --- Papéis por União (somente se ator alcança união ou é super) ---
                                        if (!empty($isSuper) || !empty($unions)):
                                            foreach (($u->union_roles ?? []) as $ur):
                                                $label = $ur['role_code'] ?? '';
                                                if (in_array($label, ['UNION_ADMIN'], true)) $label = 'Admin';
                                                if (in_array($label, ['UNION_STAFF'], true)) $label = 'Colaborador';
                                                $scope = $ur['union_name'] ?? ('#' . ($ur['union_id'] ?? ''));
                                        ?>
                                                <span class="badge badge-light-warning">
                                                    <?= htmlspecialchars($label) ?> — <?= htmlspecialchars($scope) ?>
                                                </span>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>

                                        <?php
                                        // --- Papéis por Associação (somente se ator alcança associação ou é super) ---
                                        if (!empty($isSuper) || !empty($associations)):
                                            foreach (($u->association_roles ?? []) as $ar):
                                                $label = $ar['role_code'] ?? '';
                                                if (in_array($label, ['ASSOCIATION_ADMIN'], true)) $label = 'Admin';
                                                if (in_array($label, ['ASSOCIATION_STAFF'], true)) $label = 'Colaborador';
                                                $scope = $ar['association_name'] ?? ('#' . ($ar['association_id'] ?? ''));
                                        ?>
                                                <span class="badge badge-light-info">
                                                    <?= htmlspecialchars($label) ?> — <?= htmlspecialchars($scope) ?>
                                                </span>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>

                                        <?php
                                        // --- Papéis por Instituição (sempre dentro do escopo do backend) ---
                                        foreach (($u->institution_roles ?? []) as $ir):
                                            $label = $ir['role_code'] ?? '';
                                            if (in_array($label, ['INSTITUTION_ADMIN', 'TENANT_ADMIN'], true)) $label = 'Admin';
                                            if (in_array($label, ['INSTITUTION_STAFF', 'TENANT_STAFF'], true)) $label = 'Colaborador';
                                            $scope = $ir['institution_code'] ?? ('#' . ($ir['institution_id'] ?? ''));
                                        ?>
                                            <span class="badge badge-light-primary">
                                                <?= htmlspecialchars($label) ?> — <?= htmlspecialchars($scope) ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                </td>
                                <td>
                                    <?php if (($u->status ?? '') === 'confirmed'): ?>
                                        <span class="badge badge-light-success">Confirmado</span>
                                    <?php else: ?>
                                        <span class="badge badge-light-warning">Registrado</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    <a href="<?= url("/app/usuarios/{$u->id}") ?>" class="btn btn-sm btn-light">Ver</a>

                                    <?php if (!empty($canAssignGlobals) || !empty($canAssignUnionRoles) || !empty($canAssignAssocRoles) || !empty($canAssignInstRoles)): ?>
                                        <button type="button" class="btn btn-sm btn-light-primary"
                                            data-action="manage_roles"
                                            data-user-id="<?= (int)$u->id ?>"
                                            data-user-name="<?= htmlspecialchars($u->fullName()) ?>"
                                            data-global-role-codes='<?= htmlspecialchars(json_encode($u->global_role_codes ?? [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES), ENT_QUOTES, "UTF-8") ?>'
                                            data-institution-roles='<?= htmlspecialchars(json_encode($u->institution_roles ?? [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES), ENT_QUOTES, "UTF-8") ?>'
                                            data-union-roles='<?= htmlspecialchars(json_encode($u->union_roles ?? [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES), ENT_QUOTES, "UTF-8") ?>'
                                            data-association-roles='<?= htmlspecialchars(json_encode($u->association_roles ?? [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES), ENT_QUOTES, "UTF-8") ?>'>
                                            Funções
                                        </button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted py-10">Nenhum usuário encontrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--end::Users Index-->

<!--begin::Modal Gerenciar Papéis-->
<div class="modal fade" id="kt_modal_roles" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <form class="modal-content ajax-off" id="kt_roles_form" action="<?= url("/app/users/roles") ?>" method="post">
            <input type="hidden" name="user_id" id="kt_roles_user_id" value="">

            <div class="modal-header">
                <h3 class="modal-title fw-bold">Gerenciar Funções — <span id="kt_roles_user_name"></span></h3>
                <button type="button" class="btn btn-sm btn-icon" data-bs-dismiss="modal">
                    <i class="ki-outline ki-cross fs-2"></i>
                </button>
            </div>

            <div class="modal-body">

                <!-- Abas -->
                <ul class="nav nav-tabs nav-line-tabs mb-5" role="tablist">
                    <?php if (!empty($isSuper)): ?>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-global" role="tab">Globais</a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#tab-inst" role="tab">Instituições</a>
                    </li>

                    <?php if (!empty($canAssignAssocRoles)): ?>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-assoc" role="tab">Associações</a>
                        </li>
                    <?php endif; ?>

                    <?php if (!empty($canAssignUnionRoles)): ?>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-union" role="tab">Uniões</a>
                        </li>
                    <?php endif; ?>
                </ul>

                <div class="tab-content">

                    <!-- GLOBAIS -->
                    <?php if (!empty($isSuper)): ?>
                        <div class="tab-pane fade" id="tab-global" role="tabpanel">
                            <div class="card border rounded">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="fs-6 fw-bold">Funções globais</div>
                                        <span class="text-muted fs-7">Aplicam-se ao sistema inteiro</span>
                                    </div>
                                    <div class="row g-4">
                                        <?php foreach (($globalRoles ?? []) as $r): ?>
                                            <div class="col-md-4">
                                                <label class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" name="global_roles[]" value="<?= $r->code ?>" />
                                                    <span class="form-check-label text-gray-700"><?= htmlspecialchars($r->name) ?></span>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- INSTITUIÇÕES -->
                    <div class="tab-pane fade show active" id="tab-inst" role="tabpanel">
                        <div class="card border rounded">
                            <div class="card-header d-flex justify-content-between align-items-center py-4">
                                <div class="fs-6 fw-bold">Funções por instituição</div>
                                <?php if (!empty($canAssignInstRoles)): ?>
                                    <button type="button" class="btn btn-light-primary btn-sm" id="kt_add_inst_role">
                                        <i class="ki-outline ki-plus fs-5 me-1"></i>Adicionar vínculo
                                    </button>
                                <?php endif; ?>
                            </div>
                            <div class="card-body pt-0">
                                <div class="table-responsive border rounded px-5">
                                    <table class="table align-middle mb-0">
                                        <thead>
                                            <tr class="text-muted fw-bold fs-7 text-uppercase">
                                                <th style="width:40%">Papel</th>
                                                <th style="width:50%">Instituição</th>
                                                <th class="text-end">Remover</th>
                                            </tr>
                                        </thead>
                                        <tbody id="kt_inst_roles_body"><!-- Linhas via JS --></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ASSOCIAÇÕES -->
                    <?php if (!empty($canAssignAssocRoles)): ?>
                        <div class="tab-pane fade" id="tab-assoc" role="tabpanel">
                            <div class="card border rounded">
                                <div class="card-header d-flex justify-content-between align-items-center py-4">
                                    <div class="fs-6 fw-bold">Funções por associação</div>
                                    <button type="button" class="btn btn-light-primary btn-sm" id="kt_add_association_role">
                                        <i class="ki-outline ki-plus fs-5 me-1"></i>Adicionar vínculo
                                    </button>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="table-responsive border rounded px-5">
                                        <table class="table align-middle mb-0">
                                            <thead>
                                                <tr class="text-muted fw-bold fs-7 text-uppercase">
                                                    <th style="width:40%">Papel</th>
                                                    <th style="width:50%">Associação</th>
                                                    <th class="text-end">Remover</th>
                                                </tr>
                                            </thead>
                                            <tbody id="kt_association_roles_body"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- UNIÕES -->
                    <?php if (!empty($canAssignUnionRoles)): ?>
                        <div class="tab-pane fade" id="tab-union" role="tabpanel">
                            <div class="card border rounded">
                                <div class="card-header d-flex justify-content-between align-items-center py-4">
                                    <div class="fs-6 fw-bold">Funções por união</div>
                                    <button type="button" class="btn btn-light-primary btn-sm" id="kt_add_union_role">
                                        <i class="ki-outline ki-plus fs-5 me-1"></i>Adicionar vínculo
                                    </button>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="table-responsive border rounded px-5">
                                        <table class="table align-middle mb-0">
                                            <thead>
                                                <tr class="text-muted fw-bold fs-7 text-uppercase">
                                                    <th style="width:40%">Papel</th>
                                                    <th style="width:50%">União</th>
                                                    <th class="text-end">Remover</th>
                                                </tr>
                                            </thead>
                                            <tbody id="kt_union_roles_body"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div><!-- /.tab-content -->

                <!-- TEMPLATES (mantidos no final para não poluir as abas) -->
                <template id="kt_inst_role_row_tpl">
                    <tr>
                        <td>
                            <select class="form-select form-select-solid" name="institution_roles[IDX][role_code]" required <?= empty($canAssignInstRoles) ? 'disabled' : '' ?>>
                                <option value=""></option>
                                <?php foreach (($institutionScopedRoles ?? []) as $r): ?>
                                    <option value="<?= $r->code ?>"><?= htmlspecialchars($r->name) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <select class="form-select form-select-solid" name="institution_roles[IDX][institution_id]" required <?= empty($canAssignInstRoles) ? 'disabled' : '' ?>>
                                <option value=""></option>
                                <?php foreach (($institutions ?? []) as $inst): ?>
                                    <option value="<?= (int)$inst->id ?>"><?= htmlspecialchars($inst->name) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td class="text-end">
                            <button type="button" class="btn btn-icon btn-flex btn-active-light-primary w-30px h-30px" data-action="row_remove" <?= empty($canAssignInstRoles) ? 'disabled' : '' ?>>
                                <i class="ki-outline ki-trash fs-3"></i>
                            </button>
                        </td>
                    </tr>
                </template>

                <?php if (!empty($canAssignUnionRoles)): ?>
                    <template id="kt_union_role_row_tpl">
                        <tr>
                            <td>
                                <select class="form-select form-select-solid" name="union_roles[IDX][role_code]" required>
                                    <option value=""></option>
                                    <?php foreach (($unionScopedRoles ?? []) as $r): ?>
                                        <option value="<?= $r->code ?>"><?= htmlspecialchars($r->name) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-select form-select-solid" name="union_roles[IDX][union_id]" required>
                                    <option value=""></option>
                                    <?php foreach (($unions ?? []) as $u): ?>
                                        <option value="<?= (int)$u->id ?>"><?= htmlspecialchars($u->name) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td class="text-end">
                                <button type="button" class="btn btn-icon btn-flex btn-active-light-primary w-30px h-30px" data-action="row_remove">
                                    <i class="ki-outline ki-trash fs-3"></i>
                                </button>
                            </td>
                        </tr>
                    </template>
                <?php endif; ?>

                <?php if (!empty($canAssignAssocRoles)): ?>
                    <template id="kt_association_role_row_tpl">
                        <tr>
                            <td>
                                <select class="form-select form-select-solid" name="association_roles[IDX][role_code]" required>
                                    <option value=""></option>
                                    <?php foreach (($associationScopedRoles ?? []) as $r): ?>
                                        <option value="<?= $r->code ?>"><?= htmlspecialchars($r->name) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-select form-select-solid" name="association_roles[IDX][association_id]" required>
                                    <option value=""></option>
                                    <?php foreach (($associations ?? []) as $a): ?>
                                        <option value="<?= (int)$a->id ?>"><?= htmlspecialchars($a->name) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td class="text-end">
                                <button type="button" class="btn btn-icon btn-flex btn-active-light-primary w-30px h-30px" data-action="row_remove">
                                    <i class="ki-outline ki-trash fs-3"></i>
                                </button>
                            </td>
                        </tr>
                    </template>
                <?php endif; ?>

            </div><!-- /.modal-body -->

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                <?php if (!empty($canAssignGlobals) || !empty($canAssignUnionRoles) || !empty($canAssignAssocRoles) || !empty($canAssignInstRoles)): ?>
                    <button type="submit" class="btn btn-primary">Salvar alterações</button>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>
<!--end::Modal Gerenciar Papéis-->

<?php $this->start("scripts") ?>
<script>
    (function() {
        const roleSel = document.getElementById('filter_role_code');
        const unionWrap = document.getElementById('filter_union_wrap');
        const assocWrap = document.getElementById('filter_assoc_wrap');
        const instWrap = document.getElementById('filter_inst_wrap');

        const unionSel = document.getElementById('filter_union_id');
        const assocSel = document.getElementById('filter_association_id');

        function currentScope() {
            const opt = roleSel?.selectedOptions?.[0];
            return opt ? (opt.getAttribute('data-scope') || '') : '';
        }

        function toggleByScope() {
            const scope = currentScope();

            if (instWrap) instWrap.classList.remove('d-none');

            if (unionWrap) unionWrap.classList.add('d-none');
            if (assocWrap) assocWrap.classList.add('d-none');

            if (scope === 'UNION') {
                if (unionWrap) unionWrap.classList.remove('d-none');
            } else if (scope === 'ASSOCIATION') {
                if (unionWrap) unionWrap.classList.remove('d-none');
                if (assocWrap) assocWrap.classList.remove('d-none');
            }
        }

        function filterAssociationsByUnion() {
            if (!unionSel || !assocSel) return;
            const selectedUnion = unionSel.value;
            Array.from(assocSel.options).forEach(opt => {
                if (opt.value === '') {
                    opt.hidden = false;
                    return;
                }
                const u = opt.getAttribute('data-union');
                opt.hidden = (selectedUnion && u !== selectedUnion);
            });
            const selOpt = assocSel.selectedOptions[0];
            if (selOpt && selOpt.hidden) assocSel.value = '';
        }

        roleSel?.addEventListener('change', toggleByScope);
        unionSel?.addEventListener('change', filterAssociationsByUnion);

        toggleByScope();
        filterAssociationsByUnion();
    })();
</script>

<script>
    // --- Modal Papéis ---
    const modalEl = document.getElementById('kt_modal_roles');
    const rolesForm = document.getElementById('kt_roles_form');

    // -----------------------------
    // Instituição
    // -----------------------------
    const instBody = document.getElementById('kt_inst_roles_body');
    const instTpl = document.getElementById('kt_inst_role_row_tpl');
    let instIdx = 0;

    function clearInstRows() {
        if (!instBody) return;
        instBody.innerHTML = '';
        instIdx = 0;
    }

    function addInstRow(preset = {}) {
        if (!instBody || !instTpl) return;
        const node = document.importNode(instTpl.content, true);
        node.querySelectorAll('[name]').forEach(el => el.name = el.name.replace('IDX', instIdx));
        const tr = node.querySelector('tr');
        const roleSel = tr.querySelector('[name*="[role_code]"]');
        const instSel = tr.querySelector('[name*="[institution_id]"]');
        if (preset.role_code) roleSel.value = preset.role_code;
        if (preset.institution_id) instSel.value = preset.institution_id;
        tr.querySelector('[data-action="row_remove"]')?.addEventListener('click', () => tr.remove());
        instBody.appendChild(node);
        instIdx++;
    }

    // -----------------------------
    // União
    // -----------------------------
    const unionBody = document.getElementById('kt_union_roles_body');
    const unionTpl = document.getElementById('kt_union_role_row_tpl');
    let unionIdx = 0;

    function clearUnionRows() {
        if (!unionBody) return;
        unionBody.innerHTML = '';
        unionIdx = 0;
    }

    function addUnionRow(preset = {}) {
        if (!unionBody || !unionTpl) return;
        const node = document.importNode(unionTpl.content, true);
        node.querySelectorAll('[name]').forEach(el => el.name = el.name.replace('IDX', unionIdx));
        const tr = node.querySelector('tr');
        const roleSel = tr.querySelector('[name*="[role_code]"]');
        const unionSel = tr.querySelector('[name*="[union_id]"]');
        if (preset.role_code) roleSel.value = preset.role_code;
        if (preset.union_id) unionSel.value = preset.union_id;
        tr.querySelector('[data-action="row_remove"]')?.addEventListener('click', () => tr.remove());
        unionBody.appendChild(node);
        unionIdx++;
    }

    // -----------------------------
    // Associação
    // -----------------------------
    const assocBody = document.getElementById('kt_association_roles_body');
    const assocTpl = document.getElementById('kt_association_role_row_tpl');
    let assocIdx = 0;

    function clearAssociationRows() {
        if (!assocBody) return;
        assocBody.innerHTML = '';
        assocIdx = 0;
    }

    function addAssociationRow(preset = {}) {
        if (!assocBody || !assocTpl) return;
        const node = document.importNode(assocTpl.content, true);
        node.querySelectorAll('[name]').forEach(el => el.name = el.name.replace('IDX', assocIdx));
        const tr = node.querySelector('tr');
        const roleSel = tr.querySelector('[name*="[role_code]"]');
        const assoSel = tr.querySelector('[name*="[association_id]"]');
        if (preset.role_code) roleSel.value = preset.role_code;
        if (preset.association_id) assoSel.value = preset.association_id;
        tr.querySelector('[data-action="row_remove"]')?.addEventListener('click', () => tr.remove());
        assocBody.appendChild(node);
        assocIdx++;
    }

    // -----------------------------
    // Abertura do modal + preload
    // -----------------------------
    document.querySelectorAll('[data-action="manage_roles"]').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('kt_roles_user_id').value = btn.dataset.userId;
            document.getElementById('kt_roles_user_name').textContent = btn.dataset.userName;

            // Globais
            const globalCodes = JSON.parse(btn.dataset.globalRoleCodes || '[]');
            rolesForm.querySelectorAll('input[name="global_roles[]"]').forEach(cb => {
                cb.checked = globalCodes.includes(cb.value);
            });

            // Instituição
            clearInstRows();
            const instRoles = JSON.parse(btn.dataset.institutionRoles || '[]');
            if (Array.isArray(instRoles)) instRoles.forEach(ir => addInstRow(ir));

            // União
            clearUnionRows();
            const unionRoles = JSON.parse(btn.dataset.unionRoles || '[]');
            if (Array.isArray(unionRoles)) unionRoles.forEach(ur => addUnionRow(ur));

            // Associação
            clearAssociationRows();
            const associationRoles = JSON.parse(btn.dataset.associationRoles || '[]');
            if (Array.isArray(associationRoles)) associationRoles.forEach(ar => addAssociationRow(ar));

            new bootstrap.Modal(modalEl).show();
        });
    });

    // Botões "Adicionar vínculo"
    document.getElementById('kt_add_inst_role')?.addEventListener('click', () => addInstRow());
    document.getElementById('kt_add_union_role')?.addEventListener('click', () => addUnionRow());
    document.getElementById('kt_add_association_role')?.addEventListener('click', () => addAssociationRow());

    // Validação HTML5
    rolesForm?.addEventListener('submit', (e) => {
        if (!rolesForm.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        rolesForm.classList.add('was-validated');
    });
</script>

<script>
    // --- Submissão AJAX do modal de papéis ---
    (function() {
        const form = document.getElementById('kt_roles_form');
        if (!form) return;

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const fd = new FormData(form);
            try {
                const res = await fetch(form.action, {
                    method: 'POST',
                    body: fd
                });
                const json = await res.json();

                if (json.message) {
                    try {
                        document.body.insertAdjacentHTML('beforeend', json.message);
                    } catch {
                        alert(json.success ? 'Salvo!' : 'Erro ao salvar.');
                    }
                }

                if (json.success) {
                    const m = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                    m.hide();
                    if (json.redirect) window.location.href = json.redirect;
                    else window.location.reload();
                }
            } catch {
                alert('Falha na comunicação. Tente novamente.');
            }
        });
    })();
</script>
<?php $this->end() ?>