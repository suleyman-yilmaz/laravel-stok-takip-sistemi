<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard')}}" class="text-nowrap logo-text">
                Stok Takip Sistemi
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Dashboard</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('dashboard')}}" aria-expanded="false">
                        <iconify-icon icon="solar:widget-add-line-duotone"></iconify-icon>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li>
                    <span class="sidebar-divider lg"></span>
                </li>
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">ARAYÜZ BİLEŞENLERİ</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('stock.cards.index')}}" aria-expanded="false">
                        <iconify-icon icon="solar:card-2-outline"></iconify-icon>
                        <span class="hide-menu">Stok Kartı</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('products.stock.index')}}" aria-expanded="false">
                        <iconify-icon icon="foundation:graph-bar"></iconify-icon>
                        <span class="hide-menu">Anlık Stok</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('products.in.index')}}" aria-expanded="false">
                        <iconify-icon icon="mingcute:entrance-fill"></iconify-icon>
                        <span class="hide-menu">Ürün Girişi</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('products.out.index')}}" aria-expanded="false">
                        <iconify-icon icon="ion:exit-outline"></iconify-icon>
                        <span class="hide-menu">Ürün Çıkışı</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('contact.index')}}" aria-expanded="false">
                        <iconify-icon icon="hugeicons:contact-02" width="1.2rem" height="1.2rem"
                            style="color: black"></iconify-icon>
                        <span class="hide-menu">İletişim - Destek</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('help.index')}}" aria-expanded="false">
                        <iconify-icon icon="material-symbols:help"></iconify-icon>
                        <span class="hide-menu">Yardım</span>
                    </a>
                </li>
                <li>
                    <span class="sidebar-divider lg"></span>
                </li>

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
