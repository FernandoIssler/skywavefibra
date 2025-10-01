<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="<?= url(); ?>" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="<?= url(CONF_THEME . "/assets/images/logo-dark.png") ?>" alt="" height="60">
                            </span>
                        <span class="logo-lg">
                                <img src="<?= url(CONF_THEME . "/assets/images/logo-dark.png") ?>" alt="" height="60">
                            </span>
                    </a>

                    <a href="<?= url(); ?>" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?= url(CONF_THEME . "/assets/images/logo-light.png") ?>" alt="" height="60">
                            </span>
                        <span class="logo-lg">
                                <img src="<?= url(CONF_THEME . "/assets/images/logo-light.png") ?>" alt="" height="60">
                            </span>
                    </a>
                </div>
                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                        id="topnav-hamburger-icon"></button>

            </div>

            <div class="d-flex align-items-center">

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                            data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button"
                            class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                        <i class='bx bx-moon fs-22'></i>
                    </button>
                </div>

                <?php if (\Source\Models\Auth::user()) : ?>
                    <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                    <span class="d-flex align-items-center">
                                        <img class="rounded-circle header-profile-user" src="<?= $user->photo(); ?>"
                                             alt="Header Avatar">
                                        <span class="text-start ms-xl-2">
                                            <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?= $user->fullName(); ?></span>
                                            <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">GTI</span>
                                        </span>
                                    </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <h6 class="dropdown-header">Movimente-se</h6>
                            <?php if ($user->level == 5) : ?>
                                <a class="dropdown-item" href="<?= url("/admin"); ?>">
                                    <span class="align-middle">Administração</span>
                                    <lord-icon class="align-middle" src="https://cdn.lordicon.com/hdiorcun.json"
                                               trigger="loop"></lord-icon>
                                </a>
                                <div class="dropdown-divider"></div>
                            <?php endif; ?>
                            <a class="dropdown-item" href="<?= url("/admin/perfil"); ?>">
                                <i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i>
                                <span class="align-middle">Perfil</span>
                            </a>
                            <a class="dropdown-item" href="<?= url("sair"); ?>"><i
                                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle" data-key="t-logout">Sair</span></a>
                        </div>
                    </div>
                <?php else : ?>
                    <button type="button" class="btn btn-primary ms-4" data-bs-toggle="modal"
                            data-bs-target="#loginModals">
                        Entrar
                    </button>
                <?php endif; ?>

            </div>
        </div>
    </div>
</header>

<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="<?= url(); ?>" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="<?= url(CONF_THEME . "/assets/images/logo-light.png"); ?>" alt="" height="22">
                </span>
            <span class="logo-lg">
                    <img src="<?= url(CONF_THEME . "/assets/images/logo-dark.png") ?>" alt="" height="17">
                </span>
        </a>
        <!-- Light Logo-->
        <a href="<?= url(); ?>" class="logo logo-light">
                <span class="logo-sm">
                    <img src="<?= url(CONF_THEME . "/assets/images/logo-light.png"); ?>" alt="" height="22">
                </span>
            <span class="logo-lg">
                    <img src="<?= url(CONF_THEME . "/assets/images/logo-light.png") ?>" alt="" height="17">
                </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>