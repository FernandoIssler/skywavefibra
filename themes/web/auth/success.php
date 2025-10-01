<?php $this->layout("auth/_auth"); ?>

<!--begin::Card-->
<div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
    <!--begin::Wrapper-->
    <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
        <script src="https://cdn.lordicon.com/lordicon.js"></script>
        <lord-icon
            src="https://cdn.lordicon.com/gqjpawbc.json"
            trigger="loop"
            delay="100"
            style="width:150px;height:150px">
        </lord-icon>
        <div class="mt-4 pt-2">
            <h4 class="text-center">Que bom tê-lo conosco</h4>
            <p class="text-muted text-center mx-4">Seu e-mail foi confirmado com sucesso.</p>
            <div class="mt-4">
                <a href="<?= url("entrar") . (!empty($_GET['redirect']) ? ('?redirect=' . urlencode($_GET['redirect'])) : '') ?>" class="btn btn-success w-100">Fazer login</a>
            </div>
        </div>
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Card-->