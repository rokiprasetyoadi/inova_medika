<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title>Authentication | Klinik Inova Medika</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
  <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
  <meta name="author" content="colorlib" />

  <link rel="shortcut icon" href="..\imgimg\logo\inovamedika.png">
  
  <link href="..\assets\login\css\fontgapis.css" rel="stylesheet">
  <link href="..\assets\login\css\fontqiucksand.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="..\assets\login\css\bootstrap.min.css">
  <link rel="stylesheet" href="..\assets\login\css\waves.min.css" type="text/css" media="all">
  <link rel="stylesheet" type="text/css" href="..\assets\login\css\feather.css">
  <link rel="stylesheet" type="text/css" href="..\assets\login\css\themify-icons.css">
  <link rel="stylesheet" type="text/css" href="..\assets\login\css\icofont.css">
  <link rel="stylesheet" type="text/css" href="..\assets\login\css\font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="..\assets\login\css\style.css">
  <link rel="stylesheet" type="text/css" href="..\assets\login\css\pages.css">

</head>
<body themebg-pattern="theme6">

    <?php
        include ("../db/koneksi.php");

        if (isset($_POST['acc'])) {
          $admin_username = $_POST['admin_username'];
          $admin_password = md5($_POST['admin_password']);

          $sqlselect = "SELECT *FROM admin WHERE admin_username='$admin_username' AND admin_password='$admin_password'";
          $result = mysqli_query($koneksi, $sqlselect);
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

          if (mysqli_num_rows($result) == 1) {
            session_start();
            $_SESSION['admin_nama'] = $row['admin_nama'];
            $_SESSION['admin_username'] = $row['admin_username'];

            ?><meta http-equiv="refresh" content="0;url=index.php" /><?php
          }else{
            echo "<div class='alert alert-danger' role='alert'>Login Gagal!! Periksa kembali username dan password anda</div>";
          }

          mysqli_close($koneksi);
        }
      ?>

    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="login-block">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                    <form class="md-float-material form-material" method="post">
                        <div class="text-center">
                            
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20 text-center">
                                    <div class="col-md-12">
                                        <img style="height: 90px;" src="..\img\logo\inovamedika.png" alt="logo.png"></h3>
                                    </div>
                                </div>

                                <div class="form-group form-primary" style="margin-top: 50px;">
                                    <input type="text" name="admin_username" class="form-control" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Username</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="admin_password" class="form-control" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Password</label>
                                </div>
                                <div class="row m-t-25 text-left" hidden>
                                    <div class="col-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input type="checkbox" value="">
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">Remember me</span>
                                            </label>
                                        </div>
                                        <div class="forgot-phone text-right float-right">
                                            <!--
                                            <a href="#" class="text-right f-w-600"> Forgot Password?</a>
                                        -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" name="acc" class="btn btn-secondary btn-md btn-block waves-effect text-center m-b-20">LOGIN ADMIN</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

<script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="..\assets\login\js\jquery.min.js"></script>
<script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="..\assets\login\js\jquery-ui.min.js"></script>
<script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="..\assets\login\js\popper.min.js"></script>
<script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="..\assets\login\js\bootstrap.min.js"></script>

<script src="..\assets\login\js\waves.min.js" type="4878d7dfa7bc22a8dfa99416-text/javascript"></script>

<script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="..\assets\login\js\jquery.slimscroll.js"></script>

<script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="..\assets\login\js\modernizr.js"></script>
<script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="..\assets\login\js\css-scrollbars.js"></script>
<script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="..\assets\login\js/common-pages.js"></script>

<script async src="..\assets\login\js\tagmanager.js" type="4878d7dfa7bc22a8dfa99416-text/javascript"></script>

<script type="4878d7dfa7bc22a8dfa99416-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="..\assets\login\js\rocket-loader.min.js" data-cf-settings="4878d7dfa7bc22a8dfa99416-|49" defer=""></script></body>

<!-- Mirrored from colorlib.com/polygon/admindek/default/auth-sign-in-social.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:08:30 GMT -->
</html>
