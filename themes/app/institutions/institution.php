<?php $this->layout("_theme") ?>

<?php
/**
 * Formulário de Instituições
 *
 * Variáveis esperadas:
 * - $institution         object|null
 * - $unionsOptions       array|null
 * - $associationsOptions array|null (id => ['name'=>..., 'union_id'=>...])
 * - $formAction          string
 */

$isEdit         = !empty($institution) && !empty($institution->id);
$activeChecked  = $isEdit ? ((int)($institution->active ?? 0) === 1 ? 'checked' : '') : 'checked';
$logo           = $institution->logo ?? null;
$selectedUnion  = $selectedUnion ?? ($institution->union_id ?? null);
?>

<form action="<?= url("/app/institutions/save") ?>" method="post" id="kt_institution_form" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $institution->id ?? null ?>">

    <div class="card card-flush pt-5 px-5 pb-0 mb-5 mb-lg-10">
        <!-- Cabeçalho -->
        <div class="card-header d-flex justify-content-between align-items-center w-100 pb-4">
            <h2 class="fw-bold mb-0"><?= $isEdit ? "Editar Instituição" : "Nova Instituição" ?></h2>
            <label class="form-check form-switch form-check-custom form-check-solid mb-0">
                <input class="form-check-input" type="checkbox" name="active" value="1" <?= $activeChecked ?> />
                <span class="form-check-label text-gray-700">Instituição ativa</span>
            </label>
        </div>

        <div class="card-body pt-0">
            <!-- Seção: Informações básicas -->
            <div class="d-flex flex-column mb-10 fv-row">
                <div class="fs-5 fw-bold mb-3">
                    Informações básicas
                    <span class="ms-2 cursor-pointer" data-bs-toggle="popover" data-bs-trigger="hover"
                        data-bs-content="Selecione a União e a Associação, defina nome e código da instituição.">
                        <i class="ki-outline ki-information fs-7"></i>
                    </span>
                </div>

                <div class="row g-5">
                    <!-- União -->
                    <div class="col-md-4 fv-row">
                        <label class="required form-label">União</label>
                        <select class="form-select form-select-solid" id="field_union" name="union_id"
                            data-control="select2" required>
                            <option value="">Selecione a União</option>
                            <?php foreach (($unionsOptions ?? []) as $uid => $uname): ?>
                                <option value="<?= (int)$uid ?>"
                                    <?= ((string)$selectedUnion === (string)$uid) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($uname) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Associação -->
                    <div class="col-md-5 fv-row">
                        <label class="required form-label">Associação</label>
                        <select class="form-select form-select-solid" id="field_association" name="association_id"
                            data-control="select2" required>
                            <option value="">Selecione a Associação</option>
                            <?php foreach (($associationsOptions ?? []) as $aid => $row): ?>
                                <option value="<?= (int)$aid ?>"
                                    data-union="<?= (int)$row['union_id'] ?>"
                                    <?= ((string)($institution->association_id ?? '') === (string)$aid) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($row['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="form-text">A lista de associações é filtrada pela União.</div>
                    </div>

                    <!-- Sigla -->
                    <div class="col-md-3 fv-row">
                        <label class="required form-label">Sigla</label>
                        <input type="text" class="form-control form-control-solid" name="code"
                            placeholder="Ex.: UNIAENE"
                            value="<?= htmlspecialchars($institution->code ?? '') ?>"
                            maxlength="30" required />
                        <div class="form-text">Ex: UNIAENE</div>
                    </div>
                </div>

                <div class="row g-5 mt-0">
                    <!-- Nome -->
                    <div class="col-md-6 fv-row">
                        <label class="required form-label">Nome da Instituição</label>
                        <input type="text" class="form-control form-control-solid" name="name"
                            placeholder="Ex.: Centro Universitário AENE"
                            value="<?= htmlspecialchars($institution->name ?? '') ?>"
                            maxlength="150" required />
                    </div>

                    <!-- Domínio -->
                    <div class="col-md-6 fv-row">
                        <label class="form-label">Domínio (opcional)</label>
                        <input type="text" class="form-control form-control-solid" name="domain"
                            placeholder="ex.: uniaene.edu.br"
                            value="<?= htmlspecialchars($institution->domain ?? '') ?>" />
                    </div>
                </div>

                <div class="row g-5 mt-0">
                    <!-- E-mail -->
                    <div class="col-md-6 fv-row">
                        <label class="form-label">E-mail</label>
                        <input type="email" class="form-control form-control-solid" name="email"
                            placeholder="contato@instituicao.edu.br"
                            value="<?= htmlspecialchars($institution->email ?? '') ?>" />
                    </div>

                    <!-- Telefone -->
                    <div class="col-md-6 fv-row">
                        <label class="form-label">Telefone</label>
                        <input type="text" class="form-control form-control-solid phone" name="phone"
                            placeholder="(00) 00000-0000"
                            value="<?= htmlspecialchars($institution->phone ?? '') ?>" />
                    </div>
                </div>

                <div class="row g-5 mt-0">
                    <!-- Estado -->
                    <div class="col-md-6 fv-row">
                        <label class="required form-label">Estado</label>
                        <select class="form-select form-select-solid" name="state" id="field_state" required>
                            <option value="">Selecione o estado</option>
                        </select>
                    </div>

                    <!-- Cidade -->
                    <div class="col-md-6 fv-row">
                        <label class="required form-label">Cidade</label>
                        <select class="form-select form-select-solid" name="city" id="field_city" required>
                            <option value="">Selecione primeiro o estado</option>
                        </select>
                    </div>
                </div>
            </div>

            <hr>

            <!-- Seção: Identidade Visual -->
            <div class="d-flex flex-column mb-10 fv-row">
                <div class="fs-5 fw-bold form-label mb-3">
                    Identidade Visual
                    <span class="ms-2 cursor-pointer" data-bs-toggle="popover" data-bs-trigger="hover"
                        data-bs-content="Logo e foto são opcionais. A foto será usada em murais públicos.">
                        <i class="ki-outline ki-information fs-7"></i>
                    </span>
                </div>

                <div class="row g-5">
                    <!-- Logo -->
                    <div class="col-md-6 fv-row">
                        <label class="form-label">Logo (PNG/JPG)</label>
                        <input type="file" class="form-control form-control-solid" name="logo" accept=".png,.jpg,.jpeg,.webp" />
                        <div class="form-text"><?= $logo ? "Envie um arquivo para substituir o logo atual." : "Opcional. Até 2MB." ?></div>
                    </div>
                    <div class="col-md-6 d-flex align-items-end">
                        <div id="kt_inst_logo_preview" class="<?= $logo ? '' : 'd-none' ?>">
                            <div class="fw-semibold mb-2">Pré-visualização:</div>
                            <img src="<?= $logo ? image($logo, 600) : '#' ?>" alt="Prévia do logo"
                                class="img-fluid rounded border" style="max-height: 64px;">
                        </div>
                    </div>
                </div>

                <div class="row g-5 mt-0">
                    <!-- Foto -->
                    <div class="col-md-6 fv-row">
                        <label class="form-label">Foto da Instituição (PNG/JPG)</label>
                        <input type="file" class="form-control form-control-solid" name="photo" accept=".png,.jpg,.jpeg,.webp" />
                        <div class="form-text"><?= !empty($institution->photo) ? "Envie para substituir a foto atual." : "Opcional. Até 2MB." ?></div>
                    </div>
                    <div class="col-md-6 d-flex align-items-end">
                        <div id="kt_inst_photo_preview" class="<?= !empty($institution->photo) ? '' : 'd-none' ?>">
                            <div class="fw-semibold mb-2">Pré-visualização:</div>
                            <img src="<?= !empty($institution->photo) ? image($institution->photo, 600) : '#' ?>" alt="Prévia da foto"
                                class="img-fluid rounded border" style="max-height: 120px;">
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <!-- Seção: Links -->
            <div class="d-flex flex-column mb-10 fv-row">
                <div class="fs-5 fw-bold form-label mb-3">Links e Contatos Online</div>

                <div class="row g-5">
                    <div class="col-md-6 fv-row">
                        <label class="form-label">Site</label>
                        <input type="url" class="form-control form-control-solid" name="website"
                            placeholder="https://www.instituicao.edu.br"
                            value="<?= htmlspecialchars($institution->website ?? '') ?>" />
                    </div>
                    <div class="col-md-6 fv-row">
                        <label class="form-label">WhatsApp</label>
                        <input type="text" class="form-control form-control-solid phone" name="whatsapp"
                            placeholder="(00) 00000-0000"
                            value="<?= htmlspecialchars($institution->whatsapp ?? '') ?>" />
                    </div>
                </div>

                <div class="row g-5 mt-0">
                    <div class="col-md-6 fv-row">
                        <label class="form-label">Facebook</label>
                        <input type="url" class="form-control form-control-solid" name="facebook"
                            placeholder="https://facebook.com/instituicao"
                            value="<?= htmlspecialchars($institution->facebook ?? '') ?>" />
                    </div>
                    <div class="col-md-6 fv-row">
                        <label class="form-label">Instagram</label>
                        <input type="url" class="form-control form-control-solid" name="instagram"
                            placeholder="https://instagram.com/instituicao"
                            value="<?= htmlspecialchars($institution->instagram ?? '') ?>" />
                    </div>
                </div>

                <div class="row g-5 mt-0">
                    <div class="col-md-6 fv-row">
                        <label class="form-label">YouTube</label>
                        <input type="url" class="form-control form-control-solid" name="youtube"
                            placeholder="https://youtube.com/instituicao"
                            value="<?= htmlspecialchars($institution->youtube ?? '') ?>" />
                    </div>
                    <div class="col-md-6 fv-row">
                        <label class="form-label">Twitter</label>
                        <input type="url" class="form-control form-control-solid" name="twitter"
                            placeholder="https://twitter.com/instituicao"
                            value="<?= htmlspecialchars($institution->twitter ?? '') ?>" />
                    </div>
                </div>

                <div class="row g-5 mt-0">
                    <div class="col-md-6 fv-row">
                        <label class="form-label">TikTok</label>
                        <input type="url" class="form-control form-control-solid" name="tiktok"
                            placeholder="https://tiktok.com/@instituicao"
                            value="<?= htmlspecialchars($institution->tiktok ?? '') ?>" />
                    </div>
                    <div class="col-md-6 fv-row">
                        <label class="form-label">LinkedIn</label>
                        <input type="url" class="form-control form-control-solid" name="linkedin"
                            placeholder="https://linkedin.com/instituicao"
                            value="<?= htmlspecialchars($institution->linkedin ?? '') ?>" />
                    </div>
                </div>
            </div>

            <!-- Ações -->
            <div class="d-flex justify-content-end">
                <a href="/app/instituicoes" class="btn btn-light me-3">Cancelar</a>
                <button type="submit" class="btn btn-primary">
                    <?= $isEdit ? "Salvar alterações" : "Salvar Instituição" ?>
                </button>
            </div>
        </div>
    </div>
</form>

<?php $this->start("scripts") ?>
<!-- jQuery Mask para telefone -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    const SPMaskBehavior = function(val) {
        return val.replace(/\D/g, '').length === 11 ?
            '(00) 00000-0000' :
            '(00) 0000-00009';
    };

    const spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };

    $('.phone').mask(SPMaskBehavior, spOptions);
</script>

<script>
    // Popovers
    if (typeof bootstrap !== "undefined") {
        document.querySelectorAll('[data-bs-toggle="popover"]').forEach((el) => new bootstrap.Popover(el));
    }

    // Relacionamento União → Associações
    (function() {
        const unionSel = document.getElementById('field_union');
        const assocSel = document.getElementById('field_association');
        if (!unionSel || !assocSel) return;

        function filterAssociations() {
            const uid = unionSel.value;
            Array.from(assocSel.options).forEach(opt => {
                if (opt.value === '') return opt.hidden = false;
                const optUnion = opt.getAttribute('data-union');
                opt.hidden = (uid !== '' && optUnion !== uid);
            });
            // limpa se associação não pertencer à união
            if (assocSel.value && assocSel.selectedOptions[0].getAttribute('data-union') !== uid) {
                assocSel.value = '';
            }
        }
        unionSel.addEventListener('change', filterAssociations);
        filterAssociations();
    })();

    // Pré-visualização de logo
    const logoInput = document.querySelector('input[name="logo"]');
    const logoWrap = document.getElementById('kt_inst_logo_preview');
    const logoImg = logoWrap?.querySelector('img');
    logoInput?.addEventListener('change', (e) => {
        const f = e.target.files?.[0];
        if (!f || !logoImg) return;
        logoImg.src = URL.createObjectURL(f);
        logoWrap.classList.remove('d-none');
    });

    // Pré-visualização de foto
    const photoInput = document.querySelector('input[name="photo"]');
    const photoWrap = document.getElementById('kt_inst_photo_preview');
    const photoImg = photoWrap?.querySelector('img');
    photoInput?.addEventListener('change', (e) => {
        const f = e.target.files?.[0];
        if (!f || !photoImg) return;
        photoImg.src = URL.createObjectURL(f);
        photoWrap.classList.remove('d-none');
    });

    // Validação nativa do formulário
    document.getElementById('kt_institution_form')?.addEventListener('submit', (e) => {
        if (!e.target.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        e.target.classList.add('was-validated');
    });

    // Estados e cidades (API IBGE)
    $(document).ready(function() {
        $('#field_state, #field_city').select2();

        // Carregar estados
        fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome")
            .then(res => res.json())
            .then(estados => {
                estados.forEach(e => {
                    let opt = new Option(e.nome, e.sigla, false, "<?= $institution->state ?? '' ?>" === e.sigla);
                    $('#field_state').append(opt);
                });
                $('#field_state').trigger('change');
                if ($('#field_state').val()) {
                    carregarCidades($('#field_state').val(), "<?= $institution->city ?? '' ?>");
                }
            });

        // Carregar cidades ao mudar estado
        $('#field_state').on('change', function() {
            carregarCidades(this.value);
        });

        function carregarCidades(uf, selectedCity = "") {
            $('#field_city').empty().append(new Option("Selecione a cidade", "", true, false));
            if (!uf) return;
            fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${uf}/municipios`)
                .then(res => res.json())
                .then(cidades => {
                    cidades.forEach(c => {
                        let opt = new Option(c.nome, c.nome, false, selectedCity === c.nome);
                        $('#field_city').append(opt);
                    });
                    $('#field_city').trigger('change');
                });
        }
    });
</script>
<?php $this->end() ?>