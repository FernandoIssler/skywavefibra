<?php $this->layout("_theme") ?>

<!--begin::Prize Create-->
<form action="/app/prizes/store" method="post" id="kt_prize_create_form">
    <!-- CSRF -->
    <!-- <input type="hidden" name="csrf" value="<?= $csrf ?? '' ?>"> -->
    <!-- Código oculto (gerado automaticamente pelo nome) -->
    <input type="hidden" name="code" id="kt_hidden_code" value="">

    <div class="card card-flush pt-3 mb-5 mb-lg-10">
        <div class="card-header">
            <div class="card-title">
                <h2 class="fw-bold">Novo prêmio</h2>
            </div>
        </div>

        <div class="card-body pt-0">
            <!-- Informações básicas -->
            <div class="d-flex flex-column mb-10 fv-row">
                <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-sm-between mb-3">
                    <div class="fs-5 fw-bold">
                        Informações básicas
                        <span class="ms-2 cursor-pointer"
                            data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true"
                            data-bs-content="Defina o nome, a instituição e o tipo do prêmio. O código será gerado automaticamente.">
                            <i class="ki-outline ki-information fs-7"></i>
                        </span>
                    </div>

                    <label class="form-check form-switch form-check-custom form-check-solid mt-2 mt-sm-0">
                        <input class="form-check-input" type="checkbox" value="1" name="active" checked />
                        <span class="form-check-label text-gray-700">Prêmio ativo</span>
                    </label>
                </div>


                <div class="row g-5">

                    <div class="col-md-4 fv-row">
                        <label class="required form-label">Nome do prêmio</label>
                        <input type="text" class="form-control form-control-solid" name="name"
                            placeholder="Ex.: Broche oficial" maxlength="150" required />
                    </div>

                    <div class="col-md-4 fv-row">
                        <label class="required form-label">Instituição</label>
                        <select class="form-select form-select-solid" data-control="select2" data-placeholder="Selecione..."
                            name="tenant_id" required>
                            <option value=""></option>
                            <!-- TODO: preencher via backend -->
                            <option value="1">UNIAENE</option>
                            <option value="2">CAF</option>
                        </select>
                    </div>

                    <div class="col-md-4 fv-row">
                        <label class="required form-label">Tipo</label>
                        <select class="form-select form-select-solid" name="type" id="kt_prize_type" required>
                            <option value=""></option>
                            <option value="PRODUCT">Produto</option>
                            <option value="VOUCHER">Voucher</option>
                            <option value="CASHBACK">Cashback / Crédito</option>
                            <option value="OTHER">Outro</option>
                        </select>
                    </div>

                </div>
            </div>

            <!-- Configurações do prêmio -->
            <div class="d-flex flex-column mb-10 fv-row">
                <div class="fs-5 fw-bold form-label mb-3">
                    Configurações do prêmio
                    <span class="ms-2 cursor-pointer" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true"
                        data-bs-content="O valor é obrigatório para todos os tipos de prêmio. Para Produto/Outro, use 0,00 se não houver valor monetário.">
                        <i class="ki-outline ki-information fs-7"></i>
                    </span>
                </div>

                <div class="row g-5">
                    <div class="col-md-6 fv-row">
                        <label class="required form-label">Valor (R$)</label>
                        <input type="number" step="0.01" min="0" class="form-control form-control-solid"
                            name="value_amount" id="kt_value_amount" placeholder="Ex.: 200.00" required />
                        <div class="form-text">Obrigatório. Para Produto/Outro, informe 0,00 se aplicável.</div>
                    </div>

                    <div class="col-md-6 fv-row">
                        <label class="form-label">Estoque total (unidades)</label>
                        <input type="number" step="1" min="0" class="form-control form-control-solid"
                            name="stock_total" placeholder="Ex.: 100" />
                        <div class="form-text">Opcional. Para prêmios físicos ou vouchers limitados.</div>
                    </div>
                </div>
            </div>

            <!-- Ações -->
            <div class="d-flex justify-content-end">
                <a href="/app/prizes" class="btn btn-light me-3">Cancelar</a>
                <button type="submit" class="btn btn-primary">Salvar prêmio</button>
            </div>
        </div>
    </div>
</form>

<script>
    // Popovers
    if (typeof bootstrap !== "undefined") {
        document.querySelectorAll('[data-bs-toggle="popover"]').forEach((el) => new bootstrap.Popover(el));
    }

    // Gera code oculto a partir do nome (MAIÚSCULO, sem acentos, com _)
    const nameEl = document.querySelector('input[name="name"]');
    const codeHidden = document.getElementById('kt_hidden_code');

    function slugifyToCode(str) {
        if (!str) return '';
        // remove acentos
        str = str.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
        // mantém A-Z 0-9 e espaço/hífen, troca separadores por _
        str = str.replace(/[^a-zA-Z0-9]+/g, '_');
        // remove underscores duplicados e bordas
        str = str.replace(/_+/g, '_').replace(/^_+|_+$/g, '');
        return ('PRZ_' + str).toUpperCase();
    }

    function syncCode() {
        codeHidden.value = slugifyToCode(nameEl.value);
    }
    nameEl?.addEventListener('input', syncCode);
    syncCode();

    // Validação no submit (valor é sempre obrigatório)
    document.getElementById('kt_prize_create_form')?.addEventListener('submit', (e) => {
        if (!e.target.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        e.target.classList.add('was-validated');
    });
</script>