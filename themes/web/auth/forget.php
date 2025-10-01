<?php $this->layout("auth/_auth"); ?>

<!--begin::Card-->
<div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
    <!--begin::Wrapper-->
    <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
        <!--begin::Form-->
        <form action="<?= url("/recover"); ?>" method="post" class="form w-100">
            <div id="alert-container-fixed"></div>
            <?= csrf_input(); ?>
            <!--begin::Heading-->
            <div class="text-center mb-10">
                <!--begin::Title-->
                <h1 class="text-gray-900 fw-bolder mb-3">Esqueceu sua senha ?</h1>
                <!--end::Title-->
                <!--begin::Link-->
                <div class="text-gray-500 fw-semibold fs-6">Digite o seu e-mail para iniciar o processo de recuperação.</div>
                <!--end::Link-->
            </div>
            <!--begin::Heading-->
            <!--begin::Input group=-->
            <div class="fv-row mb-8">
                <!--begin::Email-->
                <input type="email" name="email" class="form-control bg-transparent" id="email" placeholder="Digite o e-mail cadastrado">
                <!--end::Email-->
            </div>
            <!--begin::Actions-->
            <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                <button type="submit" class="btn btn-primary me-4">
                    <!--begin::Indicator label-->
                    <span class="indicator-label">Enviar</span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">Aguarde...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    <!--end::Indicator progress-->
                </button>
                <a href="<?= url("entrar") ?>" class="btn btn-light">Lembrei da senha</a>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Card-->