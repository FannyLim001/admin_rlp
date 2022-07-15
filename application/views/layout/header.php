<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title><?= $title ?></title>
    <link rel="apple-touch-icon" href="<?= base_url() ?>template/theme-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>template/theme-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">

    <!-- Begin DataTables -->
    <script src="<?= base_url() ?>template/theme-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>



    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/theme-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/theme-assets/vendors/css/charts/chartist.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/theme-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/theme-assets/css/app-lite.css">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/theme-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/theme-assets/css/pages/dashboard-ecommerce.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
</head>


<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="<?php echo ($this->uri->uri_string() == 'admin' || $this->uri->uri_string() == '') ? 'bg-chartbg' : 'bg-gradient-x-purple-blue' ?>" data-col="2-columns">
    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="collapse navbar-collapse show" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-block d-md-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                        <li class="nav-item dropdown navbar-search"><a class="nav-link dropdown-toggle hide" data-toggle="dropdown" href="#"><i class="ficon ft-search"></i></a>
                            <ul class="dropdown-menu">
                                <li class="arrow_box">
                                    <form>
                                        <div class="input-group search-box">
                                            <div class="position-relative has-icon-right full-width">
                                                <input class="form-control" id="search" type="text" placeholder="Search here...">
                                                <div class="form-control-position navbar-search-close"><i class="ft-x">
                                                    </i></div>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language"></span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                                <div class="arrow_box"><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-ru"></i>
                                        Russian</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-es"></i> Spanish</a></div>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                                <i class="la la-archive" id="notification-navbar-link"></i>
                                <!-- <i class="ficon ft-bell bell-shake" id="notification-navbar-link"></i> -->
                                <?php if ($cartCount > 0) { ?>
                                    <span class="badge badge-pill badge-sm badge-danger badge-up ">
                                        <?= $cartCount ?>
                                    </span>
                                <?php } ?>
                                <!-- <span class="badge badge badge-info badge-pill float-right mr-2">1</span> -->
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="arrow_box_right">
                                    <?php foreach ($keranjang as $cart) : ?>
                                        <a class="dropdown-item" href="#"><i class="ft-book"></i>
                                            <?= $cart['nama_bahan'] ?>
                                        </a>
                                    <?php endforeach; ?>
                                    <!-- <a class="dropdown-item" href="#"><i class="ft-book"></i>
                                        cart content feach
                                    </a>
                                    <a class="dropdown-item" href="#"><i class="ft-bookmark"></i> 
                                        cart content
                                    </a> -->
                                    <a class="dropdown-item" href="<?= base_url('admin/detail') ?>"><i class="ft-check-square"></i>
                                        Lihat semua
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="avatar avatar-online"><img src="<?= base_url() ?>template/theme-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><img src="<?= base_url() ?>template/theme-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><span class="user-name text-bold-700 ml-1">John
                                                Doe</span></span></a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a><a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a><a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a><a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="ft-power"></i> Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar-brand" href="#">
                        <img width="150px" class="ml-2" alt="Logo Rumah Lemon PKU" src="<?= base_url() ?>assets/image/Logo_RLP_Long.png" />
                    </a>
                </li>
                <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
            </ul>
        </div>

        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item <?php if ($this->uri->uri_string() == 'admin' || $this->uri->uri_string() == '') echo 'active'; ?>">
                    <a href="<?= site_url('admin') ?>"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
                </li>
                <li class=" nav-item <?php if (substr($this->uri->uri_string(), 0, 5) == "bahan") echo 'active'; ?>">
                    <a href="<?= site_url('bahan/index') ?>"><i class="la la-dropbox"></i><span class="menu-title" data-i18n="">Bahan</span></a>
                </li>
                <li class=" nav-item <?php if (substr($this->uri->uri_string(), 0, 8) == "karyawan") echo 'active'; ?>">
                    <a href="<?= site_url('karyawan/index') ?>"><i class="la la-user"></i><span class="menu-title" data-i18n="">Karyawan</span></a>
                </li>
                <li class=" nav-item <?php if (substr($this->uri->uri_string(), 0, 8) == "supplier") echo 'active' ?>">
                    <a href="<?= site_url('supplier/index') ?>"><i class="la la-user-secret"></i><span class="menu-title" data-i18n="">Supplier</span></a>
                </li>
                <li class=" nav-item <?php if ($this->uri->uri_string() == 'admin/transaksi') echo 'active' ?>">
                    <a href="<?= site_url('admin/transaksi') ?>"><i class="la la-cart-arrow-down"></i><span class="menu-title" data-i18n="">Transaksi</span></a>
                </li>
            </ul>
        </div>
        <div class="navigation-background"></div>
    </div>