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

    <style>
        .table thead th {
            border-top: none;
            font-weight: 600;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }

        .table tbody tr {
            transition: background-color 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: #fafafa;
        }

        .badge {
            font-size: 0.75rem;
            padding: 0.4em 0.6em;
            border-radius: 6px;
        }
    </style>

</head>

<body class="spybody index-ten primary-yellow tmp-white-version" data-spy="scroll" data-bs-target=".navbar-example2" data-offset="70">
    <div class="tmp-breadcrumb-image">
        <div class="bg_image bg_image--8 h-100"></div>
        <div id="particles-js"></div>
    </div>



    <div class="cv-card-area">
        <div class="plr--150 plr_lg--30 plr_md--30 plr_sm--30 plr_mobile--15">
            <div class="row row--25">
                <div class="col-xxl-3 col-lg-12">
                    <div class="d-flex flex-wrap align-content-start h-100 w-100 tab-content-overlay-to-top" id="home">
                        <div class="position-sticky sticky-top tmp-sticky-top w-100">
                            <div class="tmp-contact-about-inner">
                                <div class="thumbnail">
                                    <!-- Foto do indicador -->
                                    <img src="assets/images/banner/banner-user-image-05.png" alt="contact-img">

                                </div>
                                <div class="content">
                                    <div class="title-area">
                                        <h4 class="title">Nome do Indicador</h4>
                                        <span class="subtitle"></span>
                                    </div>
                                    <div class="description">
                                        <div class="info-box">
                                            <span class="phone">Fone: <a href="tel:01941043264">(00) 00000-0000</a></span>
                                            <span class="mail">E-mail: <a
                                                    href="javascreipt:void(0);">email@ail.com</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-9 col-lg-12">
                    <div class="tab-wrapper-overlay-to-top">
                        <div class="position-sticky sticky-top tmp-sticky-top w-100">
                            <ul class="tab-navigation-button style-2 nav tab-smlg nav-pills" id="v-pills-tab" role="tablist">
                                <?php foreach ($campaigns as $index => $c): ?>
                                    <li class="nav-item">
                                        <a class="nav-link tmp-nav <?= $index === 0 ? 'active' : '' ?>"
                                            id="tab-<?= $c->id ?>"
                                            data-bs-toggle="tab"
                                            href="#campaign-<?= $c->id ?>"
                                            role="tab"
                                            aria-selected="<?= $index === 0 ? 'true' : 'false' ?>">
                                            <?= htmlspecialchars($c->title) ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                        </div>

                        <div class="tmp-tab-content-area mt--40">
                            <div class="tmp-all-tab-content tab-content" id="v-pills-tabContent">
                                <?php foreach ($campaigns as $index => $c): ?>
                                    <div class="tab-pane fade <?= $index === 0 ? 'show active' : '' ?>"
                                        id="campaign-<?= $c->id ?>"
                                        role="tabpanel"
                                        aria-labelledby="tab-<?= $c->id ?>">

                                        <h3 class="fw-bold mb-4">
                                            <?= htmlspecialchars($c->title) ?>
                                            <small class="text-muted">(<?= $c->institution_code ?> - <?= $c->institution_name ?>)</small>
                                        </h3>

                                        <div class="table-responsive shadow-sm rounded bg-white p-3">
                                            <table class="table align-middle mb-0">
                                                <thead>
                                                    <tr class="border-bottom text-muted small text-uppercase">
                                                        <th>#</th>
                                                        <th>Campanha</th>
                                                        <th>Instituição</th>
                                                        <th>Lead</th>
                                                        <th>Recompensas</th>
                                                        <th>Criado em</th>
                                                        <th class="text-end">Ações</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $referrals = array_filter($myReferrals, fn($r) => $r->campaign_id == $c->id);
                                                    ?>
                                                    <?php if (!empty($referrals)): ?>
                                                        <?php foreach ($referrals as $r): ?>
                                                            <tr>
                                                                <td class="fw-bold text-muted">#<?= (int)$r->referral_id ?></td>
                                                                <td class="fw-semibold"><?= htmlspecialchars($r->campaign_title ?? '—') ?></td>
                                                                <td>
                                                                    <span class="fw-semibold"><?= htmlspecialchars($r->institution_name ?? '—') ?></span>
                                                                    <?php if (!empty($r->institution_code)): ?>
                                                                        <small class="text-muted">(<?= htmlspecialchars($r->institution_code) ?>)</small>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <div class="fw-semibold"><?= htmlspecialchars($r->lead_name ?? '—') ?></div>
                                                                    <div class="text-muted fs-7">
                                                                        <?= htmlspecialchars($r->lead_email ?? '') ?>
                                                                        <?php if (!empty($r->lead_phone)): ?>
                                                                            <?= $r->lead_email ? ' • ' : '' ?><?= htmlspecialchars($r->lead_phone) ?>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <span class="badge bg-light text-success border"><?= (int)($r->rewards_paid_count ?? 0) ?> pagas</span>
                                                                    <span class="badge bg-light text-info border ms-1"><?= (int)($r->rewards_approved_count ?? 0) ?> aprovadas</span>
                                                                </td>
                                                                <td class="text-muted"><?= !empty($r->referral_created_at) ? date('d/m/Y H:i', strtotime($r->referral_created_at)) : '—' ?></td>
                                                                <td class="text-end">
                                                                    <a href="<?= url('/app/indicacoes/' . (int)$r->referral_id) ?>" class="btn btn-sm btn-outline-primary">
                                                                        <i class="fa-regular fa-eye"></i> Detalhes
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td colspan="7" class="text-center text-muted py-4">Nenhuma indicação nesta campanha.</td>
                                                        </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>


                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Start Footer Area  -->
    <div class="tmp-footer-area footer-style-4 tmp-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Area  -->

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

</body>

</html>