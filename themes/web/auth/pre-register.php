<?php $this->layout("auth/_auth"); ?>

<!--begin::Card-->
<div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
    <!--begin::Wrapper-->
    <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
        <!--begin::Form-->
        <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" action="<?= url("pre-register") ?>" method="post">
            <div id="alert-container-fixed"></div>
            <?= csrf_input() ?>
            <input type="hidden" name="redirect" value="<?= htmlspecialchars($_GET['redirect'] ?? '') ?>">
            <!--begin::Heading-->
            <div class="text-center mb-11">
                <!--begin::Title-->
                <h1 class="text-gray-900 fw-bolder mb-3">Cadastrar</h1>
                <!--end::Title-->
                <!--begin::Subtitle-->
                <div class="text-gray-500 fw-semibold fs-6">Insira seu CPF para iniciar a validação do seu cadastro</div>
                <!--end::Subtitle=-->
            </div>
            <!--begin::Heading-->
            <!--begin::Input group=-->
            <div class="fv-row row mb-8">
                <div class="col-12">
                    <input id="document" type="text" name="document" class="form-control" placeholder="000.000.000-00">
                </div>
            </div>
            <!--begin::Input group-->
            <!--begin::Submit button-->
            <div class="d-grid mb-10">
                <button type="submit" id="kt_sign_up_submit" class="btn btn-info">
                    <!--begin::Indicator label-->
                    <span class="indicator-label">Cadastrar</span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">Aguarde...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    <!--end::Indicator progress-->
                </button>
            </div>
            <!--end::Submit button-->
            <!--begin::Sign up-->
            <div class="text-gray-500 text-center fw-semibold fs-6">Já tem uma conta?
                <a href="<?= url('entrar') . (!empty($_GET['redirect']) ? ('?redirect=' . urlencode($_GET['redirect'])) : '') ?>"
                    class="link-primary fw-semibold">Entrar</a>
            </div>
            <!--end::Sign up-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Card-->

<?php $this->start("scripts"); ?>
<script src="../../../shared/assets/js/pages/auth/pre-sign-up.js"></script>
<script src="../../assets/libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
<script>
    $('#document').mask('000.000.000-00')
</script>
<?php $this->end(); ?>