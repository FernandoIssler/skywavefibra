<?php $this->layout("auth/_auth"); ?>

<!--begin::Card-->
<div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
    <!--begin::Wrapper-->
    <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
        <!--begin::Form-->
        <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" action="<?= url("register") ?>" method="post">
            <input type="hidden" name="document" value="<?= $user->document ?? null ?>">
            <div id="alert-container-fixed"></div>
            <?= csrf_input() ?>
            
            <!--begin::Heading-->
            <div class="text-center mb-11">
                <!--begin::Title-->
                <h1 class="text-gray-900 fw-bolder mb-3">Cadastrar</h1>
                <!--end::Title-->
                <!--begin::Subtitle-->
                <div class="text-gray-500 fw-semibold fs-6">Insira seus dados para concluir seu cadastro</div>
                <!--end::Subtitle=-->
            </div>
            <!--begin::Heading-->
            <!--begin::Input group=-->
            <div class="fv-row row mb-8">
                <div class="col-6">
                    <input type="text" name="first_name" class="form-control" placeholder="Nome" value="<?= $user->first_name ?? null ?>">
                </div>
                <div class="col-6">
                    <input type="text" name="last_name" class="form-control" placeholder="Sobrenome" value="<?= $user->last_name ?? null ?>">
                </div>
            </div>
            <!--begin::Input group-->
            <div class="fv-row mb-8">
                <!--begin::Email-->
                <input type="text" placeholder="E-mail" name="email" autocomplete="off" class="form-control bg-transparent" value="<?= $user->email ?? null ?>" />
                <!--end::Email-->
            </div>
            <!--begin::Input group-->
            <div class="fv-row mb-8">
                <!--begin::CPF-->
                <input id="document" type="text" placeholder="000.000.000-00" name="document" autocomplete="off" class="form-control bg-transparent" value="<?= $user->document ?? null ?>" />
                <!--end::CPF-->
            </div>
            <!--begin::Input group-->
            <div class="fv-row mb-8" data-kt-password-meter="true">
                <!--begin::Wrapper-->
                <div class="mb-1">
                    <!--begin::Input wrapper-->
                    <div class="position-relative mb-3">
                        <input class="form-control bg-transparent" type="password" placeholder="Senha" name="password" autocomplete="off" />
                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                            <i class="ki-duotone ki-eye-slash fs-2"></i>
                            <i class="ki-duotone ki-eye fs-2 d-none"></i>
                        </span>
                    </div>
                    <!--end::Input wrapper-->
                    <!--begin::Meter-->
                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                    </div>
                    <!--end::Meter-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Hint-->
                <div class="text-muted">Use 8 ou mais caracteres com uma combinação de letras, números e símbolos.</div>
                <!--end::Hint-->
            </div>
            <!--end::Input group=-->
            <!--end::Input group=-->
            <div class="fv-row mb-8">
                <!--begin::Repeat Password-->
                <input placeholder="Repetir a senha" name="confirm-password" type="password" autocomplete="off" class="form-control bg-transparent" />
                <!--end::Repeat Password-->
            </div>
            <!--end::Input group=-->
            <!--begin::Accept-->
            <div class="fv-row mb-8">
                <label class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="agree" value="1" />
                    <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">Eu concordo com os
                        <a href="javascript:void(0);" class="ms-1 link-primary">termos e condições</a>.</span>
                </label>
            </div>
            <!--end::Accept-->
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
<script src="../../../shared/assets/js/pages/auth/sign-up.js"></script>
<script src="../../assets/libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
<script>
    $('#document').mask('000.000.000-00')
</script>
<?php $this->end(); ?>