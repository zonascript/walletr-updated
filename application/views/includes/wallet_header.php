<!DOCTYPE html>
<html>

<head>
    <title>Wallet </title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="favicon.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="<?php echo base_url('assets/dashboard/'); ?>fast.fonts.net/cssapi/175a63a1-3f26-476a-ab32-4e21cbdb8be2.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/dashboard/'); ?>bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/dashboard/'); ?>bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/dashboard/'); ?>bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/dashboard/'); ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/dashboard/'); ?>bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/dashboard/'); ?>bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/dashboard/'); ?>css/mainc599.css?version=3.3" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/icon_fonts_assets/'); ?>font-awesome/css/font-awesome.min.css">
</head>

<body>
    <div class="all-wrapper menu-side with-side-panel">
    <div class="loading"></div>
        <div class="layout-w">
            <!--------------------
               START - Mobile Menu
               -------------------->
            <div class="menu-mobile menu-activated-on-click color-scheme-dark">
                <div class="mm-logo-buttons-w">
                    <a class="mm-logo" href="<?php echo base_url('dashboard'); ?>"><img src="<?php echo base_url('assets/dashboard/'); ?>img/logo.png"><span>E-coin</span>
                    </a>
                    <div class="mm-buttons">

                        <div class="mobile-menu-trigger">
                            <div class="os-icon os-icon-hamburger-menu-1"></div>
                        </div>
                    </div>
                </div>
                <div class="menu-and-user" style="display: none;">

                    <!--------------------
                     START - Mobile Menu List
                     -------------------->
                    <ul class="main-menu">
                        <li class="has-sub-menu">
                            <a href="<?php echo base_url('dashboard'); ?>">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-window-content"></div>
                                </div>
                                <span>Home</span>
                            </a>

                        </li>
                        <li class="has-sub-menu">
                            <a href="<?php echo base_url('dashboard/transactions'); ?>">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-hierarchy-structure-2"></div>
                                </div>
                                <span>Transactions</span>
                            </a>

                        </li>
                        <li class="has-sub-menu">
                            <a href="<?php echo base_url('dashboard/wallet'); ?>">
                                <div class="icon-w">
                                    <i class="os-icon os-icon-wallet-loaded"></i>
                                </div>
                                <span>Wallet</span>
                            </a>

                        </li>
                        <li class="has-sub-menu">
                            <a href="<?php echo base_url('dashboard/faq'); ?>">
                                <div class="icon-w">
                                    <i class="os-icon os-icon-ui-46"></i>
                                </div>
                                <span>faq</span>
                            </a>

                        </li>

                        <li class="has-sub-menu">
                            <a href="<?php echo base_url('dashboard/logout'); ?>">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-robot-1"></div>
                                </div>
                                <span>Logout (<?php echo $this->session->userdata('username');  ?> )</span>
                            </a>

                        </li>
                    </ul>
                    <!--------------------
                     END - Mobile Menu List
                     -------------------->

                </div>
            </div>
            <!--------------------
               END - Mobile Menu
               -------------------->
            <!--------------------
               START - Menu side 
               -------------------->
            <div class="desktop-menu menu-side-w menu-activated-on-click">
                <div class="logo-w">
                    <a class="logo" href="<?php echo base_url('dashboard'); ?>"><img src="<?php echo base_url('assets/dashboard/'); ?>img/logo.png"><span>Hello! <?php echo $this->session->userdata('username');  ?></span>
                    </a>
                </div>
                <div class="menu-and-user">
                    <div class="logged-user-w">
                        <div class="logged-user-w">
                        
                            <p>
                                1 <span class='left-sidebar-wllet'><?php echo $current_wallet->current_wallet; ?></span> = <span class="left-sidebar-price"><?php echo isset($current_price) ? $current_price->USD :'Nill'; ?> USD</span>
                            </p>
                        </div>
                    </div>
                    <ul class="main-menu">
                        <li class="has-sub-menu">
                            <a href="<?php echo base_url('dashboard'); ?>">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-window-content"></div>
                                </div>
                                <span>Home</span>
                            </a>

                        </li>
                        <li class="has-sub-menu">
                            <a href="<?php echo base_url('dashboard/transactions'); ?>">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-hierarchy-structure-2"></div>
                                </div>
                                <span>Transactions</span>
                            </a>

                        </li>
                        <li class="has-sub-menu">
                            <a href="<?php echo base_url('dashboard/wallet'); ?>">
                                <div class="icon-w">
                                    <i class="os-icon os-icon-wallet-loaded"></i>
                                </div>
                                <span>Wallet</span>
                            </a>

                        </li>
                        <li class="has-sub-menu">
                            <a href="<?php echo base_url('dashboard/faq'); ?>">
                                <div class="icon-w">
                                    <i class="os-icon os-icon-ui-46"></i>
                                </div>
                                <span>Faq</span>
                            </a>

                        </li>

                        <li class="has-sub-menu">
                            <a href="<?php echo base_url('dashboard/profile'); ?>">
                                <div class="icon-w">
                                    <!-- <i class="os-icon os-icon-ui-46"></i> -->
                                </div>
                                <span>Profile</span>
                            </a>

                        </li>
                        <li class="has-sub-menu">
                            <a href="<?php echo base_url('dashboard/latest_news'); ?>">
                                <div class="icon-w">
                                    <!-- <i class="os-icon os-icon-ui-46"></i> -->
                                </div>
                                <span>Latest News</span>
                            </a>

                        </li>


                        <li class="has-sub-menu">
                            <a href="<?php echo base_url('dashboard/logout'); ?>">
                                <div class="icon-w">
                                    <div class="os-icon "></div>
                                </div>
                                <span>Logout</span>
                            </a>

                        </li>
                    </ul>

                </div>
            </div>
            <!--------------------
               END - Menu side 
               -------------------->
            <div class="content-w">

                <!--------------------
                  END - Breadcrumbs
                  -------------------->
                <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
                </div>