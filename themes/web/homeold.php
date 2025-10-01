<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= url(CONF_THEME_reeni) ?>/" />

    <?= $head ?>

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../assets/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="../../assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap min css -->
    <link rel="stylesheet" href="assets/css/vendor/fontawesome.css">
    <link rel="stylesheet" href="assets/css/plugins/swiper.css">
    <link rel="stylesheet" href="assets/css/plugins/odometer.css">
    <link rel="stylesheet" href="assets/css/vendor/animate.min.css">
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="tmp-white-version color-primary-3rd">

    <div id="url-global" data-url="<?= url() ?>"></div>
    <div id="alert-flash" class="d-none"><?= flash() ?></div>
    <div id="alert-container-toast" class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 999999 !important;"></div>

    <!-- tpm-header-area start -->
    <header class="tmp-header-area-start header-one header--sticky header--transparent">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-content">
                        <div class="logo">
                            <a href="<?= url() ?>">
                                <img class="logo-dark" src="<?= url("shared/assets/images/front/ea.png") ?>" width="120" alt="Educação Adventista - Indicação">
                                <img class="logo-white" src="<?= url("shared/assets/images/front/ea.png") ?>" width="120" alt="Educação Adventista - Indicação">
                            </a>
                        </div>

                        <div class="tmp-header-right">
                            <!-- Ícone administrativo -->
                            <a href="<?= url("entrar") ?>" class="btn btn-lg btn-warning fs-3 px-5" title="Área Administrativa">
                                Entrar
                            </a>
                            <div class="actions-area">
                                <div class="tmp-side-collups-area d-none d-xl-block">
                                    <button class="tmp-menu-bars tmp_button_active"><i class="fa-regular fa-bars-staggered"></i></button>
                                </div>
                                <div class="tmp-side-collups-area d-block d-xl-none">
                                    <button class="tmp-menu-bars humberger_menu_active"><i class="fa-regular fa-bars-staggered"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- tpm-header-area end -->
    <div class="d-none d-xl-block">
        <div class="tmp-sidebar-area tmp_side_bar">
            <div class="inner">
                <div class="top-area">
                    <a href="<?= url() ?>" class="logo">
                        <img class="logo-dark" src="<?= url("shared/assets/images/front/ea.png") ?>" alt="Educação Adventista - Indicação">
                        <img class="logo-white" src="<?= url("shared/assets/images/front/ea.png") ?>" alt="Educação Adventista - Indicação">
                    </a>
                    <div class="close-icon-area">
                        <button class="tmp-round-action-btn close_side_menu_active">
                            <i class="fa-sharp fa-light fa-xmark"></i>
                        </button>
                    </div>
                </div>

                <div class="content-wrapper">

                    <!-- Título e descrição -->
                    <h5 class="title mt--20">Sistema de Indicação</h5>
                    <p class="disc">
                        Uma plataforma que conecta pessoas e escolas da <strong>Educação Adventista</strong>,
                        permitindo indicar amigos e familiares para estudar em nossas instituições,
                        a maior rede de educação confessional do mundo.
                    </p>
                    <p class="disc mt-3 text-muted small">
                        Desenvolvido pelo <strong>UNIAENE</strong> em parceria com a
                        <strong>ULB – União Leste Brasileira da Igreja Adventista do Sétimo Dia</strong>.
                    </p>

                </div>
            </div>
        </div>
        <a class="overlay_close_side_menu close_side_menu_active" href="javascript:void(0);"></a>
    </div>


    <div class="d-block d-xl-none">
        <div class="tmp-popup-mobile-menu">
            <div class="inner">
                <div class="header-top">
                    <div class="logo">
                        <a href="<?= url() ?>" class="logo-area">
                            <img class="logo-dark" src="<?= url("shared/assets/images/front/ea.png") ?>" alt="Educação Adventista - Indicação">
                            <img class="logo-white" src="<?= url("shared/assets/images/front/ea.png") ?>" alt="Educação Adventista - Indicação">
                        </a>

                    </div>
                    <div class="close-menu">
                        <button class="close-button tmp-round-action-btn">
                            <i class="fa-sharp fa-light fa-xmark"></i>
                        </button>
                    </div>
                </div>

                <!-- Título e descrição -->
                <h5 class="title mt--20">Sistema de Indicação</h5>
                <p class="disc">
                    Uma plataforma que conecta pessoas e escolas da <strong>Educação Adventista</strong>,
                    permitindo indicar amigos e familiares para estudar em nossas instituições,
                    a maior rede de educação confessional do mundo.
                </p>
                <p class="disc mt-3 text-muted small">
                    Desenvolvido pelo <strong>UNIAENE</strong> em parceria com a
                    <strong>ULB – União Leste Brasileira da Igreja Adventista do Sétimo Dia</strong>.
                </p>

            </div>
        </div>
    </div>


    <!-- tmp banner area start -->
    <div class="rpp-banner-four-area">
        <div class="container">
            <div class="banner-four-main-wrapper">
                <!-- Imagem original -->
                <div class="bg-benner-img-four">
                    <img class="tmp-scroll-trigger tmp-zoom-in animation-order-1"
                        src="<?= url() ?>/shared/assets/images/front/front-hero.png" alt="banner-img-3">
                </div>
                <div class="banner-four-right-bg-img">
                    <img src="<?= url() ?>/shared/assets/images/front/front-bg.png" alt="banner-img-3">
                </div>

                <div class="row">
                    <!-- Texto principal -->
                    <div class="col-lg-4 col-md-6">
                        <div class="inner">
                            <span class="sub-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                                <style>
                                    .notice .fs-6.text-gray-700.fs-1 {
                                        font-size: 3rem !important;
                                    }

                                    .notice.fade-out {
                                        opacity: 0;
                                        transition: opacity 0.5s ease;
                                    }
                                </style>
                                <div id="alert-container-fixed" class="bg-warning text-danger mb-5"></div>
                                Sistema de Indicação
                            </span>
                            <h1 class="title tmp-scroll-trigger tmp-fade-in animation-order-2">
                                Indique e Ganhe
                            </h1>
                            <p class="description tmp-scroll-trigger tmp-fade-in animation-order-3">
                                Participe das campanhas da <strong>Educação Adventista</strong>.
                                Indique amigos, acompanhe o progresso e receba prêmios de acordo com os critérios estabelecidos.
                            </p>

                            <div class="button-area-banner-three tmp-scroll-trigger tmp-fade-in animation-order-4">
                                <a class="tmp-btn hover-icon-reverse radius-round" href="#escolas">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Indique agora</span>
                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="banner-four-left-bg-img">
            <img src="assets/images/banner/banner-four-left-bg-img.png" alt="banner-img-3">
        </div>
    </div>
    <!-- tmp banner area end -->



    <!-- tmp text para start -->
    <div class="container tmp-section-gap">
        <div class="text-para-doc-wrap">
            <h2 class="text-para-documents tmp-scroll-trigger tmp-fade-in animation-order-1 inv-title-animation-wrap">
                A <span>Rede Adventista de Educação</span> é a maior rede educacional do mundo,
                presente em diversos países e reconhecida pela excelência acadêmica e pelos seus princípios cristãos.
                São milhares de <span>escolas, colégios e universidades</span> espalhados globalmente, formando gerações
                de estudantes com valores sólidos, cidadania responsável e preparo para a vida profissional e espiritual.
            </h2>
            <div class="right-bg-text-para">
                <img src="assets/images/banner/right-bg-text-para-doc.png" alt="">
            </div>
            <div class="left-bg-text-para">
                <img src="assets/images/banner/left-bg-text-para-doc.png" alt="">
            </div>
        </div>
    </div>
    <!-- tmp text para end -->


    <!-- tmp About Me Start -->
    <section class="about-us-area">
        <div class="container">
            <div class="row align-items-center">
                <!-- Coluna esquerda com contador e card -->
                <div class="col-lg-6">
                    <div class="about-us-left-content-wrap bg-vactor-one">
                        <div class="years-of-experience-card tmp-scroll-trigger tmp-fade-in animation-order-1">
                            <h2 class="counter card-title">
                            </h2>
                            <p class="card-para">Indique agora</p>
                        </div>
                        <div class="design-card tmp-scroll-trigger tmp-fade-in animation-order-2">
                            <div class="design-card-img">
                                <div class="icon"><i class="fa-solid fa-gift"></i></div>
                            </div>
                            <div class="card-info">
                                <h3 class="card-title">Prêmios Entregues</h3>
                                <p class="card-para">Campanhas de sucesso</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Coluna direita com título e cards -->
                <div class="col-lg-6">
                    <div class="about-us-right-content-wrap">
                        <div class="section-head text-align-left mb--50">
                            <div class="section-sub-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                                <span class="subtitle">Sobre o Sistema</span>
                            </div>
                            <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">
                                Indique amigos e <br>conquiste recompensas
                            </h2>
                            <p class="description tmp-scroll-trigger tmp-fade-in animation-order-3">
                                O Sistema de Indicação da <strong>Educação Adventista</strong> foi criado para aproximar
                                pessoas e valorizar cada indicação. Você pode indicar amigos, acompanhar resultados em tempo
                                real e conquistar prêmios exclusivos de acordo com os critérios de cada campanha.
                            </p>
                        </div>

                        <div class="about-us-section-card row g-5">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="about-us-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-4">
                                    <div class="card-head">
                                        <div class="logo-img">
                                            <img src="assets/images/about/logo-1.svg" alt="logo">
                                        </div>
                                        <h3 class="card-title">Transparência</h3>
                                    </div>
                                    <p class="card-para">
                                        Cada etapa do processo pode ser acompanhada diretamente no sistema.
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="about-us-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-5">
                                    <div class="card-head">
                                        <div class="logo-img">
                                            <img src="assets/images/about/logo-2.svg" alt="logo">
                                        </div>
                                        <h3 class="card-title">Reconhecimento</h3>
                                    </div>
                                    <p class="card-para">
                                        Suas indicações são valorizadas e transformadas em oportunidades e benefícios.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="about-btn mt--40 tmp-scroll-trigger tmp-fade-in animation-order-6">
                            <a class="tmp-btn hover-icon-reverse radius-round" href="#escolas">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text">Indique agora</span>
                                    <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- tmp About Me end -->

    <!-- Tpm My Expertise Area start -->
    <section class="my-expertise-area tpm-custom-box-bg mt-5">
        <div class="container">
            <div class="header-top-inner">
                <div class="section-head text-align-left">
                    <div class="section-sub-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <span class="subtitle">Nossos Diferenciais</span>
                    </div>
                    <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">
                        Um sistema de <br>indicação transparente e confiável
                    </h2>
                </div>
                <div class="discription-area tmp-scroll-trigger tmp-fade-in animation-order-3">
                    <p class="description">
                        O Sistema de Indicação da <strong>Educação Adventista</strong> foi desenvolvido para oferecer clareza,
                        confiança e benefícios reais. Cada campanha é acompanhada em tempo real e os resultados são
                        facilmente acessíveis pelos participantes.
                    </p>
                </div>
            </div>

            <div class="services-widget v4">
                <!-- Indicadores: Transparência -->
                <div class="service-item current tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <div class="my-expertise-card-wrap">
                        <div class="expertise-card-left">
                            <h3 class="title">Transparência</h3>
                        </div>
                        <div class="single-progress-circle sal-animate" data-sal-delay="300" data-sal="slide-up" data-sal-duration="1000">
                            <svg class="radial-progress" data-countervalue="100" viewBox="0 0 80 80">
                                <circle class="bar-static" cx="40" cy="40" r="35"></circle>
                                <circle class="bar--animated" cx="40" cy="40" r="35"></circle>
                                <text class="countervalue" x="50%" y="55%" transform="matrix(0, 1, -1, 0, 80, 0)">100%</text>
                            </svg>
                        </div>
                        <p class="para">
                            Todas as etapas do processo podem ser acompanhadas com clareza e em tempo real.
                        </p>
                    </div>
                    <button class="service-link modal-popup"></button>
                </div>

                <!-- Indicadores: Engajamento -->
                <div class="service-item tmp-scroll-trigger tmp-fade-in animation-order-2">
                    <div class="my-expertise-card-wrap">
                        <div class="expertise-card-left">
                            <h3 class="title">Engajamento</h3>
                        </div>
                        <div class="single-progress-circle sal-animate" data-sal-delay="300" data-sal="slide-up" data-sal-duration="1000">
                            <svg class="radial-progress" data-countervalue="100" viewBox="0 0 80 80">
                                <circle class="bar-static" cx="40" cy="40" r="35"></circle>
                                <circle class="bar--animated" cx="40" cy="40" r="35"></circle>
                                <text class="countervalue" x="50%" y="55%" transform="matrix(0, 1, -1, 0, 80, 0)">100%</text>
                            </svg>
                        </div>
                        <p class="para">
                            Participantes motivados e campanhas que envolvem ativamente a comunidade.
                        </p>
                    </div>
                    <button class="service-link modal-popup"></button>
                </div>

                <!-- Indicadores: Recompensas -->
                <div class="service-item tmp-scroll-trigger tmp-fade-in animation-order-3">
                    <div class="my-expertise-card-wrap">
                        <div class="expertise-card-left">
                            <h3 class="title">Recompensas</h3>
                        </div>
                        <div class="single-progress-circle sal-animate" data-sal-delay="300" data-sal="slide-up" data-sal-duration="1000">
                            <svg class="radial-progress" data-countervalue="100" viewBox="0 0 80 80">
                                <circle class="bar-static" cx="40" cy="40" r="35"></circle>
                                <circle class="bar--animated" cx="40" cy="40" r="35"></circle>
                                <text class="countervalue" x="50%" y="55%" transform="matrix(0, 1, -1, 0, 80, 0)">100%</text>
                            </svg>
                        </div>
                        <p class="para">
                            Reconhecimento e benefícios reais para quem participa ativamente das campanhas.
                        </p>
                    </div>
                    <button class="service-link modal-popup"></button>
                </div>

                <div class="active-bg v2 wow fadeInUp mleave"></div>
            </div>
        </div>
    </section>
    <!-- Tpm My Expertise Area End -->


    <!-- tmp Clients Testimonial Start -->
    <section class="clients-testimonial-area tmp-section-gapTop">
        <div class="section-head mb--50">
            <div class="section-sub-title center-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                <span class="subtitle">Depoimentos</span>
            </div>
            <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">
                Histórias de quem já participou
            </h2>
            <p class="description section-sm tmp-scroll-trigger tmp-fade-in animation-order-3">
                O Sistema de Indicação da Educação Adventista tem impactado alunos, famílias e colaboradores.
                Veja alguns relatos de experiências reais:
            </p>
        </div>

        <div class="client-testimonial-swiper position-relative">
            <div class="swiper testimonial-swiper-v2">
                <div class="swiper-wrapper">

                    <!-- Depoimento 1 -->
                    <div class="swiper-slide">
                        <div class="client-testimonial-card-wrap">
                            <div class="client-card-head">
                                <div class="client-info">
                                    <div class="client-details">
                                        <h3 class="client-title">Mariana Alves</h3>
                                        <p class="client-para">Estudante do Ensino Médio</p>
                                    </div>
                                </div>
                                <div class="tmp-star">
                                    <ul>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <p class="client-para">
                                Indiquei uma amiga para estudar no colégio e fiquei feliz em ver que ela se adaptou rápido.
                                Além disso, recebi uma recompensa que me motivou ainda mais!
                            </p>
                            <div class="quat-logo">
                                <img src="assets/images/testimonial/quat-logo.svg" alt="quat-logo">
                            </div>
                        </div>
                    </div>

                    <!-- Depoimento 2 -->
                    <div class="swiper-slide">
                        <div class="client-testimonial-card-wrap">
                            <div class="client-card-head">
                                <div class="client-info">
                                    <div class="client-details">
                                        <h3 class="client-title">Carlos Mendes</h3>
                                        <p class="client-para">Pai de aluno</p>
                                    </div>
                                </div>
                                <div class="tmp-star">
                                    <ul>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <p class="client-para">
                                A indicação foi simples e rápida. O sistema deixou tudo claro e pude acompanhar cada etapa
                                até a matrícula ser confirmada. Excelente iniciativa!
                            </p>
                            <div class="quat-logo">
                                <img src="assets/images/testimonial/quat-logo.svg" alt="quat-logo">
                            </div>
                        </div>
                    </div>

                    <!-- Depoimento 3 -->
                    <div class="swiper-slide">
                        <div class="client-testimonial-card-wrap">
                            <div class="client-card-head">
                                <div class="client-info">
                                    <div class="client-details">
                                        <h3 class="client-title">Juliana Rocha</h3>
                                        <p class="client-para">Colaboradora</p>
                                    </div>
                                </div>
                                <div class="tmp-star">
                                    <ul>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <p class="client-para">
                                O sistema de indicação fortalece nossa missão. É gratificante ver mais famílias chegando
                                até nós por meio das recomendações da comunidade.
                            </p>
                            <div class="quat-logo">
                                <img src="assets/images/testimonial/quat-logo.svg" alt="quat-logo">
                            </div>
                        </div>
                    </div>

                    <!-- Depoimento 4 -->
                    <div class="swiper-slide">
                        <div class="client-testimonial-card-wrap">
                            <div class="client-card-head">
                                <div class="client-info">
                                    <div class="client-details">
                                        <h3 class="client-title">Rafael Souza</h3>
                                        <p class="client-para">Universitário</p>
                                    </div>
                                </div>
                                <div class="tmp-star">
                                    <ul>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <p class="client-para">
                                Graças a uma indicação, conheci a Educação Adventista. Hoje sou parte dessa família e
                                incentivo meus colegas a participarem também.
                            </p>
                            <div class="quat-logo">
                                <img src="assets/images/testimonial/quat-logo.svg" alt="quat-logo">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="tmp-swiper-pagination tmp-swiper-pagination-01"></div>
        </div>
    </section>
    <!-- tmp Clients Testimonial End -->



    <!-- Tpm How To Indicate Area Start -->
    <section class="my-skill-area-style-two plr--120 plr_lg--30 plr_md--30 plr_sm--30 plr_mobile--15 mt--70">
        <div class="tpm-custom-box-bg">
            <div class="container">
                <div class="row">
                    <!-- Texto à esquerda -->
                    <div class="col-xxl-6 col-lg-12 col-md-12">
                        <div class="my-skill-area-left-content-wrap">
                            <div class="section-head text-align-left">
                                <div class="section-sub-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <span class="subtitle">Guia Rápido</span>
                                </div>
                                <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">
                                    Como fazer <br> uma indicação?
                                </h2>
                                <p class="description tmp-scroll-trigger tmp-fade-in animation-order-3">
                                    O processo é simples, rápido e totalmente digital. Siga os passos abaixo e comece a
                                    participar das campanhas de indicação da <strong>Educação Adventista</strong>.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Passo a passo à direita -->
                    <div class="col-xxl-6 col-lg-12 col-md-12">
                        <div class="my-skill-card-style-two row">
                            <!-- Passo 1 -->
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="my-skill-card tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <h3 class="card-title">1. Acesse o sistema</h3>
                                    <p class="card-para">
                                        Entre com seu login e vá até a área de campanhas disponíveis.
                                    </p>
                                </div>
                            </div>

                            <!-- Passo 2 -->
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="my-skill-card tmp-scroll-trigger tmp-fade-in animation-order-2">
                                    <h3 class="card-title">2. Cadastre o indicado</h3>
                                    <p class="card-para">
                                        Preencha os dados básicos da pessoa que deseja indicar.
                                    </p>
                                </div>
                            </div>

                            <!-- Passo 3 -->
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="my-skill-card tmp-scroll-trigger tmp-fade-in animation-order-3">
                                    <h3 class="card-title">3. Acompanhe o processo</h3>
                                    <p class="card-para">
                                        Veja em tempo real se a indicação foi validada e em que etapa está.
                                    </p>
                                </div>
                            </div>

                            <!-- Passo 4 -->
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="my-skill-card tmp-scroll-trigger tmp-fade-in animation-order-4">
                                    <h3 class="card-title">4. Receba sua recompensa</h3>
                                    <p class="card-para">
                                        Após a confirmação da matrícula, você recebe sua premiação conforme a campanha.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tpm How To Indicate Area End -->



    <!-- Tpm Educação Adventista - Instituições Start -->
    <section class="tmp-latest-portfolio tmp-section-gapTop" id="escolas">
        <div class="container">
            <div class="header-top-inner">
                <div class="section-head text-align-left">
                    <div class="section-sub-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <span class="subtitle">Instituições</span>
                    </div>
                    <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">
                        Você já conhece a <br> Educação Adventista? <br> <small>Escolha uma instituição e faça uma indicação.</small>
                    </h2>
                </div>
                <div class="discription-area tmp-scroll-trigger tmp-fade-in animation-order-3">
                    <p class="description">
                        Conheça nossas escolas cadastradas nas campanhas e descubra como a
                        <strong>Educação Adventista</strong> transforma vidas em cada região.
                    </p>
                </div>
            </div>

            <?php /*

            <div class="row g-5">
                <?php if (!empty($institutions)): ?>
                    <?php foreach ($institutions as $index => $institution): ?>
                        <?php
                        if (!empty($institution->photo)) {
                            $image = image($institution->photo, 800, 800);
                            $useUrl = false;
                        } else {
                            $image = "shared/assets/images/front/educacao-adventista.jpg";
                            $useUrl = true;
                        }
                        ?>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="latest-portfolio-card-style-two tmponhover tmp-scroll-trigger tmp-fade-in animation-order-<?= $index + 1 ?>">
                                <div class="portfoli-card-img">
                                    <div class="img-box v2">
                                        <a href="javascript:void(0);">
                                            <img class="img-primary hidden-on-mobile"
                                                src="<?= $useUrl ? url($image) : $image ?>"
                                                alt="<?= htmlspecialchars($institution->name) ?>">
                                            <img class="img-secondary"
                                                src="<?= $useUrl ? url($image) : $image ?>"
                                                alt="<?= htmlspecialchars($institution->name) ?>">
                                        </a>
                                    </div>
                                </div>
                                <div class="portfolio-card-content-wrap">
                                    <div class="content-left">
                                        <h3 class="portfolio-card-title">
                                            <?= $institution->code . " - " . htmlspecialchars($institution->name) ?>
                                        </h3>

                                        <!-- Lista de campanhas -->
                                        <?php if (!empty($institution->campaigns)): ?>
                                            <div class="mt-3 d-flex flex-column gap-2">
                                                <?php foreach ($institution->campaigns as $campaign): ?>
                                                    <a href="<?= url("/c/{$campaign->slug}") ?>"
                                                        class="btn btn-warning hover-icon-reverse radius-round btn-border btn-sm fs-3 text-white fw-bold">
                                                        <span class="icon-reverse-wrapper">
                                                            <span class="btn-text">
                                                                Indique agora para a campanha: <?= htmlspecialchars($campaign->title) ?>
                                                            </span>
                                                        </span>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php else: ?>
                                            <p class="text-muted mt-2">Nenhuma campanha disponível no momento.</p>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center">Nenhuma instituição cadastrada até o momento.</p>
                <?php endif; ?>
            </div>

            */ ?>

            <!-- Botão -->
            <!-- <div class="see-all-btn-wrap text-center mt--60">
                <a class="tmp-btn hover-icon-reverse radius-round" href="" target="_blank">
                    <span class="icon-reverse-wrapper">
                        <span class="btn-text">Ver todas as instituições</span>
                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                    </span>
                </a>
            </div> -->
        </div>
    </section>
    <!-- Tpm Educação Adventista - Instituições End -->

    <style>
        /* Estilo base dos selects igual ao input */
        .form-group select {
            border: 0 none;
            border-radius: 5px;
            height: 60px;
            font-size: var(--font-size-b1);
            transition: var(--transition);
            padding: 0 20px;
            background-color: #EFF0F6;
            color: var(--color-body);
            width: 100%;
            appearance: none;
            /* remove a seta nativa */
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,<svg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24'><path fill='%23666' d='M7 10l5 5 5-5z'/></svg>");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 14px;
        }

        .form-group select:focus {
            border-color: var(--color-primary);
            box-shadow: none;
            border: 1px solid var(--color-body);
            outline: none;
        }
    </style>
    <section id="busca-instituicoes" class="tmp-section-gap mt-0 pt-0">
        <div class="container">
            <div class="section-head text-center mb-5">
                <p class="description">Busque por nome, sigla, estado, cidade, união ou associação.</p>
            </div>

            <form id="formBuscaInstituicoes" class="tmp-dynamic-form">
                <div class="contact-form-wrapper row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="q" class="input-field"
                                placeholder="Nome ou Sigla">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <select name="state" id="field_state" class="input-field">
                                <option value="">Estado</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <select name="city" id="field_city" class="input-field">
                                <option value="">Cidade</option>
                            </select>
                        </div>
                    </div>

                    <?php /*
                    <div class="col-lg-2 col-md-6">
                        <div class="form-group">
                            <select name="union_id" class="input-field">
                                <option value="">União</option>
                                <?php if (!empty($unionsOptions)): foreach ($unionsOptions as $uid => $uname): ?>
                                        <option value="<?= $uid ?>"><?= htmlspecialchars($uname) ?></option>
                                <?php endforeach;
                                endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <div class="form-group">
                            <select name="association_id" class="input-field">
                                <option value="">Associação</option>
                                <?php if (!empty($associationsOptions)): foreach ($associationsOptions as $aid => $row): ?>
                                        <option value="<?= $aid ?>"><?= htmlspecialchars($row['name']) ?></option>
                                <?php endforeach;
                                endif; ?>
                            </select>
                        </div>
                    </div>
                    */ ?>

                    <div class="col-lg-12 mt-3 mb-5">
                        <div class="tmp-button-here text-center">
                            <button type="submit"
                                class="tmp-btn hover-icon-reverse radius-round btn-border fw-bold px-5">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text">Buscar Instituições</span>
                                    <span class="btn-icon"><i class="fa-sharp fa-regular fa-magnifying-glass"></i></span>
                                    <span class="btn-icon"><i class="fa-sharp fa-regular fa-magnifying-glass"></i></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>



            <!-- Resultados -->
            <div id="resultInstituicoes" class="row g-4"></div>
        </div>
    </section>









    <!-- Start Footer Area  -->
    <footer class="footer-area footer-style-two-wrapper bg-color-footer bg_images tmp-section-gap pb-0">
        <div class="container">
            <div class="footer-main footer-style-two">
                <div class="row g-5">

                    <!-- Logo + Descrição -->
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="single-footer-wrapper border-right mr--20">
                            <div class="logo mb-3">
                                <a href="<?= url() ?>">
                                    <img src="<?= url("shared/assets/images/front/ea.png") ?>"
                                        alt="Educação Adventista">
                                </a>
                            </div>
                            <p class="description">
                                O Sistema de Indicação conecta pessoas e instituições da <strong>Educação Adventista</strong>,
                                a maior rede educacional confessional do mundo.
                            </p>
                        </div>
                    </div>

                    <!-- Links Rápidos -->
                    <div class="col-lg-2 col-md-4 col-sm-6">

                    </div>

                    <!-- Contato -->
                    <div class="col-lg-3 col-md-4 col-sm-6">

                    </div>

                    <!-- Newsletter -->
                    <div class="col-lg-4 col-md-6 col-sm-6">

                    </div>

                </div>
            </div>

            <!-- Copyright -->
            <div class="text-center mt-5 text-white-50 small">
                © <?= date("Y") ?> Educação Adventista – Todos os direitos reservados.
            </div>
        </div>
    </footer>

    <div class="copyright-area-one">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-wrapper tmp-scroll-trigger animation-order-1">
                        <p class="copy-right-para">Desenvolvido pelo © UNIAENE <script>
                                document.write(new Date().getFullYear())
                            </script>
                        </p>
                        <ul class="tmp-link-animation">
                            <li><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalTerms">Termos e Condições</a></li>
                            <li><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalPrivacy">Política de Privacidade</a></li>
                            <li><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalAbout">Sobre</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Area  -->



    <!-- progress area start -->
    <div class="scrollToTop" style="display: block;">
        <div class="arrowUp">
            <i class="fa-light fa-arrow-up"></i>
        </div>
        <div class="water" style="transform: translate(0px, 87%);">
            <svg viewBox="0 0 560 20" class="water_wave water_wave_back">
                <use xlink:href="#wave"></use>
            </svg>
            <svg viewBox="0 0 560 20" class="water_wave water_wave_front">
                <use xlink:href="#wave"></use>
            </svg>
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 560 20" style="display: none;">
                <symbol id="wave">
                    <path d="M420,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C514,6.5,518,4.7,528.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H420z" fill="#"></path>
                    <path d="M420,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C326,6.5,322,4.7,311.5,2.7C304.3,1.4,293.6-0.1,280,0c0,0,0,0,0,0v20H420z" fill="#"></path>
                    <path d="M140,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C234,6.5,238,4.7,248.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H140z" fill="#"></path>
                    <path d="M140,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C46,6.5,42,4.7,31.5,2.7C24.3,1.4,13.6-0.1,0,0c0,0,0,0,0,0l0,20H140z" fill="#"></path>
                </symbol>
            </svg>

        </div>
    </div>
    <!-- progress area end -->

    <style>
        /* ===== Estilo personalizado para os modais ===== */
        .modal-content {
            border-radius: 20px;
            /* cantos bem arredondados */
            border: none;
            /* remove borda padrão */
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            /* sombra suave */
            padding: 10px;
        }

        .modal-header {
            border-bottom: none;
            /* remove linha feia */
            padding: 20px 25px;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--color-primary);
            /* segue a cor primária do tema */
        }

        .modal-body {
            padding: 20px 25px 30px 25px;
            font-size: 1rem;
            line-height: 1.6;
            color: var(--color-body);
        }

        .modal-body p {
            margin-bottom: 1rem;
        }

        .modal-body ul {
            padding-left: 1.2rem;
        }

        .modal-body ul li {
            margin-bottom: .5rem;
        }

        .modal-body blockquote {
            background: #f9f9f9;
            border-left: 4px solid var(--color-primary);
            padding: 15px 20px;
            border-radius: 10px;
            font-style: italic;
        }

        /* Botão de fechar moderno */
        .btn-close {
            background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath stroke='black' stroke-linecap='round' stroke-width='2' d='M2 2l12 12M14 2L2 14'/%3e%3c/svg%3e") center/1em auto no-repeat;
            opacity: .6;
        }

        .btn-close:hover {
            opacity: 1;
        }
    </style>

    <!-- Modal Termos e Condições -->
    <div class="modal fade" id="modalTerms" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Termos e Condições</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <p>
                        Este sistema de indicações reúne campanhas de diversas instituições da <strong>Educação Adventista</strong>.
                        Cada instituição participante possui seus próprios <strong>termos e condições</strong>, que podem incluir critérios específicos de participação, prazos e requisitos adicionais.
                    </p>
                    <p>
                        Recomendamos que você consulte diretamente os regulamentos disponibilizados em cada campanha para compreender detalhadamente suas regras, condições de premiação e restrições.
                    </p>
                    <p class="text-muted">
                        O sistema atua apenas como plataforma de intermediação, não sendo responsável pelas políticas individuais das instituições.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Política de Privacidade -->
    <div class="modal fade" id="modalPrivacy" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Política de Privacidade</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <p>
                        A privacidade dos nossos usuários é prioridade. Os dados fornecidos neste sistema de indicação são utilizados exclusivamente para:
                    </p>
                    <ul>
                        <li>Registrar e gerenciar indicações;</li>
                        <li>Comunicar informações relevantes sobre campanhas;</li>
                        <li>Garantir a segurança e integridade da plataforma.</li>
                    </ul>
                    <p>
                        Não compartilhamos dados pessoais com terceiros sem o devido consentimento, exceto quando exigido por lei.
                        As informações ficam armazenadas em ambiente seguro, seguindo boas práticas de proteção de dados.
                    </p>
                    <p class="text-muted">
                        Ao utilizar a plataforma, você concorda com esta política e autoriza o uso de suas informações conforme descrito.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Sobre Nós -->
    <div class="modal fade" id="modalAbout" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Sobre o Projeto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <p>
                        O <strong>Sistema de Indicação da Educação Adventista</strong> foi desenvolvido pelo
                        <strong>Núcleo de Tecnologia e Inovação do UNIAENE</strong>, em parceria com a
                        <strong>ULB - União Leste Brasileira da Igreja Adventista do Sétimo Dia</strong>.
                    </p>
                    <p>
                        Nosso objetivo é aproximar ainda mais a comunidade da Educação Adventista,
                        facilitando a divulgação e participação em campanhas de indicação em todas as nossas instituições.
                    </p>
                    <h6 class="mt-4">✨ Diferenciais do projeto:</h6>
                    <ul>
                        <li>Plataforma moderna, segura e intuitiva;</li>
                        <li>Foco na experiência do usuário;</li>
                        <li>Integração com as instituições de ensino da rede Adventista;</li>
                        <li>Transparência nos processos e acompanhamento das indicações.</li>
                    </ul>
                    <p>
                        Este é apenas o início: novas funcionalidades e melhorias estão sempre em desenvolvimento,
                        com o propósito de fortalecer nossa rede e valorizar cada aluno, família e comunidade que escolhe caminhar conosco.
                    </p>

                    <blockquote class="blockquote mt-4">
                        <p class="mb-0">“A verdadeira educação significa mais do que o preparo meramente acadêmico. Ela tem que ver com o ser todo, e com todo o período de existência possível ao ser humano.”</p>
                        <footer class="blockquote-footer mt-3" style="font-size: 1.6rem;">Ellen G. White, <span title="Educação, p. 13">Educação, p. 13</span></footer>
                    </blockquote>


                </div>
            </div>
        </div>
    </div>




    <script src="assets/js/vendor/jquery.js"></script>
    <script src="assets/js/vendor/jquery-ui.min.js"></script>
    <script src="assets/js/vendor/waypoints.min.js"></script>

    <script src="assets/js/plugins/odometer.js"></script>
    <script src="assets/js/vendor/appear.js"></script>


    <script src="assets/js/vendor/jquery-one-page-nav.js"></script>
    <script src="assets/js/plugins/swiper.js"></script>

    <script src="assets/js/plugins/gsap.js"></script>
    <script src="assets/js/plugins/splittext.js"></script>
    <script src="assets/js/plugins/scrolltigger.js"></script>
    <script src="assets/js/plugins/scrolltoplugins.js"></script>
    <script src="assets/js/plugins/smoothscroll.js"></script>
    <!-- bootstrap Js-->
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/waw.js"></script>
    <script src="assets/js/plugins/isotop.js"></script>
    <script src="assets/js/plugins/animation.js"></script>
    <script src="assets/js/plugins/contact.form.js"></script>
    <script src="assets/js/vendor/backtop.js"></script>
    <script src="assets/js/plugins/text-type.js"></script>
    <!-- custom Js -->
    <script src="assets/js/main.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const links = document.querySelectorAll('a[href^="#"]');

            links.forEach(link => {
                link.addEventListener("click", function(e) {
                    e.preventDefault();

                    const targetId = this.getAttribute("href").substring(1);
                    const target = document.getElementById(targetId);

                    if (target) {
                        const headerOffset = 80; // ajuste se seu header fixo for maior/menor
                        const elementPosition = target.getBoundingClientRect().top;
                        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                        window.scrollTo({
                            top: offsetPosition,
                            behavior: "smooth"
                        });
                    }
                });
            });
        });
    </script>

    <script>
        document.getElementById("formBuscaInstituicoes").addEventListener("submit", function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch("<?= url() ?>/institutions/search", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    const container = document.getElementById("resultInstituicoes");
                    container.innerHTML = "";
                    if (data.success && data.results.length > 0) {
                        data.results.forEach((inst, index) => {
                            container.innerHTML += `
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="latest-portfolio-card-style-two tmponhover tmp-scroll-trigger tmp-fade-in animation-order-${index + 1}">
                                        <div class="portfoli-card-img">
                                            <div class="img-box v2">
                                                <a href="${inst.domain ? (inst.domain.startsWith('http') ? inst.domain : 'https://' + inst.domain) : 'javascript:void(0);'}">
                                                    <img class="img-primary hidden-on-mobile"
                                                        src="${inst.photo}"
                                                        alt="${inst.name}">
                                                    <img class="img-secondary"
                                                        src="${inst.photo}"
                                                        alt="${inst.name}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="portfolio-card-content-wrap">
                                            <div class="content-left">
                                                <h3 class="portfolio-card-title">
                                                    ${inst.code} - ${inst.name}
                                                </h3>

                                                <!-- Lista de campanhas -->
                                                ${
                                                    inst.campaigns && inst.campaigns.length > 0
                                                        ? `<div class="mt-3 d-flex flex-column gap-2">
                                                            ${inst.campaigns.map(campaign => `
                                                                <a href="<?= url() ?>/c/${inst.code}/${campaign.slug}"
                                                                    class="btn btn-warning hover-icon-reverse radius-round btn-border btn-sm fs-3 text-white fw-bold">
                                                                    <span class="icon-reverse-wrapper">
                                                                        <span class="btn-text">
                                                                            Indique agora para a campanha: ${campaign.title}
                                                                        </span>
                                                                    </span>
                                                                </a>
                                                            `).join('')}
                                                        </div>`
                                                        : `<p class="text-muted mt-2">Nenhuma campanha disponível no momento.</p>`
                                                }
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });

                    } else {
                        container.innerHTML = `
                        <div class="col-12 text-center p-5">
                            <p class="text-muted fw-bold fs-2">Nenhuma instituição da Rede Adventista faz parte deste sistema de indicação.</p>
                        </div>
                        <a class="tmp-btn hover-icon-reverse radius-round bg-info" href="" target="_blank">
                            <span class="icon-reverse-wrapper">
                                <span class="btn-text">Ver todas as instituições da Rede</span>
                                <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                            </span>
                        </a>
                        `;
                    }
                });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            const $stateSel = $('#field_state');
            const $citySel = $('#field_city');

            // Carregar estados
            fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome")
                .then(res => res.json())
                .then(estados => {
                    estados.forEach(e => {
                        let opt = new Option(e.nome, e.sigla, false, false);
                        $stateSel.append(opt);
                    });
                    $stateSel.trigger('change'); // renderiza no select2
                });

            // Quando mudar estado → carregar cidades
            $stateSel.on('change', function() {
                const uf = this.value;
                $citySel.empty().append(new Option("Selecione", "", true, false)).trigger('change');
                if (!uf) return;
                fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${uf}/municipios`)
                    .then(res => res.json())
                    .then(cidades => {
                        cidades.forEach(c => {
                            let opt = new Option(c.nome, c.nome, false, false);
                            $citySel.append(opt);
                        });
                        $citySel.trigger('change'); // renderiza no select2
                    });
            });
        });
    </script>

    <script>
        //URL Config
        let url = document.getElementById("url-global").getAttribute("data-url")

        //Alert Flash
        let alertFlash = document.getElementById("alert-flash").innerHTML
        if (alertFlash) {
            let alert = JSON.parse(alertFlash)
            alertRender(alert.type, alert.class, alert.text, alert.title);
        }

        //Alert Render
        function alertRender(type, style, text, title) {

            let textEncoded = (function() {
                let t = document.createElement('textarea');
                t.innerHTML = text;
                return t.value;
            })();

            function icon(style) {
                switch (style) {
                    case "danger":
                        return "shield-cross"
                    case "info":
                        return "information-4"
                    case "warning":
                        return "information"
                    case "primary":
                        return "shield-tick"
                    default:
                        return "information"
                }
            }

            if (type === "toast") {
                let id = new Date().getTime();
                let alert = `
                    <div id="alertToast${id}" class="bs-toast toast animate__animated animate__tada hide animate__tada" data-bs-delay="15000" role="alert" aria-live="assertive" aria-atomic="true" style="border-radius: 0.475rem;">
                        <div class="toast-header bg-${style}" style="border-radius: 0.475rem 0.475rem 0 0;">
                            <img src="${url}/shared/assets/images/favicon/favicon.ico" class="rounded me-2" height="16">
                            <strong class="me-auto fs-6">${(title ?? "Alerta")}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body fs-6">
                            ${textEncoded}
                        </div>
                    </div>
                `;

                $("#alert-container-toast").append(alert);

                new bootstrap.Toast(
                    document.getElementById("alertToast" + id)
                ).show();
                return;
            }

            let alert = `
                <div class="notice d-flex bg-light-${style} rounded border-${style} border border-dashed mb-9 p-6">
                    <!--begin::Icon-->
                    <i class="ki-duotone ki-${icon(style)} fs-2tx text-${style} me-4">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1">
                        <!--begin::Content-->
                        <div class="fw-semibold">
                            <div class="fs-6 text-gray-700 fs-1">${textEncoded}</div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
            `;

            $("#alert-container-fixed").html(alert);
            // new bootstrap.Toast(
            //     document.getElementById("alertFixed")
            // ).show();

        }
    </script>
    <script>
        const container = document.getElementById("alert-container-fixed");

        // Observa quando algo novo aparece dentro do container
        const observer = new MutationObserver(() => {
            const notice = container.querySelector(".notice");
            if (notice) {
                // Remove após 10 segundos
                setTimeout(() => {
                    notice.classList.add("fade-out"); // aplica efeito
                    setTimeout(() => notice.remove(), 500); // espera o fade terminar
                }, 10000);
            }
        });

        observer.observe(container, {
            childList: true
        });
    </script>

</body>

</html>