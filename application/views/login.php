
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Login - Admin dan Karyawan</title>
    <link rel="apple-touch-icon" href="<?= base_url() ?>template/theme-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>template/theme-assets/images/ico/favicon.ico">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">


    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/theme-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/theme-assets/vendors/css/forms/toggle/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/theme-assets/css/plugins/forms/switch.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/theme-assets/css/core/colors/palette-switch.min.css">
    <!-- END: Vendor CSS-->
    

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/theme-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/theme-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/theme-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/theme-assets/css/components.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/theme-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/theme-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/theme-assets/css/pages/login-register.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template//assets/css/style.css">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <style>
    body.bg-full-screen-image {
        background: url(http://localhost/admin_rlp/template/theme-assets/images/backgrounds/bg-18.jpg) center center no-repeat fixed;
        -webkit-background-size: cover;
        background-size: cover;
    }
  </style>

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column"
  data-new-gr-c-s-check-loaded="14.1068.0" data-gr-ext-installed cz-shortcut-listen="true">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                    <div class="text-center mb-1">
                            <img src="<?= base_url() ?>assets/image/Logo_RLP_Long.png" width="400px" alt="branding logo">
                    </div>
                    <div class="font-large-1  text-center">                       
                        <b>Login</b>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <form class="form-horizontal" action="<?= site_url('auth/cek_login'); ?>"  method="POST">
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control round" id="user-name" placeholder="Email" name="email" required>
                                <div class="form-control-position">
                                    <i class="ft-user"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control round" id="password" placeholder="Password" name="password" required>
                                <div class="form-control-position">
                                    <i class="ft-lock"></i>
                                </div>
                            </fieldset> 
                            <div class="form-group row">
                                <div class="col-md-6 col-12 text-center text-sm-left">
                                   
                                </div>
                                <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="<?= site_url('auth/forgot_password'); ?>" class="card-link">Forgot Password?</a></div>
                            </div>                       
                            <div class="form-group text-center">
                                <button type="submit" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">Login</button>    
                            </div>
                        </form>
                    </div>                 
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?= base_url() ?>template/theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>template/theme-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>template/theme-assets/js/scripts/forms/switch.min.js" type="text/javascript"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= base_url() ?>template/theme-assets/vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= base_url() ?>template/theme-assets/js/core/app-menu.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>template/theme-assets/js/core/app.min.js" type="text/javascript"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?= base_url() ?>template/theme-assets/js/scripts/forms/form-login-register.min.js" type="text/javascript"></script>
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->
</html>