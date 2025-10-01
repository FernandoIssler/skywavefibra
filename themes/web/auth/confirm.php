<?php $this->layout("auth/_auth"); ?>


<!--begin::Card-->
<div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
    <!--begin::Wrapper-->
    <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
        <!--begin::Form-->
        <form action="<?= url("/confirm"); ?>" method="post" class="form w-100 mb-13" novalidate="novalidate" data-kt-redirect-url="index.html" id="kt_sing_in_two_factor_form">
            <div id="alert-container-fixed"></div>
            <?= csrf_input(); ?>
            <input type="hidden" name="email" value="<?= $email ?>">
            <input type="hidden" name="confirm" value="true">
            <input type="hidden" name="redirect" value="<?= htmlspecialchars($_GET['redirect'] ?? '') ?>">
            <!--begin::Icon-->
            <div class="text-center mb-10">
                <img alt="Logo" class="mh-125px" src="assets/media/illustrations/sigma-1/17.png" />
            </div>
            <!--end::Icon-->
            <!--begin::Heading-->
            <div class="text-center mb-10">
                <!--begin::Title-->
                <h1 class="text-gray-900 mb-3">Confirmação</h1>
                <!--end::Title-->
                <!--begin::Sub-title-->
                <div class="text-muted fw-semibold fs-5 mb-5">Digite o código de verificação enviado para</div>
                <!--end::Sub-title-->
                <!--begin::Mobile no-->
                <div class="fw-bold text-gray-900 fs-3"><?= $email ?></div>
                <!--end::Mobile no-->
            </div>
            <!--end::Heading-->
            <!--begin::Section-->
            <div class="mb-10">
                <!--begin::Input group-->
                <div class="d-flex flex-wrap flex-stack">
                    <input type="text" name="code_1" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
                    <input type="text" name="code_2" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
                    <input type="text" name="code_3" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
                    <input type="text" name="code_4" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
                </div>
                <!--begin::Input group-->
            </div>
            <!--end::Section-->
            <!--begin::Submit-->
            <div class="d-flex flex-center">
                <button type="button" id="kt_sing_in_two_factor_submit" class="btn btn-lg btn-primary fw-bold">
                    <span class="indicator-label">Enviar</span>
                    <span class="indicator-progress">Aguarde...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
            <!--end::Submit-->
        </form>
        <!--end::Form-->
        <!--begin::Notice-->
        <div class="text-center fw-semibold fs-5">
            <span class="text-muted me-1">Não recebeu o código ?</span>
            <a href="javascript:void(0)" data-post="<?= url("/confirm/resendCode/{$email}") . (!empty($_GET['redirect']) ? ('?redirect=' . urlencode($_GET['redirect'])) : '') ?>" class="link-primary fs-5 me-1">Reenviar</a>
            <span class="text-muted me-1">ou</span>
            <a href="javascript:void(0);" class="link-primary fs-5">Contate-nos</a>
        </div>
        <!--end::Notice-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Card-->

<?php $this->start("scripts"); ?>
<script src="../../assets/js/pages/auth/confirm.js"></script>
<?php $this->end(); ?>