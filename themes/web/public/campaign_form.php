<!DOCTYPE html>
<html lang="pt-br">

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
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
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


    <section class="tmp-section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <!-- Cabeçalho da campanha -->
                    <div class="text-center mb-5">
                        <h2 class="title split-collab">
                            <?= htmlspecialchars($campaign->title) ?>
                        </h2>
                        <p class="description mt-3">
                            Indique seus amigos e familiares para esta campanha da <strong>Educação Adventista</strong>.
                        </p>
                    </div>

                    <!-- Bloco de instituição -->
                    <div class="card border-0 shadow-sm mb-5">
                        <div class="card-body text-center p-5">
                            <div class="mb-4">
                                <h5 class="fw-bold text-uppercase text-muted mb-2">Instituição responsável</h5>
                                <p class="fw-bold fs-3 text-primary">
                                    <?= $institution
                                        ? htmlspecialchars($institution->code . " - " . $institution->name)
                                        : "Instituição não informada" ?>
                                </p>
                            </div>

                            <?php if (!empty($campaign->regulation_pdf)): ?>
                                <div class="mt-4">
                                    <h6 class="fw-bold text-muted mb-3">Regulamento da Campanha</h6>
                                    <a class="tmp-btn hover-icon-reverse radius-round btn-border btn-md"
                                        href="<?= url(CONF_UPLOAD_DIR . "/" . $campaign->regulation_pdf) ?>"
                                        target="_blank">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">📄 Visualizar regulamento</span>
                                            <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                            <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                        </span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>


                    <?php if (!$loggedUser): ?>
                        <div class="alert alert-info d-flex justify-content-between align-items-center">
                            <div>Para enviar uma indicação você precisa estar autenticado.</div>
                            <a class="tmp-btn hover-icon-reverse radius-round btn-border btn-sm"
                                href="<?= url('/entrar?redirect=' . urlencode("/c/{$institution->code}/" . $campaign->slug)) ?>">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text">Entrar ou cadastrar</span>
                                    <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                </span>
                            </a>
                        </div>
                    <?php else: ?>

                        <!-- Quem está indicando -->
                        <div class="mb-4 text-center">
                            <p class="text-muted mb-1">Você está indicando como:</p>
                            <h5 class="fw-bold mb-0"><?= htmlspecialchars($loggedUser->fullName()) ?></h5>
                            <p class="text-muted mt-0 pt-0"><?= htmlspecialchars($loggedUser->email) ?></p>
                        </div>

                        <!-- Formulário -->
                        <form class="tmp-dynamic-form" id="kt_referral_form"
                            action="<?= url("/c/{$institution->code}/" . $campaign->slug) ?>" method="post">

                            <input type="hidden" name="slug" value="<?= htmlspecialchars($campaign->slug) ?>">

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="input-field" type="text" name="lead_name" placeholder="Nome do Indicado *" required maxlength="255">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="input-field" type="email" name="lead_email" placeholder="E-mail do Indicado" maxlength="255">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="input-field"
                                            type="text"
                                            name="lead_phone"
                                            placeholder="Telefone do Indicado"
                                            maxlength="15">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="input-field cpf-mask"
                                            type="text"
                                            name="lead_document"
                                            placeholder="CPF do Indicado *"
                                            maxlength="14"
                                            required>
                                    </div>
                                </div>


                            </div>

                            <div class="form-group mt-4">
                                <textarea class="input-field" name="notes" rows="3" placeholder="Observações (opcional)"></textarea>
                            </div>

                            <div class="form-check form-check-custom form-check-solid my-4">
                                <input class="form-check-input me-2" type="checkbox" value="1" id="acc" name="accept_regulation" required>
                                <label class="form-check-label" for="acc">
                                    Li e aceito o regulamento desta campanha.
                                </label>
                            </div>

                            <div class="tmp-button-here text-center">
                                <button class="tmp-btn hover-icon-reverse radius-round" type="submit">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Enviar indicação</span>
                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                    </span>
                                </button>
                            </div>
                        </form>

                        <style>
                            .swal-title-lg {
                                font-size: 1.5rem !important;
                                /* aumenta título */
                                font-weight: bold;
                            }

                            .swal-text-lg {
                                font-size: 1.2rem !important;
                                /* aumenta texto */
                            }

                            .swal-popup-lg {
                                padding: 1.5rem !important;
                                /* mais espaçamento interno */
                            }
                        </style>
                        <script>
                            document.getElementById('kt_referral_form')?.addEventListener('submit', async (e) => {
                                e.preventDefault();
                                const f = e.target;
                                const fd = new FormData(f);

                                try {
                                    const res = await fetch(f.action, {
                                        method: 'POST',
                                        body: fd
                                    });
                                    const json = await res.json();

                                    // Se vier mensagem estruturada
                                    if (json.message && typeof json.message === "object") {
                                        let type = json.message.class || "info";
                                        let text = json.message.text || "";
                                        let title = json.message.title || "";

                                        Swal.fire({
                                            icon: type, // success | error | warning | info | question
                                            title: title || undefined,
                                            text: text,
                                            toast: json.message.type === "toast", // se backend marcar como "toast"
                                            position: 'top-end',
                                            showConfirmButton: json.message.type !== "toast",
                                            timer: json.message.type === "toast" ? 12000 : undefined,
                                            timerProgressBar: json.message.type === "toast",
                                            customClass: {
                                                title: 'swal-title-lg',
                                                popup: 'swal-popup-lg',
                                                htmlContainer: 'swal-text-lg'
                                            }
                                        });

                                    }
                                    // Se vier mensagem como string simples
                                    else if (json.message && typeof json.message === "string") {
                                        Swal.fire({
                                            icon: json.success ? "success" : "error",
                                            html: json.message
                                        });
                                    }

                                    if (json.redirect) {
                                        window.location.href = json.redirect;
                                    }

                                    if (json.success) {
                                        f.reset();
                                    }

                                } catch (err) {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Erro",
                                        text: "Falha de comunicação com o servidor."
                                    });
                                }
                            });
                        </script>



                    <?php endif; ?>
                </div>
            </div>
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

    <!-- <script src="assets/js/main.js"></script> -->

    <script>
        // Substituindo as funções do main.js para evitar conflitos
        $(".humberger_menu_active").on("click", function(e) {
            $(".tmp-popup-mobile-menu").addClass("active");
        });

        $(".close-menu").on("click", function(e) {
            $(".tmp-popup-mobile-menu").removeClass("active");
            $(".tmp-popup-mobile-menu .tmp-mainmenu .has-dropdown > a")
                .siblings(".submenu")
                .removeClass("active")
                .slideUp("400");
            $(".tmp-popup-mobile-menu .tmp-mainmenu .has-dropdown > a").removeClass(
                "open"
            );
        });

        $(".tmp_button_active").on("click", function(e) {
            e.preventDefault();
            $(".tmp_side_bar").addClass("tmp_side_bar_open");
            $("body").addClass("sidemenu-active");
            // tmPk._html.css({
            //   overflow: "hidden",
            // });
        });

        $(".close_side_menu_active").on("click", function(e) {
            e.preventDefault();
            $(".tmp_side_bar").removeClass("tmp_side_bar_open");
            $("body").removeClass("sidemenu-active");
        });
    </script>


    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[name="lead_phone"]').mask('(00) 00000-0000');
            $('.cpf-mask').mask('000.000.000-00');
        });
    </script>
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



</body>

</html>