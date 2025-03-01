<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <!-- Dil Seçenekleri -->
                {{-- <li class="nav-item dropdown mx-2">
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
                </li> --}}

                <!-- Mevcut profil menüsü -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <img src="@if ($userGender == '1') {{ asset('assets/images/profile/user-1.jpg') }}
                                    @else {{ asset('assets/images/profile/user-2.jpg') }} @endif"
                             alt="" width="35" height="35" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="{{ route('profile.index') }}"
                               class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-user fs-6"></i>
                                <p class="fs-3">Profilim</p>
                            </a>
                            <a href="{{ route('todo.index') }}" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-list-check fs-6"></i>
                                <p class="fs-3">Yapılacaklar</p>
                            </a>
                            @if(Auth::user()->type == true)
                                <a href="{{ route('admin.users') }}" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-users fs-6"></i> User Management
                                </a>
                                <a href="{{ route('admin.contact') }}" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-phone fs-6"></i> Admin Contact
                                </a>
                                <a href="{{ route('admin.dashboard.index') }}" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-dashboard fs-6"></i> Admin Dashboard
                                </a>
                            @endif
                            <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ti ti-logout"></i> Çıkış Yap
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!--  Header End -->
