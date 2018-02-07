<?php
include 'inc/header.php';
?>
<?php
 $login = Session::get("cuslogin");
 if ($login == false) {
    header("Location:login.php");
 }
?>
<div class="main2">
 <div class="row">
  <div class="col-lg-10" style="padding: 10%">
   <div class="back">
        <h1 align="right"><a href="cart.php">Previous</a></h1>
    </div>
    <div class="clear"></div>
   <div class="thumbnail">
    <h2  style="text-align:center;">Choose Payment Option</h2>
        <h2 style="text-align:center;"><a href="paymentoffline.php">Cash On Delivery</a>
    </div>
    </div>
    </div>
    </div>
   <?php
include 'inc/footer.php';
?>