@extends('layouts.app')

@section('title', 'Anlık Stok')

@section('content')

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('layouts.sidebar')

        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
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
                            <li class="nav-item dropdown">
                                <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="../assets/images/profile/user-1.jpg" alt="" width="35"
                                        height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
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
            <!--  Header End -->
            <div class="body-wrapper-inner">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-list">
                                <div class="card">
                                    <div class="card-body p-3">
                                        <div class="d-flex justify-content-between align-items-center gap-6 mb-9">
                                            <form class="position-relative">
                                                <input type="text" class="form-control search-chat py-2 ps-5"
                                                    id="text-srh" placeholder="Search Product">
                                                <i
                                                    class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                                            </form>
                                            <a class="fs-6 text-muted" href="javascript:void(0)" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-title="Filter list">
                                                <i class="ti ti-filter"></i>
                                            </a>
                                        </div>
                                        <div class="table-responsive border rounded">
                                            <table class="table align-middle text-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="flexCheckDefault">
                                                            </div>
                                                        </th>
                                                        <th scope="col">Products</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check mb-0">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="flexCheckDefault1">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="../assets/images/products/s1.jpg"
                                                                    class="rounded-circle" alt="materialm-img"
                                                                    width="56" height="56">
                                                                <div class="ms-3">
                                                                    <h6 class="fw-semibold mb-0 fs-4">Curology Face wash
                                                                    </h6>
                                                                    <p class="mb-0">books</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0">Thu, Jan 12 2023</p>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="text-bg-success p-1 rounded-circle"></span>
                                                                <p class="mb-0 ms-2">InStock</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h6 class="mb-0 fs-4">$275</h6>
                                                        </td>
                                                        <td>
                                                            <a class="fs-6 text-muted" href="javascript:void(0)"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-title="Edit">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check mb-0">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="flexCheckDefault2">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="../assets/images/products/s2.jpg"
                                                                    class="rounded-circle" alt="materialm-img"
                                                                    width="56" height="56">
                                                                <div class="ms-3">
                                                                    <h6 class="fw-semibold mb-0 fs-4">Body Lotion</h6>
                                                                    <p class="mb-0">books</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0">Thu, Jan 10 2023</p>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="text-bg-danger p-1 rounded-circle"></span>
                                                                <p class="mb-0 ms-2">Out of Stock</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h6 class="mb-0 fs-4">$89</h6>
                                                        </td>
                                                        <td>
                                                            <a class="fs-6 text-muted" href="javascript:void(0)"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-title="Edit">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check mb-0">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="flexCheckDefault3">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="../assets/images/products/s3.jpg"
                                                                    class="rounded-circle" alt="materialm-img"
                                                                    width="56" height="56">
                                                                <div class="ms-3">
                                                                    <h6 class="fw-semibold mb-0 fs-4">Smart Watch</h6>
                                                                    <p class="mb-0">fashionbooks</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0">Thu, Jan 12 2023</p>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="text-bg-success p-1 rounded-circle"></span>
                                                                <p class="mb-0 ms-2">InStock</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h6 class="mb-0 fs-4">$125</h6>
                                                        </td>
                                                        <td>
                                                            <a class="fs-6 text-muted" href="javascript:void(0)"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-title="Edit">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check mb-0">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="flexCheckDefault4">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="../assets/images/products/s4.jpg"
                                                                    class="rounded-circle" alt="materialm-img"
                                                                    width="56" height="56">
                                                                <div class="ms-3">
                                                                    <h6 class="fw-semibold mb-0 fs-4">Glossy Solution</h6>
                                                                    <p class="mb-0">electronics</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0">Mon, Jan 16 2023</p>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="text-bg-success p-1 rounded-circle"></span>
                                                                <p class="mb-0 ms-2">InStock</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h6 class="mb-0 fs-4">$50</h6>
                                                        </td>
                                                        <td>
                                                            <a class="fs-6 text-muted" href="javascript:void(0)"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-title="Edit">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-bottom-0">
                                                            <div class="form-check mb-0">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="flexCheckDefault5">
                                                            </div>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <div class="d-flex align-items-center">
                                                                <img src="../assets/images/products/s5.jpg"
                                                                    class="rounded-circle" alt="materialm-img"
                                                                    width="56" height="56">
                                                                <div class="ms-3">
                                                                    <h6 class="fw-semibold mb-0 fs-4">Derma-E</h6>
                                                                    <p class="mb-0">fashionelectronics</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <p class="mb-0">Wed, Jan 18 2023</p>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <div class="d-flex align-items-center">
                                                                <span class="text-bg-danger p-1 rounded-circle"></span>
                                                                <p class="mb-0 ms-2">Out of Stock</p>
                                                            </div>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <h6 class="mb-0 fs-4">$650</h6>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <a class="fs-6 text-muted" href="javascript:void(0)"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-title="Edit">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="d-flex align-items-center justify-content-end py-1">
                                                <p class="mb-0 fs-2">Rows per page:</p>
                                                <select
                                                    class="form-select w-auto ms-0 ms-sm-2 me-8 me-sm-4 py-1 pe-7 ps-2 border-0"
                                                    aria-label="Default select example">
                                                    <option selected="">5</option>
                                                    <option value="1">10</option>
                                                    <option value="2">25</option>
                                                </select>
                                                <p class="mb-0 fs-2">1–5 of 12</p>
                                                <nav aria-label="...">
                                                    <ul class="pagination justify-content-center mb-0 ms-8 ms-sm-9">
                                                        <li class="page-item p-1">
                                                            <a class="page-link border-0 rounded-circle text-dark fs-6 round-32 d-flex align-items-center justify-content-center"
                                                                href="javascript:void(0)">
                                                                <i class="ti ti-chevron-left"></i>
                                                            </a>
                                                        </li>
                                                        <li class="page-item p-1">
                                                            <a class="page-link border-0 rounded-circle text-dark fs-6 round-32 d-flex align-items-center justify-content-center"
                                                                href="javascript:void(0)">
                                                                <i class="ti ti-chevron-right"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
