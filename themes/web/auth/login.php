<?php $this->layout("auth/_auth"); ?>

<!--begin::Card-->
<div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
    <!--begin::Wrapper-->
    <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
        <!--begin::Form-->
        <form class="form w-100" action="<?= url("/entrar"); ?>" method="post">
            <input type="hidden" name="redirect" value="<?= htmlspecialchars($_GET['redirect'] ?? '') ?>">
            <!--begin::Heading-->
            <div class="text-center mb-11">

                <div id="alert-container-fixed"></div>
                <?= csrf_input() ?>

                <!--begin::Title-->
                <h1 class="text-gray-900 fw-bolder mb-3">SkyWave Fibra</h1>
                <!--end::Title-->
                <!--begin::Subtitle-->
                <div class="text-gray-500 fw-semibold fs-6">Cadastre-se agora e escolha seu plano</div>
                <!--end::Subtitle=-->
            </div>
            <!--begin::Heading-->

            <div class="row g-3 mb-9">
                <!--begin::Col-->
                <div class="col-md-12 text-center">
                    <!--begin::Google link=-->
                    <a href="<?= url("cadastrar") . (!empty($_GET['redirect']) ? ('?redirect=' . urlencode($_GET['redirect'])) : '') ?>"
                        class="btn btn-light-info fw-semibold">
                        Cadastre-se
                    </a>
                    <!--end::Google link=-->
                </div>

                <!--end::Col-->
            </div>

            <div class="separator separator-content my-14">
                <span class="w-175px text-gray-500 fw-semibold fs-7">Já é cliente?</span>
            </div>

            <!--begin::Input group=-->
            <div class="fv-row mb-8">
                <!--begin::Email-->
                <input type="text" placeholder="E-mail" name="email" autocomplete="off" class="form-control bg-transparent" />
                <!--end::Email-->
            </div>
            <!--end::Input group=-->
            <div class="fv-row mb-3">
                <!--begin::Password-->
                <input type="password" placeholder="Senha" name="password" autocomplete="off" class="form-control bg-transparent" />
                <!--end::Password-->
            </div>
            <!--end::Input group=-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                <div></div>
                <!--begin::Link-->
                <a href="<?= url("recuperar") ?>" class="link-primary">Esqueceu a senha ?</a>
                <!--end::Link-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Submit button-->
            <div class="d-grid mb-10">
                <button type="submit" id="kt_sign_in_submit" class="btn btn-info">
                    <!--begin::Indicator label-->
                    <span class="indicator-label">Entrar</span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">Aguarde...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    <!--end::Indicator progress-->
                </button>
            </div>
            <!--end::Submit button-->
            <!--begin::Sign up-->
            <div class="text-gray-500 text-center fw-semibold fs-6">Quer contratar um plano?
                <a href="<?= url("cadastrar") . (!empty($_GET['redirect']) ? ('?redirect=' . urlencode($_GET['redirect'])) : '') ?>"
                    class="link-primary">Cadastre-se</a>
            </div>
            <!--end::Sign up-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Wrapper-->
    <!--begin::Footer-->
    <div class="d-flex flex-stack px-lg-10">
        <!--begin::Links-->
        <div class="d-flex fw-semibold text-primary fs-base gap-5">
            <a data-bs-toggle="modal" href="#modal-terms">Termos de Uso</a>
            <a data-bs-toggle="modal" href="#modal-regulation">Regulamento</a>
        </div>
        <!--end::Links-->
    </div>
    <!--end::Footer-->
</div>
<!--end::Card-->

<!-- Modal Termos e Condições -->
<div class="modal fade" id="modal-terms" tabindex="-1" aria-labelledby="modal-termsLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Termos e Condições</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <p>
                    A <strong>Sky Wave Fibra</strong> oferece serviços de internet banda larga por fibra óptica
                    de acordo com as normas vigentes da Anatel e demais legislações aplicáveis.
                </p>
                <p>
                    A adesão a qualquer plano implica a aceitação dos presentes <strong>termos e condições</strong>,
                    que incluem prazos de fidelidade (quando aplicável), formas de pagamento, taxas de instalação
                    e políticas de uso responsável da rede.
                </p>
                <p>
                    O cliente é responsável pelo correto uso da conexão contratada, respeitando as regras de
                    segurança, integridade e compartilhamento de rede.
                </p>
                <p class="text-muted">
                    A Sky Wave Fibra reserva-se o direito de atualizar estes termos mediante comunicação prévia
                    em seus canais oficiais.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Regulamento -->
<div class="modal fade" id="modal-regulation" tabindex="-1" aria-labelledby="modal-regulationLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-1" id="modal-regulationLabel">Regulamento de Serviços</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <p>
                    O fornecimento de serviços de internet da <b>Sky Wave Fibra</b> obedece ao seguinte regulamento:
                </p>
                <ul>
                    <li><b>Elegibilidade:</b> Podem contratar os serviços pessoas físicas ou jurídicas dentro da área de cobertura da rede;</li>
                    <li><b>Instalação:</b> A instalação será realizada pela equipe técnica em data agendada junto ao cliente;</li>
                    <li><b>Validade do Contrato:</b> O contrato possui prazo mínimo definido no ato da contratação;</li>
                    <li><b>Regras de Uso:</b> É vedado o uso indevido da rede, incluindo práticas ilegais, distribuição não autorizada de sinal ou sobrecarga da infraestrutura;</li>
                    <li><b>Cancelamento:</b> O cliente poderá solicitar o cancelamento a qualquer momento, respeitadas as condições contratuais vigentes;</li>
                    <li><b>Suporte Técnico:</b> O atendimento técnico estará disponível nos canais oficiais divulgados pela empresa.</li>
                </ul>
                <p>
                    O regulamento completo é fornecido no ato da assinatura do contrato, devendo ser lido e aceito pelo cliente.
                </p>
                <p>
                    Em caso de dúvidas, entre em contato com nossa central de atendimento pelo telefone
                    <strong>(00) 0000-0000</strong> ou pelo e-mail <strong>suporte@skywavefibra.com.br</strong>.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>