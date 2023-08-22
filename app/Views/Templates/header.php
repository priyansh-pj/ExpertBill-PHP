<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Expert Bill</title>
    <link rel="stylesheet" href="<?= base_url('public/vendors/mdi/css/materialdesignicons.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/vendors/css/vendor.bundle.base.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>">
    <link rel="shortcut icon" href="<?= base_url('public/images/favicon.ico') ?>" /><!--Set Expert Bill Favicon-->
</head>

<body>
    <div class="container-scroller">
        <!-- Navbar start -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">

                <a class="navbar-brand brand-logo" href="#">ExpertBill</a> <!--Set Expert Bill Logo large-->
                <a class="navbar-brand brand-logo-mini" href="#">EB</a> <!--Set Expert Bill Logo mini-->
            </div>
            <!-- Toggler start -->
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <!-- Toggler end -->

                <!-- Search start -->
                <div class="search-field d-none d-md-block">
                    <form class="d-flex align-items-center h-100" action="#">
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                            <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
                        </div>
                    </form>
                </div>
                <!-- Search end -->

                <ul class="navbar-nav navbar-nav-right">
                    <!-- Profile Start -->
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                <i class="mdi mdi-account"></i>
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black"><?= $profile->username ?><!--USer name--></p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="mdi mdi-settings me-2 text-success"></i> Settings </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
                        </div>
                    </li>
                    <!-- Profile End -->
                    <li class="nav-item d-none d-lg-block full-screen-link">
                        <a class="nav-link text-primary">
                            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                            Fullscreen
                        </a>
                    </li>

                    <li class="nav-item nav-logout d-none d-lg-block">
                        <a class="nav-link text-danger" href="#">
                            <i class="mdi mdi-power"></i>
                            Logout
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- Navbar End -->
        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar Start -->

            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <!-- Profile Start -->
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image">
                                <img src="../../../public/images/faces-clipart/pic-1.png" alt="profile">
                                <!--Profile image-->
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2"><?= $profile->first_name . " " . $profile->last_name ?> <!-- username --></span>
                                <?php if (isset($organization)) : ?>
                                    <span class="text-secondary text-small"><?= $role ?> (<?= $organization ?>)<!--role--></span>
                                <?php endif ?>
                            </div>
                        </a>
                    </li>
                    <!-- Profile End -->
                    <!-- Dashboard Start -->
                    <div class="border-bottom"></div>

                    <li class="nav-item">
                        <a class="nav-link" href="../../index.html">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <!-- Role Start -->
                    <!-- Owner -->
                    <?php if (str_contains($role, 'OWNER')) : ?>
                        <div class="border-bottom"></div>
                        <li class="nav-item ">
                            <a class="nav-link" data-bs-toggle="collapse" href="#owner" aria-expanded="false" aria-controls="owner">
                                <span class="menu-title">Owner</span>
                                <i class="menu-arrow"></i>
                                <i class="mdi mdi-account-card-details menu-icon"></i>
                            </a>
                            <div class="collapse" id="owner">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="#">Manage Organization</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Organization Settings</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#" disabled>Update Subscription</a></li>
                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if (str_contains($role, 'ACCOUNTANT')) : ?>
                        <!-- Accountant -->
                        <div class="border-bottom"></div>
                        <li class="nav-item ">
                            <a class="nav-link" data-bs-toggle="collapse" href="#accountant" aria-expanded="false" aria-controls="accountant">
                                <span class="menu-title">Accountant</span>
                                <i class="menu-arrow"></i>
                                <i class="mdi mdi-cash-multiple menu-icon"></i>
                            </a>
                            <div class="collapse" id="accountant">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="#">Billing</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Billing History</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">GST Billing History</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">E-way Billing History</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Quotation</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Quotation History</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Invoices</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Invoices History</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Expense</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Expense History</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Inventory</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Customer Details</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Supplier Details</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Accounts</a></li>
                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if (str_contains($role, 'SALES')) : ?>
                        <!-- Sales -->
                        <div class="border-bottom"></div>
                        <li class="nav-item ">
                            <a class="nav-link" data-bs-toggle="collapse" href="#sales" aria-expanded="false" aria-controls="sales">
                                <span class="menu-title">Sales</span>
                                <i class="menu-arrow"></i>
                                <i class="mdi mdi-briefcase menu-icon"></i>
                            </a>
                            <div class="collapse" id="sales">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="#">Billing</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Billing History</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Quotation</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Quotation History</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Sales Leads</a></li>

                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if (str_contains($role, 'ANALYST')) : ?>
                        <!-- Analyst -->
                        <div class="border-bottom"></div>
                        <li class="nav-item ">
                            <a class="nav-link" data-bs-toggle="collapse" href="#analyst" aria-expanded="false" aria-controls="analyst">
                                <span class="menu-title">Analyst</span>
                                <i class="menu-arrow"></i>
                                <i class="mdi mdi-chart-areaspline menu-icon"></i>
                            </a>
                            <div class="collapse" id="analyst">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="#">Predictive Analytics</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Demand Forecasting</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Employee Management</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Sentiment Analysis</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Risk Assessment</a></li>
                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if (str_contains($role, 'HR')) : ?>
                        <!-- Human Resource -->
                        <div class="border-bottom "></div>
                        <li class="nav-item ">
                            <a class="nav-link" data-bs-toggle="collapse" href="#human-resource" aria-expanded="false" aria-controls="human-resource">
                                <span class="menu-title">Human Resource (HR)</span>
                                <i class="menu-arrow"></i>
                                <i class="mdi mdi-account-multiple menu-icon"></i>
                            </a>
                            <div class="collapse" id="human-resource">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="#">Manage Employee</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Add Employee</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Salary Distribution</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Salary Slip History</a></li>

                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if (str_contains($role, 'SUPERVISOR')) : ?>
                        <!-- Supervisor -->
                        <div class="border-bottom "></div>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#supervisor" aria-expanded="false" aria-controls="supervisor">
                                <span class="menu-title">Supervisor</span>
                                <i class="menu-arrow"></i>
                                <i class="mdi mdi-worker menu-icon"></i>
                            </a>
                            <div class="collapse" id="supervisor">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="#">Inventory</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Manifacture Parts</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Manifacture Parts History</a></li>
                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>

                    <!-- Role End -->
                </ul>
            </nav>
            <!-- Sidebar End -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body" style="padding:1.2rem;">
                                    <div class="clearfix">
                                        <h4 class="card-title float-left" style="margin-bottom: 0px;"><?= $title ?></h4>
                                        <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>