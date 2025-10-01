<?php if (!$isOnlyIndicator): ?>
    <?php $sidebarActive = "text-primary"; ?>
    <!--begin::Sidebar-->
    <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="275px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_toggle">
        <!--begin::Sidebar nav-->
        <div class="app-sidebar-wrapper py-8 py-lg-10" id="kt_app_sidebar_wrapper">
            <!--begin::Nav wrapper-->
            <div id="kt_app_sidebar_nav_wrapper" class="d-flex flex-column px-8 px-lg-10 hover-scroll-y" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="{default: false, lg: '#kt_app_header'}" data-kt-scroll-wrappers="#kt_app_sidebar, #kt_app_sidebar_wrapper" data-kt-scroll-offset="{default: '10px', lg: '40px'}">
                <!--begin::Links-->
                <div class="mb-0">
                    <!--begin::Title-->
                    <h3 class="text-gray-800 fw-bold mb-8">Opções</h3>
                    <!--end::Title-->
                    <!--begin::Row-->
                    <div class="row g-5" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                        <!--begin::Col-->
                        <div class="col-6">
                            <!--begin::Link-->
                            <a href="<?= url("app/campanhas") ?>" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-100px h-100px border-gray-200" data-kt-button="true">
                                <!--begin::Icon-->
                                <span class="mb-2">
                                    <i class="ki-outline ki-calendar fs-1 <?= $active == "campaigns" ? $sidebarActive : "" ?>"></i>
                                </span>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <span class="fs-7 fw-bold <?= $active == "campaigns" ? $sidebarActive : "" ?>">Campanhas</span>
                                <!--end::Label-->
                            </a>
                            <!--end::Link-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-6">
                            <!--begin::Link-->
                            <a href="<?= url("app/recompensas") ?>" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-100px h-100px border-gray-200" data-kt-button="true">
                                <!--begin::Icon-->
                                <span class="mb-2">
                                    <i class="ki-outline ki-medal-star fs-1 <?= $active == "prizes" ? $sidebarActive : "" ?>"></i>
                                </span>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <span class="fs-7 fw-bold <?= $active == "prizes" ? $sidebarActive : "" ?>">Recompensas</span>
                                <!--end::Label-->
                            </a>
                            <!--end::Link-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-6">
                            <!--begin::Link-->
                            <a href="<?= url("app/indicadores") ?>"
                                class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-100px h-100px border-gray-200"
                                data-kt-button="true">
                                <!--begin::Icon-->
                                <span class="mb-2">
                                    <i class="ki-outline ki-chart-line-up fs-1 <?= $active == "referrers" ? $sidebarActive : "" ?>"></i>
                                </span>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <span class="fs-7 fw-bold <?= $active == "referrers" ? $sidebarActive : "" ?>">Indicadores</span>
                                <!--end::Label-->
                            </a>
                            <!--end::Link-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-6">
                            <!--begin::Link-->
                            <a href="<?= url("app/indicacoes") ?>"
                                class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-100px h-100px border-gray-200"
                                data-kt-button="true">
                                <!--begin::Icon-->
                                <span class="mb-2">
                                    <i class="ki-outline ki-user-tick fs-1 <?= $active == "referrals" ? $sidebarActive : "" ?>"></i>
                                </span>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <span class="fs-7 fw-bold <?= $active == "referrals" ? $sidebarActive : "" ?>">Indicações</span>
                                <!--end::Label-->
                            </a>
                            <!--end::Link-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-6">
                            <!--begin::Link-->
                            <a href="<?= url("app/unioes") ?>"
                                class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-100px h-100px border-gray-200"
                                data-kt-button="true">
                                <!--begin::Icon-->
                                <span class="mb-2">
                                    <i class="ki-outline ki-abstract-14 fs-1 <?= $active == "unions" ? $sidebarActive : "" ?>"></i>
                                </span>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <span class="fs-7 fw-bold <?= $active == "unions" ? $sidebarActive : "" ?>">Uniões</span>
                                <!--end::Label-->
                            </a>
                            <!--end::Link-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-6">
                            <!--begin::Link-->
                            <a href="<?= url("app/associacoes") ?>"
                                class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-100px h-100px border-gray-200"
                                data-kt-button="true">
                                <!--begin::Icon-->
                                <span class="mb-2">
                                    <i class="ki-outline ki-abstract-14 fs-1 <?= $active == "associations" ? $sidebarActive : "" ?>"></i>
                                </span>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <span class="fs-7 fw-bold <?= $active == "associations" ? $sidebarActive : "" ?>">Associações</span>
                                <!--end::Label-->
                            </a>
                            <!--end::Link-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-6">
                            <!--begin::Link-->
                            <a href="<?= url("app/instituicoes") ?>"
                                class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-100px h-100px border-gray-200"
                                data-kt-button="true">
                                <!--begin::Icon-->
                                <span class="mb-2">
                                    <i class="ki-outline ki-abstract-14 fs-1 <?= $active == "institutions" ? $sidebarActive : "" ?>"></i>
                                </span>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <span class="fs-7 fw-bold <?= $active == "institutions" ? $sidebarActive : "" ?>">Instituições</span>
                                <!--end::Label-->
                            </a>
                            <!--end::Link-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-6">
                            <!--begin::Link-->
                            <a href="<?= url("/app/usuarios") ?>"
                                class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-100px h-100px border-gray-200"
                                data-kt-button="true">
                                <!--begin::Icon-->
                                <span class="mb-2">
                                    <i class="ki-outline ki-people fs-1 <?= $active == "users" ? $sidebarActive : "" ?>"></i>
                                </span>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <span class="fs-7 fw-bold <?= $active == "users" ? $sidebarActive : "" ?>">Usuários</span>
                                <!--end::Label-->
                            </a>
                            <!--end::Link-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <?php /*
                    <div class="col-12">
                        <!--begin::Link-->
                        <a href="javascript:void(0);" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-100 h-100px border-gray-200" data-kt-button="true">
                            <!--begin::Icon-->
                            <span class="mb-2">
                                <i class="ki-outline ki-setting-2 fs-1"></i>
                            </span>
                            <!--end::Icon-->
                            <!--begin::Label-->
                            <span class="fs-7 fw-bold">Ajustes</span>
                            <!--end::Label-->
                        </a>
                        <!--end::Link-->
                    </div>
                    */ ?>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Links-->
            </div>
            <!--end::Nav wrapper-->
        </div>
        <!--end::Sidebar nav-->
    </div>
    <!--end::Sidebar-->
<?php endif; ?>