<?php
include 'lib/session.php';
Session::init();
include 'lib/Database.php';
include 'helper/Format.php';

spl_autoload_register(function($class){
  include_once "classes/".$class.".php";
});
$db = new Database();
$fm = new Format();
$pd = new Liquor();
$ct = new Cart();
$cat = new Category();
$cmr = new User();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Liquor Store</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <!-- Meta Tag -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- SEO -->
    <meta name="description" content="150 words">
    <meta name="author" content="uipasta">
    <meta name="url" content="http://www.yourdomainname.com">
    <meta name="copyright" content="company name">
    <meta name="robots" content="index,follow">
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script1.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<!-- Bootstrap JS -->
<script src="inc/bootstrap.min.js" type="text/javascript"></script>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link href='inc/bootstrap.min.css' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href='css/style2.css' rel='stylesheet' type='text/css'>
<link href='css/style3.css' rel='stylesheet' type='text/css'>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liquor Store</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/liquor.css">
    <script src="assets/js/lightbox-plus-jquery.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    

<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" id="Navbar">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="index.php"><img src="assets/img/logo.jpg" id="logo">Emrul's Liquor Store</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <?php 
                if (isset($_GET['cid'])) {
                    $delData = $ct->delCustomerCart();
                    Session::destroy();
                }
             ?>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                <?php
                         $login = Session::get("cuslogin");
                         if ($login == true) { ?>
                           <li><a href="profile.php" class="dropdown-toggle" type="submit" data-toggle="tooltip" data-placement="top" title="Details">
                  <i class="fa fa-user"></i></a></li>
                    <?php } ?>
                    <li role="presentation"><a href="category.php">Liquor </a></li>
                    <li role="presentation"><a href="cart.php">Cart</a></li>
                          <li id="wide-dropdown" class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-bars" aria-hidden="true"></i></a>
                      <ul class="dropdown-menu" id="notification">
                            <?php
                         $login = Session::get("cuslogin");
                         if ($login == true) { ?>
                            <li role="presentation"><a href="orderdetails.php">Orders </a></li>
                            
                                <?php } ?>
                               <li role="separator" class="divider"></li>
                                <li role="presentation"><a href="contact.php">About</a></li>


                              <?php
                         $login = Session::get("cuslogin");
                         if ($login == false) { ?>
                           <li role="presentation"><a href="login.php">Login</a></li>
                          <?php } else { ?>
                           <li role="presentation"><a href="?cid=<?php Session::get('cmrId')?>">Logout</a></li>
                        
                      </ul>
                   
                        
                    <?php } ?>
                   
                    <div class="clear"></div>

                </ul>
            </div>
        </div>
    </nav>