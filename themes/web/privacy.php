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
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!--Swiper slider css-->
    <link href="<?= url(CONF_THEME . '/assets/libs/swiper/swiper-bundle.min.css') ?>" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="<?= url(CONF_THEME . '/assets/js/layout.js') ?>">
    </script>
    <!-- Bootstrap Css -->
    <link href="<?= url(CONF_THEME . '/assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= url(CONF_THEME . '/assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= url(CONF_THEME . '/assets/css/app.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= url(CONF_THEME . '/assets/css/custom.min.css') ?>" rel="stylesheet" type="text/css" />


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
                                            <h3>Política de Privacidade</h3>
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

                                    <p><span style="color: rgb(68, 68, 68);">A sua privacidade é importante para nós. É
                                            política do
                                            <?= CONF_SITE_NAME ?>
                                            respeitar a sua privacidade em relação a
                                            qualquer informação sua que possamos coletar no site
                                            <?= CONF_SITE_NAME ?>, e
                                            outros sites que possuímos e
                                            operamos.</span>
                                    </p>
                                    <p><span style="color: rgb(68, 68, 68);">Solicitamos informações pessoais apenas
                                            quando
                                            realmente precisamos delas para lhe fornecer um serviço. Fazemo-lo por meios
                                            justos e legais, com o seu conhecimento e consentimento. Também informamos
                                            por
                                            que estamos coletando e como será usado.</span>
                                    </p>
                                    <p><span style="color: rgb(68, 68, 68);">Apenas retemos as informações coletadas
                                            pelo
                                            tempo necessário para fornecer o serviço solicitado. Quando armazenamos
                                            dados,
                                            protegemos dentro de meios comercialmente aceitáveis para evitar perdas e
                                            roubos, bem como acesso, divulgação, cópia, uso ou modificação não
                                            autorizados.</span>
                                    </p>
                                    <p><span style="color: rgb(68, 68, 68);">Não compartilhamos informações de
                                            identificação
                                            pessoal publicamente ou com terceiros, exceto quando exigido por lei.</span>
                                    </p>
                                    <p><span style="color: rgb(68, 68, 68);">O nosso site pode ter links para sites
                                            externos
                                            que não são operados por nós. Esteja ciente de que não temos controle sobre
                                            o
                                            conteúdo e práticas desses sites e não podemos aceitar responsabilidade por
                                            suas
                                            respectivas políticas de privacidade.</span>
                                    </p>
                                    <p><span style="color: rgb(68, 68, 68);">Você é livre para recusar a nossa
                                            solicitação
                                            de informações pessoais, entendendo que talvez não possamos fornecer alguns
                                            dos
                                            serviços desejados.</span>
                                    </p>
                                    <p><span style="color: rgb(68, 68, 68);">O uso de nosso site, em especial o seu
                                            cadastro, será considerado como aceitação de nossas práticas em torno de
                                            privacidade e informações pessoais. Se você tiver alguma dúvida sobre como
                                            lidamos com dados do usuário e informações pessoais, entre em contato
                                            conosco.</span>
                                    </p>
                                    <p><span style="color: rgb(68, 68, 68);">
                                            <ul>
                                                <li><span style="color: rgb(68, 68, 68);">O serviço Google AdSense que
                                                        usamos para veicular publicidade usa um cookie DoubleClick para
                                                        veicular anúncios mais relevantes em toda a Web e limitar o
                                                        número
                                                        de vezes que um determinado anúncio é exibido para você.</span>
                                                </li>
                                                <li><span style="color: rgb(68, 68, 68);">Para mais informações sobre o
                                                        Google AdSense, consulte as FAQs oficiais sobre privacidade do
                                                        Google AdSense.</span></li>
                                                <li><span style="color: rgb(68, 68, 68);">Utilizamos anúncios para
                                                        compensar
                                                        os custos de funcionamento deste site e fornecer financiamento
                                                        para
                                                        futuros desenvolvimentos. Os cookies de publicidade
                                                        comportamental
                                                        usados por este site foram projetados para garantir que sejam
                                                        fornecidos os anúncios mais relevantes sempre que possível,
                                                        rastreando anonimamente seus interesses e apresentando coisas
                                                        semelhantes que possam ser do seu interesse.</span></li>
                                                <li><span style="color: rgb(68, 68, 68);">Vários parceiros anunciam em
                                                        nosso
                                                        nome e os cookies de rastreamento de afiliados simplesmente nos
                                                        permitem ver se nossos clientes acessaram o site através de um
                                                        dos
                                                        sites de nossos parceiros, para que possamos creditá-los
                                                        adequadamente e, quando aplicável, permitir que nossos parceiros
                                                        afiliados ofereçam qualquer promoção que pode fornecê-lo para
                                                        fazer
                                                        uma compra.</span></li>
                                            </ul>
                                            <p><br></p>
                                        </span>
                                    </p>
                                    <h3><span style="color: rgb(68, 68, 68);">Compromisso do Usuário</span></h3>
                                    <p><span style="color: rgb(68, 68, 68);">O usuário se compromete a fazer uso
                                            adequado
                                            dos conteúdos e da informação que o
                                            <?= CONF_SITE_NAME ?>>
                                            oferece no site e com
                                            caráter
                                            enunciativo, mas não limitativo:</span>
                                    </p>
                                    <ul>
                                        <li><span style="color: rgb(68, 68, 68);">A) Não se envolver em atividades que
                                                sejam
                                                ilegais ou contrárias à boa fé a à ordem pública;</span>
                                        </li>
                                        <li><span style="color: rgb(68, 68, 68);">B) Não difundir propaganda ou conteúdo
                                                de
                                                natureza racista, xenofóbica, jogos de sorte ou azar, qualquer tipo de
                                                pornografia ilegal, de apologia ao terrorismo ou contra os direitos
                                                humanos;</span>
                                        </li>
                                        <li><span style="color: rgb(68, 68, 68);">C) Não causar danos aos sistemas
                                                físicos
                                                (hardwares) e lógicos (softwares) do
                                                <?= CONF_SITE_NAME ?>>,
                                                de seus
                                                fornecedores ou
                                                terceiros, para introduzir ou disseminar vírus informáticos ou quaisquer
                                                outros sistemas de hardware ou software que sejam capazes de causar
                                                danos
                                                anteriormente mencionados.</span>
                                        </li>
                                    </ul>
                                    <h3><span style="color: rgb(68, 68, 68);">Mais informações</span></h3>
                                    <p><span style="color: rgb(68, 68, 68);">Esperamos que esteja esclarecido e, como
                                            mencionado anteriormente, se houver algo que você não tem certeza se precisa
                                            ou
                                            não, geralmente é mais habitual deixar os cookies ativados, caso interaja
                                            com um
                                            dos recursos que você usa em nosso site.</span>
                                    </p>
                                    <p><span style="color: rgb(68, 68, 68);">Esta política é efetiva a partir de 23 de
                                            agosto de 2023</span>
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
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
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
                                <p class="ff-secondary">
                                    <?= CONF_SITE_DESC ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 ms-lg-auto">
                        <div class="row justify-content-end">
                            <div class="col-sm-4 mt-4">
                                <div class="text-muted mt-3">
                                    <ul class="list-unstyled ff-secondary footer-list fs-14 text-end">
                                        <li><a href="pages-gallery.html">Termos e condições de uso</a></li>
                                        <li><a href="apps-projects-overview.html">Política de privacidade</a></li>
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
    <script src="<?= CONF_THEME ?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <script src="<?= CONF_THEME ?>/assets/libs/simplebar/simplebar.min.js">
    </script>
    <script src="<?= CONF_THEME ?>/assets/libs/node-waves/waves.min.js">
    </script>
    <script src="<?= CONF_THEME ?>/assets/libs/feather-icons/feather.min.js">
    </script>
    <script src="<?= CONF_THEME ?>/assets/js/pages/plugins/lord-icon-2.1.0.js">
    </script>
    <script src="<?= CONF_THEME ?>/assets/js/plugins.js"></script>

    <!--Swiper slider js-->
    <script src="<?= CONF_THEME ?>/assets/libs/swiper/swiper-bundle.min.js">
    </script>

    <!-- landing init -->
    <script src="<?= CONF_THEME ?>/assets/js/pages/landing.init.js"></script>
</body>

</html>