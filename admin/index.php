<?php
session_start();
include "database/database.php";
include "database/blogcategories.php";
include "database/blogs.php";
include "database/sliders.php";
include "database/socials.php";
include "database/links.php";
include "database/about.php";
include "database/contact.php";
include "database/terms.php";
include "database/settings.php";
include "database/mailsettings.php";
include "database/subscribers.php";
include "database/comments.php";
include "database/users.php";
include "helper/help_function.php";

if(empty($_SESSION['user_id'])){
    header("location:login.php");
}


$database = new database();
$db = $database->connect();

$settings = new settings($db);
$settings->id = 1;
$settings->read();


$page = isset($_REQUEST['page'])?$_REQUEST['page']:'dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <?php include "includes/header.php" ?>
    <!-- HEADER -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "includes/sidebar.php" ?>
        </div>
        <!-- SIDEBAR -->
        <div id="layoutSidenav_content">
            <main>
                <?php
                //print_r(session_id());
                if($page == 'dashboard'){
                    include "includes/dashboard.php"; 
                }else if($page == 'blogcategories'){
                    include "includes/blogcategories.php"; 
                }else if($page == 'blogcategories_add'){
                    include "includes/blogcategories_add.php"; 
                }else if($page == 'blogcategories_edit'){
                    include "includes/blogcategories_edit.php"; 
                }
                /*End blogcategories*/
                else if($page == 'blogs'){
                    include "includes/blogs.php"; 
                }else if($page == 'blogs_add'){
                    include "includes/blogs_add.php"; 
                }else if($page == 'blogs_edit'){
                    include "includes/blogs_edit.php"; 
                }
                /*End blogs*/
                else if($page == 'sliders'){
                    include "includes/sliders.php"; 
                }else if($page == 'sliders_add'){
                    include "includes/sliders_add.php"; 
                }else if($page == 'sliders_edit'){
                    include "includes/sliders_edit.php"; 
                }
                /*End sliders*/
                else if($page == 'socials'){
                    include "includes/socials.php"; 
                }else if($page == 'socials_add'){
                    include "includes/socials_add.php"; 
                }else if($page == 'socials_edit'){
                    include "includes/socials_edit.php"; 
                }
                /*End socials*/
                else if($page == 'links'){
                    include "includes/links.php"; 
                }else if($page == 'links_add'){
                    include "includes/links_add.php"; 
                }else if($page == 'links_edit'){
                    include "includes/links_edit.php"; 
                }
                /*End links*/
                else if($page == 'users'){
                    include "includes/users.php"; 
                }else if($page == 'users_add'){
                    include "includes/users_add.php"; 
                }else if($page == 'users_edit'){
                    include "includes/users_edit.php"; 
                }
                /*End users*/
                else if($page == 'about'){
                    include "includes/about.php"; 
                }else if($page == 'contact'){
                    include "includes/contact.php"; 
                }else if($page == 'terms'){
                    include "includes/terms.php"; 
                }else if($page == 'settings'){
                    include "includes/settings.php"; 
                }else if($page == 'mailsettings'){
                    include "includes/mailsettings.php"; 
                }else if($page == 'subscribers'){
                    include "includes/subscribers.php"; 
                }else if($page == 'subscribers_add'){
                    include "includes/subscribers_add.php"; 
                }else if($page == 'comments'){
                    include "includes/comments.php"; 
                }
                ?>
            </main>
            
        </div>

    </div>
    <div>
      <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
