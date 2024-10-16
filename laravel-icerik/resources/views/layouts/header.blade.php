<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" id="theme-toggle">
                    <iconify-icon id="theme-icon" icon="ri:moon-fill"></iconify-icon>
                </a>
            </li>
            <script>
                document.getElementById('theme-toggle').addEventListener('click', function() {
                    const icon = document.getElementById('theme-icon');
                    if (icon.getAttribute('icon') === 'ri:moon-fill') {
                        icon.setAttribute('icon', 'si:sun-fill');
                    } else {
                        icon.setAttribute('icon', 'ri:moon-fill');
                    }
                });
            </script>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
               <!-- Dil Seçenekleri -->
<li class="nav-item dropdown mx-2">
    <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" data-bs-toggle="dropdown"
        aria-expanded="false">
        <iconify-icon icon="material-symbols:language" width="1.2rem" height="1.2rem" style="color: black"></iconify-icon>
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
                    <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
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
                            <a href="./authentication-login.html"
                                class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
