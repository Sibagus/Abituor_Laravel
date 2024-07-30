<!-- Navbar -->

<header class="navbar navbar-expand-md d-print-none">

    <div class="container-xl">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">

            <a href="/home">

                Sibag - Abitour

            </a>

        </h1>

        <div class="navbar-nav flex-row order-md-last">

            <div class="nav-item dropdown">

                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">

                    <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>

                    <div class="d-none d-xl-block ps-2">

                        <div>Abitour</div>

                        <div class="mt-1 small text-muted">Admin</div>

                    </div>

                </a>

                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                    <a href="<?php echo e(url('logout')); ?>" class="dropdown-item">Logout</a>

                </div>

            </div>

        </div>

    </div>

</header>



<header class="navbar-expand-md">

    <div class="collapse navbar-collapse" id="navbar-menu">

        <div class="navbar">

            <div class="container-xl">

                <ul class="navbar-nav">

                    <li class="nav-item">

                        <a class="nav-link" href="<?php echo e(url('home')); ?>">

                            <span class="nav-link-icon d-md-none d-lg-inline-block">

                                <i data-feather="home"></i>

                            </span>

                            <span class="nav-link-title">

                                Home

                            </span>

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="<?php echo e(url('tagihan')); ?>">

                            <span class="nav-link-icon d-md-none d-lg-inline-block">

                                <i data-feather="file-text"></i>

                            </span>

                            <span class="nav-link-title">

                                Tagihan Pembayaran

                            </span>

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="<?php echo e(url('user')); ?>">

                            <span class="nav-link-icon d-md-none d-lg-inline-block">

                                <i data-feather="user-plus"></i>

                            </span>

                            <span class="nav-link-title">

                                User

                            </span>

                        </a>

                    </li>

                    

                </ul>



            </div>

        </div>

    </div>

</header><?php /**PATH /home/sistemba/public_html/abitour/protected/resources/views/template/navbar.blade.php ENDPATH**/ ?>