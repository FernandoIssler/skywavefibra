<!doctype html>
<html lang="pt-br" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="enable">

<head>

    <?= $head ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= url('shared/assets/images/favicon/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= url('shared/assets/images/favicon/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= url('shared/assets/images/favicon/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= url('shared/assets/images/favicon/site.webmanifest') ?>">
    <link rel="mask-icon" href="<?= url('shared/assets/images/favicon/safari-pinned-tab.svg') ?>" color="#5bbad5">
    <meta name="msapplication-TileColor"content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!--Swiper slider css-->
    <link href="<?= url(CONF_THEME . '/assets/libs/swiper/swiper-bundle.min.css') ?>" rel="stylesheet" type="text/css"/>

    <!-- Layout config Js -->
    <script src="<?= url(CONF_THEME . '/assets/js/layout.js') ?>"></script>
    <!-- Bootstrap Css -->
    <link href="<?= url(CONF_THEME . '/assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="<?= url(CONF_THEME . '/assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="<?= url(CONF_THEME . '/assets/css/app.min.css') ?>" rel="stylesheet" type="text/css"/>
    <!-- custom Css-->
    <link href="<?= url(CONF_THEME . '/assets/css/custom.min.css') ?>" rel="stylesheet" type="text/css"/>


</head>

<body> 

<!-- Begin page -->
<div class="layout-wrapper landing">
    <nav class="navbar navbar-expand-lg navbar-landing fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="<?= url() ?>">
                <img src="<?= url('shared/assets/images/logo/logo-small-light.png') ?>" class="card-logo card-logo-dark" alt="logo dark" height="20">
                <img src="<?= CONF_THEME ?>/assets/images/logo-light.png" class="card-logo card-logo-light" alt="logo light" height="17">
            </a>
            <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0" id="navbar-example">

                </ul>

                <div class="">
                    <a href="<?= url('entrar') ?>" class="btn btn-link fw-medium text-decoration-none text-body">Entrar</a>
                    <a href="<?= url('cadastrar') ?>" class="btn btn-primary">Cadastre-se</a>
                </div>
            </div>

        </div>
    </nav>
    <!-- end navbar -->
    <div class="vertical-overlay" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent.show"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="bg-warning-subtle position-relative">
                                <div class="card-body p-5">
                                    <div class="text-center">
                                        <h3>Termos e condições de uso</h3>
                                        <p class="mb-0 text-muted">Atualizado em: 23 de agosto de 2023</p>
                                    </div>
                                </div>
                                <div class="shape">
                                    <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="1440" height="60" preserveAspectRatio="none" viewBox="0 0 1440 60">
                                        <g mask="url(&quot;#SvgjsMask1001&quot;)" fill="none">
                                            <path d="M 0,4 C 144,13 432,48 720,49 C 1008,50 1296,17 1440,9L1440 60L0 60z" style="fill: var(--vz-secondary-bg);"></path>
                                        </g>
                                        <defs>
                                            <mask id="SvgjsMask1001">
                                                <rect width="1440" height="60" fill="#ffffff"></rect>
                                            </mask>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                            <div class="card-body p-4">

                                <h2><span style="color: rgb(68, 68, 68);">1. Termos</span></h2>
                                <p>
                                    <span style="color: rgb(68, 68, 68);">Ao acessar ao site <?= CONF_SITE_NAME ?>, você
                                        concorda em cumprir estes termos de serviço, todas as leis e regulamentos
                                        aplicáveis e concorda que é responsável pelo cumprimento de todas as leis
                                        vigentes. Se você não concordar com algum desses termos, está proibido de usar
                                        ou acessar este site. Os materiais contidos neste site são protegidos pelas leis
                                        de direitos autorais e marcas comerciais aplicáveis.</span>
                                </p>
                                <h2><span style="color: rgb(68, 68, 68);">2. Uso de Licença</span></h2>
                                <p><span style="color: rgb(68, 68, 68);">É concedida permissão de utilização do
                                        site <?= CONF_SITE_NAME ?> sendo vedado baixar, ainda que temporariamente uma
                                        cópia dos materiais contidos no site. Esta é a concessão de uma licença de uso,
                                        não uma transferência de título e, sob esta licença, você não pode:</span>
                                </p>
                                <ol>
                                    <li>
                                        <span style="color: rgb(68, 68, 68);">Modificar ou copiar o conteúdo e seus
                                            materiais;</span>
                                    </li>
                                    <li><span style="color: rgb(68, 68, 68);">Usar os materiais para qualquer finalidade
                                            comercial ou para exibição pública (comercial ou não comercial);</span>
                                    </li>
                                    <li><span style="color: rgb(68, 68, 68);">Tentar descompilar ou fazer qualquer
                                            engenharia reversa de qualquer material contido no
                                            site <?= CONF_SITE_NAME ?>;</span>
                                    </li>
                                    <li><span style="color: rgb(68, 68, 68);">Remover quaisquer direitos autorais ou
                                            outras notações de propriedade dos materiais;</span>
                                    </li>
                                    <li><span style="color: rgb(68, 68, 68);">Transferir os materiais para outra pessoa
                                            ou 'espelhar' os materiais em qualquer outro servidor.</span>
                                    </li>
                                </ol>
                                <p><span style="color: rgb(68, 68, 68);">Esta licença será automaticamente rescindida se
                                        você violar alguma dessas restrições e poderá ser rescindida
                                        pelo <?= CONF_SITE_NAME ?> a qualquer momento. Ao encerrar a visualização desses
                                        materiais ou após o término desta licença, você deve apagar todos os materiais
                                        baixados em sua posse, seja em formato eletrônico, digital ou impresso.</span>
                                </p>
                                <h2><span style="color: rgb(68, 68, 68);">3. Isenção de responsabilidade</span></h2>
                                <ol>
                                    <li><span style="color: rgb(68, 68, 68);">Os materiais contidos
                                            no <?= CONF_SITE_NAME ?> são fornecidos 'como estão'.
                                            O <?= CONF_SITE_NAME ?> não oferece garantias, expressas ou implícitas, e,
                                            por este meio, isenta e nega todas as outras garantias, incluindo, sem
                                            limitação, garantias implícitas ou condições de comercialização, adequação a
                                            um fim específico ou não violação de propriedade intelectual ou outra
                                            violação de direitos.</span>
                                    </li>
                                    <li><span style="color: rgb(68, 68, 68);">Além disso, o <?= CONF_SITE_NAME ?> não
                                            garante ou faz qualquer representação relativa à precisão, aos resultados
                                            prováveis ou à confiabilidade do uso dos materiais em seu site ou de outra
                                            forma relacionado a esses materiais ou em sites vinculados a este
                                            site.</span>
                                    </li>
                                </ol>
                                <h2><span style="color: rgb(68, 68, 68);">4. Limitações</span></h2>
                                <p><span style="color: rgb(68, 68, 68);">Em nenhum caso o <?= CONF_SITE_NAME ?> ou seus
                                        fornecedores serão responsáveis por quaisquer danos (incluindo, sem limitação,
                                        danos por perda de dados ou lucro ou devido a interrupção dos negócios)
                                        decorrentes do uso ou da incapacidade de usar os materiais contidos
                                        no <?= CONF_SITE_NAME ?>, mesmo que o <?= CONF_SITE_NAME ?> ou um representante
                                        autorizado da <?= CONF_SITE_NAME ?> tenha sido notificado oralmente ou por
                                        escrito da possibilidade de tais danos.</span>
                                </p>
                                <h2><span style="color: rgb(68, 68, 68);">5. Precisão dos materiais</span></h2>
                                <p><span style="color: rgb(68, 68, 68);">Os materiais exibidos no
                                        site <?= CONF_SITE_NAME ?> podem incluir erros técnicos, tipográficos ou
                                        fotográficos. <?= CONF_SITE_NAME ?> não garante que qualquer material em seu
                                        site seja preciso, completo ou atual. <?= CONF_SITE_NAME ?> pode fazer
                                        alterações nos materiais contidos em seu site a qualquer momento, sem aviso
                                        prévio. No entanto, o <?= CONF_SITE_NAME ?> não se compromete a atualizar os
                                        materiais.</span>
                                </p>
                                <h2><span style="color: rgb(68, 68, 68);">6. Links</span></h2>
                                <p><span style="color: rgb(68, 68, 68);">O <?= CONF_SITE_NAME ?> não analisou todos os
                                        sites vinculados ao seu site e não é responsável pelo conteúdo de nenhum site
                                        vinculado. A inclusão de qualquer link não implica endosso
                                        do <?= CONF_SITE_NAME ?>. O uso de qualquer site vinculado é por conta e risco
                                        do usuário.</span>
                                </p>
                                <p><br></p>
                                <h3><span style="color: rgb(68, 68, 68);">Modificações</span></h3>
                                <p><span style="color: rgb(68, 68, 68);">O <?= CONF_SITE_NAME ?> pode revisar estes
                                        termos de serviço do site a qualquer momento, sem aviso prévio. Ao usar este
                                        site, você concorda em ficar vinculado à versão atual desses termos de
                                        serviço.</span>
                                </p>
                                <h3><span style="color: rgb(68, 68, 68);">Lei aplicável</span></h3>
                                <p><span style="color: rgb(68, 68, 68);">Estes termos e condições são regidos e
                                        interpretados de acordo com as leis vigentes.</span>
                                </p>

                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script>
                        © Velzon.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

    <!-- Start footer -->
    <footer class="custom-footer bg-dark py-5 position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mt-4">
                    <div>
                        <div>
                            <img src="<?= url('shared/assets/images/logo/logo-small-dark.png') ?>" alt="logo light" height="17">
                        </div>
                        <div class="mt-4 fs-13">
                            <p class="ff-secondary"><?= CONF_SITE_DESC ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 ms-lg-auto">
                    <div class="row justify-content-end">
                        <div class="col-sm-4 mt-4">
                            <div class="text-muted mt-3">
                                <ul class="list-unstyled ff-secondary footer-list fs-14 text-end">
                                    <li><a href="<?= url('termos') ?>">Termos e condições de uso</a></li>
                                    <li><a href="<?= url('privacidade') ?>">Política de privacidade</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row text-center text-sm-start align-items-center mt-5">
                <div class="col-sm-6">

                    <div>
                        <p class="copy-rights mb-0">
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <?= CONF_SITE_NAME_STYLED ?>
                        </p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end mt-3 mt-sm-0">
                        <ul class="list-inline mb-0 footer-social-link">
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="avatar-xs d-block">
                                    <div class="avatar-title rounded-circle">
                                        <i class="ri-facebook-fill"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="avatar-xs d-block">
                                    <div class="avatar-title rounded-circle">
                                        <i class="ri-github-fill"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="avatar-xs d-block">
                                    <div class="avatar-title rounded-circle">
                                        <i class="ri-linkedin-fill"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="avatar-xs d-block">
                                    <div class="avatar-title rounded-circle">
                                        <i class="ri-google-fill"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="avatar-xs d-block">
                                    <div class="avatar-title rounded-circle">
                                        <i class="ri-dribbble-line"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon landing-back-top" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

</div>
<!-- end layout wrapper -->


<!-- JAVASCRIPT -->
<script src="<?= CONF_THEME ?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= CONF_THEME ?>/assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= CONF_THEME ?>/assets/libs/node-waves/waves.min.js"></script>
<script src="<?= CONF_THEME ?>/assets/libs/feather-icons/feather.min.js"></script>
<script src="<?= CONF_THEME ?>/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="<?= CONF_THEME ?>/assets/js/plugins.js"></script>

<!--Swiper slider js-->
<script src="<?= CONF_THEME ?>/assets/libs/swiper/swiper-bundle.min.js"></script>

<!-- landing init -->
<script src="<?= CONF_THEME ?>/assets/js/pages/landing.init.js"></script>
</body>

</html>