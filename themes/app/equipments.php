<?php $this->layout("_theme"); ?>

Lista de Equipamentos

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Fabricante</th>
            <th>Modelo</th>
            <th>Número de Série</th>
            <th>Status</th>
            <th>Criado em</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($equipments) && is_array($equipments)): ?>
            <?php foreach ($equipments as $equipment): ?>
                <tr>
                    <td><?= $equipment->id ?></td>
                    <td><?= $equipment->type ?></td>
                    <td><?= $equipment->manufacturer ?></td>
                    <td><?= $equipment->model ?></td>
                    <td><?= $equipment->serial_number ?></td>
                    <td><?= $equipment->status ?></td>
                    <td><?= date_fmt($equipment->created_at, "d/m/Y H:i:s") ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">Nenhum equipamento encontrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>