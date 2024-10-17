<div class="brand-logo d-flex align-items-center justify-content-between">
    <a href="/dashboard" class="text-nowrap logo-text">
        Stok Takip Sistemi
    </a>
    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-8"></i>
    </div>
</div>

<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            {{-- Dark Mode Toggle --}}
            {{-- <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)" id="theme-toggle">
                    <iconify-icon id="theme-icon" icon="ri:moon-fill"></iconify-icon>
                </a>
            </li> --}}
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <!-- Dil Seçenekleri -->
                <li class="nav-item dropdown mx-2">
                    <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <iconify-icon icon="material-symbols:language" width="1.2rem" height="1.2rem"
                            style="color: black"></iconify-icon>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                        <li>
                            <a class="dropdown-item" href="#" onclick="changeLanguage('tr')">
                                <iconify-icon icon="emojione:flag-for-turkey"></iconify-icon>
                                Turkish
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" onclick="changeLanguage('en')">
                                <iconify-icon icon="emojione:flag-for-united-states"></iconify-icon>
                                English
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Mevcut profil menüsü -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35"
                            class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-user fs-6"></i>
                                <p class="mb-0 fs-3">My Profile</p>
                            </a>
                            <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-list-check fs-6"></i>
                                <p class="mb-0 fs-3">My Task</p>
                            </a>
                            <a href="/login" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>

{{-- @section('scripts')
    <script>
        document.getElementById('theme-toggle').addEventListener('click', function() {
            const body = document.body;
            const sidebar = document.querySelector('.left-sidebar');
            const logoText = document.querySelector('.logo-text');
            const sidebarItems = document.querySelectorAll('.sidebar-item a');
            const icons = document.querySelectorAll('iconify-icon');
            const navSmallCap = document.querySelectorAll('.nav-small-cap');
            const icon = document.getElementById('theme-icon');
            const appHeader = document.querySelector('.app-header');
            const genelCizelge = document.getElementById('genel-cizelge');
            const genelCizelgeYazi = document.getElementById('genel-cizelge-yazi');
            const popularUrun = document.getElementById('popular-urun');
            const popularUrunYazi = document.getElementById('popular-urun-yazi');
            const popularUrunYazi1 = document.getElementById('popular-urun-yazi-1');
            const genelRapor = document.getElementById('genel-rapor');
            const genelRaporYazi = document.getElementById('genel-rapor-yazi');
            const stokKartiYazi = document.getElementById('stok-karti-sayisi');
            const genelRapor2 = document.getElementById('genel-rapor-2');
            const genelRapor3 = document.getElementById('genel-rapor-3');
            const havaDurumu = document.getElementById('hava-durumu');

            // Dark mode aktifse sun ikonu, değilse moon ikonu göster
            if (icon.getAttribute('icon') === 'ri:moon-fill') {
                icon.setAttribute('icon', 'si:sun-fill');

                // Body Background ve Text Renkleri
                body.style.backgroundColor = '#1a2537';
                body.style.color = '#ffffff';

                // Sidebar Background ve Text Renkleri
                sidebar.style.backgroundColor = '#1f2a3d';
                sidebar.style.color = '#ffffff';

                // Header arka plan ve metin rengini ayarla
                appHeader.style.backgroundColor = '#2c3e50'; // Dark mode header background
                appHeader.style.color = '#ffffff'; // Dark mode header text color

                // "Stok Takip Sistemi" Yazısı Rengi
                logoText.style.color = '#ffffff';

                // Genel Çizelge
                genelCizelge.style.backgroundColor = '#1f2a3d';
                genelCizelge.style.color = '#ffffff';

                // Genel Çizelge Yazı
                genelCizelgeYazi.style.color = '#ffffff';

                // Popular Ürün
                popularUrun.style.backgroundColor = '#1f2a3d';
                popularUrun.style.color = '#ffffff';

                // Popular Ürün Yazı
                popularUrunYazi.style.color = '#ffffff';

                // Popular Ürün Yazı 1
                popularUrunYazi1.style.color = '#ffffff';

                // Genel Rapor
                genelRapor.style.backgroundColor = '#1f2a3d';
                genelRapor.style.color = '#ffffff';

                // Genel Rapor Yazı
                genelRaporYazi.style.color = '#ffffff';

                // Stok Kartı Yazı
                stokKartiYazi.style.color = '#ffffff';

                // Genel Rapor 2
                genelRapor2.style.color = '#ffffff';

                // Genel Rapor 3
                genelRapor3.style.color = '#ffffff';

                // Hava Durumu
                havaDurumu.style.backgroundColor = '#2c3e50';
                havaDurumu.style.color = '#ffffff';

                // Sidebar öğelerinin yazı renklerini beyaz yap
                sidebarItems.forEach(item => {
                    item.style.color = '#ffffff';
                });

                // Sidebar'daki tüm ikonların rengini beyaz yap
                icons.forEach(icon => {
                    icon.style.color = '#ffffff';
                });

                // "Dashboard" ve "ARAYÜZ BİLEŞENLERİ" başlıklarının rengini beyaz yap
                navSmallCap.forEach(item => {
                    item.style.color = '#ffffff';
                });

            } else {
                icon.setAttribute('icon', 'ri:moon-fill');

                // Body Background ve Text Renkleri
                body.style.backgroundColor = '#f8fafd';
                body.style.color = '#1a2537';

                // Sidebar Background ve Text Renkleri
                sidebar.style.backgroundColor = '#f8f9fa';
                sidebar.style.color = '#1a2537';

                // Header arka plan ve metin rengini varsayılan ayarla
                appHeader.style.backgroundColor = '#f8f9fa'; // Light mode header background
                appHeader.style.color = '#1a2537'; // Light mode header text color

                // "Stok Takip Sistemi" Yazısı Rengi
                logoText.style.color = '#1a2537';

                // Genel Çizelge
                genelCizelge.style.backgroundColor = 'white';
                genelCizelge.style.color = 'white';

                // Genel Çizelge Yazı
                genelCizelgeYazi.style.color = 'black';

                // Popular Ürün
                popularUrun.style.backgroundColor = 'white';
                popularUrun.style.color = 'white';

                // Popular Ürün Yazı
                popularUrunYazi.style.color = 'black';

                // Popular Ürün Yazı 1
                popularUrunYazi1.style.color = 'black';

                // Genel Rapor
                genelRapor.style.backgroundColor = 'white';
                genelRapor.style.color = 'white';

                // Genel Rapor Yazı
                genelRaporYazi.style.color = 'black';

                // Stok Kartı Yazı
                stokKartiYazi.style.color = 'black';

                // Genel Rapor 2
                genelRapor2.style.color = 'black';

                // Genel Rapor 3
                genelRapor3.style.color = 'black';

                // Hava Durumu
                havaDurumu.style.backgroundColor = '#f8f9fa';
                havaDurumu.style.color = '#1a2537';


                // Sidebar öğelerinin yazı renklerini varsayılan yap
                sidebarItems.forEach(item => {
                    item.style.color = '#1a2537';
                });

                // Sidebar'daki tüm ikonların rengini varsayılan yap
                icons.forEach(icon => {
                    icon.style.color = '#1a2537';
                });

                // "Dashboard" ve "ARAYÜZ BİLEŞENLERİ" başlıklarının rengini varsayılan yap
                navSmallCap.forEach(item => {
                    item.style.color = '#1a2537';
                });
            }
        });
    </script>
@endsection --}}
