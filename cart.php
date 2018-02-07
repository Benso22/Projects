<?php
    include 'inc/header.php';
    ?>
<?php
if (isset($_GET['delpro'])) {
	$delId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delpro']);
	$delproduct = $ct->delproductbycart($delId);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$cartId = $_POST['cartId'];
	$quantity = $_POST['quantity'];
	$updateCart = $ct->UpdateCart($cartId, $quantity);
	if ($quantity <= 0) {
		$delproduct = $ct->delproductbycart($cartId);
	}
}
?>
<div class="main5">
<div class="container">
	<div class="row">
		<div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">Your Cart</div>
                <div class="panel-body">
                    <table class="table table-striped" style="float:right;text-align:left; color: black;">
                        <thead>
                            <tr>
                            	<th>SL</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Total Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            	<?php
							$getPro = $ct->getCartProduct();
							if ($getPro) {
								$i =0;
								$sum = 0;
								while ($result = $getPro->fetch_assoc()) {
									$i++;
							?>
							<td><?php echo $i; ?></td>
                                
                                <td class="col-md-3"><h5><strong><?php echo $result['productName'];?></strong></h5></td>
                                 <td><img class="img2" src="admin/<?php echo $result['image'];?>" alt=""/></td>
                                <td>
									<form action="" method="post">
									<input type="hidden" name="cartId" value="<?php echo $result['cartId'];?>"/>
										<input type="number" name="quantity" value="<?php echo $result['quantity'];?>"/>
										<input type="submit" name="submit" value="Update" style="font-size:15px; color:white;background-color:black"/>
									</form>
								</td>
                                <td class="col-md-1 text-center"><strong>BDT<?php echo $result['price'];?></strong></td>
                                <td class="col-md-1 text-center"><strong><?php
								$total = $result['price'] *  $result['quantity'];
								echo $total;?></strong></td>
                                <td class="col-sm-1 col-md-1">
                                   <a onclick="return confirm('Are You Sure to Delete?')" href="?delpro=<?php echo $result['cartId'];?>"> <button type="button" class="btn btn-danger">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </button>
                                </a>
                                </td>
                            </tr>
                            <?php $sum = $sum + $total;
							Session::set("sum", $sum);?>
                            	<?php 	} } ?>
                           <table style="float:right;text-align:left; color: black;" width="40%">
						<?php
			             $getData = $ct->CheckCartTable();
			             if ($getData) {
			             	?>
							<tr>
								<th>Sub Total : </th>
								<td>TK.<?php $vat = $sum * 0.1; echo $sum;?></td>
							</tr>
							<tr>
								<th>VAT : 10%</th>
								<td>TK. <?php echo $vat;?></td>
							</tr>
                            <tr>
                                <th>Home Delivery: Taka 50</th>
                                <td>TK. 50</td>
                            </tr>
							<tr>
								<th>Grand Total :</th>
								<td>TK.<?php $gdtotal = $vat + $sum + 50; echo $gdtotal;?> </td>
							</tr>
					   </table>
					   <?php } 
					   	?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-8">
                            <a href="category.php"><button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                            </button></a>
                           <?php
							$getPro = $ct->getCartProduct();
						if ($getPro) {
							?>
                            <a href="payment.php" class="btn btn-success">
                                Checkout <span class="glyphicon glyphicon-play"></span>
                            </a>
                             <?php  } else { ?>
                             <a href="" class="btn btn-success" disabled>
                                Checkout <span class="glyphicon glyphicon-play"></span>
                            </a>
                             <?php  } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
    include 'inc/footer.php';
    ?>
