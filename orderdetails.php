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
    <div class="content">
    <div class="section group">
    <div class="order">
    	<h2>Your Order Details</h2>
        <table class="tblone">
                            <tr>
                                <th>SL</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            <?php
                            $cmrId = Session::get("cmrId");
                            $getorder = $ct->getOrderProduct($cmrId);
                            if ($getorder) {
                                $i =0;
                                while ($result = $getorder->fetch_assoc()) {
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['productName'];?></td>
                                <td><img src="admin/<?php echo $result['image'];?>" alt=""/></td>
                                <td><?php echo $result['quantity'];?></td>
                                
                                <td>BDT/- <?php
                                $total = $result['price'] *  $result['quantity'];
                                $vat = $total * 0.1;
                                $gdtotal = $total + $vat;
                                echo $gdtotal;?></td>
                                
                            </tr>
                        <?php } } ?>
                        </table>
    </div>
    </div>
    <div class="clear"></div>
    </div>
    </div>
   <?php
include 'inc/footer.php';
?>