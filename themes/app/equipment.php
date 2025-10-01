<?php $this->layout("_theme"); ?>

<form action="<?= url("/app/equipamento") ?>" method="POST" class="p-4 border rounded bg-light">
    <h3 class="mb-3">Cadastro de Equipamento</h3>

    <!-- Tipo -->
    <div class="mb-3">
        <label for="type" class="form-label">Tipo do Equipamento</label>
        <select name="type" id="type" class="form-select" required>
            <option value="">Selecione...</option>
            <option value="onu">ONU</option>
            <option value="router">Router</option>
            <option value="radio">Rádio</option>
            <option value="switch">Switch</option>
            <option value="modem">Modem</option>
        </select>
    </div>

    <!-- Fabricante -->
    <div class="mb-3">
        <label for="manufacturer" class="form-label">Fabricante</label>
        <input type="text" name="manufacturer" id="manufacturer" class="form-control" maxlength="80" required>
    </div>

    <!-- Modelo -->
    <div class="mb-3">
        <label for="model" class="form-label">Modelo</label>
        <input type="text" name="model" id="model" class="form-control" maxlength="80" required>
    </div>

    <!-- Número de Série -->
    <div class="mb-3">
        <label for="serial_number" class="form-label">Número de Série</label>
        <input type="text" name="serial_number" id="serial_number" class="form-control" maxlength="100" required>
    </div>

    <!-- Status -->
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select" required>
            <option value="available" selected>Disponível</option>
            <option value="allocated">Alocado</option>
            <option value="maintenance">Manutenção</option>
            <option value="discarded">Descartado</option>
        </select>
    </div>

    <!-- Botão -->
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>