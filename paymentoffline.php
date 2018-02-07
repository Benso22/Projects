<?php
include 'inc/header.php';
?>
<?php
 $login = Session::get("cuslogin");
 if ($login == false) {
    header("Location:login.php");
 }
?>
<?php
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
  $cmrId = Session::get("cmrId");
  $insertOrder = $ct->orderProduct($cmrId);
  $delData = $ct->delCustomerCart();
  header("Location:orderdetails.php");
}
?>
<style>
  .division{width: 50%; float:left;}
</style>
<div class="main2">
 <div class="row">
  <div class="col-lg-10" style="padding: 10%">
   <div class="back">
  <a class="btn btn-primary" role="button" href="cart.php">Previous</a>
    </div>
    <div class="clear"></div>
   <div class="thumbnail">
   <div class="divison">
                <table class="tblone">
              <tr>
                <th>No</th>
                <th>Cake</th>
                <th>Price</th>
                <th>Quantity</th>
                <th >Total Price</th>
              </tr>
              <?php
              $getPro = $ct->getCartProduct();
              if ($getPro) {
                $i =0;
                $sum = 0;
                while ($result = $getPro->fetch_assoc()) {
                  $i++;
              ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $result['productName'];?></td>
                <td>BDT<?php echo $result['price'];?></td>
                <td><?php echo $result['quantity'];?></td>
                <td>TK. <?php
                $total = $result['price'] *  $result['quantity'];
                echo $total;?></td>
                
              </tr>
              <?php $sum = $sum + $total;?>
              <?php   } } ?>
            </table>
            <table style="float:right;text-align:left;" width="40%">
            
              <tr>
                <th>Sub Total : </th>
                <td>TK.<?php $vat = $sum * 0.1; echo $sum;?></td>
              </tr>
              <tr>
                <th>VAT : 10%</th>
                <td>TK. <?php echo $vat;?></td>
              </tr>
              <tr>
                <th>Grand Total :</th>
                <td>TK.<?php $gdtotal = $vat + $sum; echo $gdtotal;?> </td>
              </tr>
              <tr>
                <th></th>

                <td>
                <a class="btn btn-primary" role="button" href="?orderid=order">Confirm Order</a>
                </td>
              </tr>
             </table>

   </div>
  
    </div>
   </div>
    </div>
    </div>

   <?php
include 'inc/footer.php';
?>