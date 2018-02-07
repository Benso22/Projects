<?php
include 'inc/header.php';
?>

<?php
if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
	echo "<script>window.location = '404.php'; </script>";
}else{
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proid']);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$quantity = $_POST['quantity'];
	$addCart = $ct->addToCart($quantity, $id);
}
?>

<div class="main">
    <div class="content">
	<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">
<?php
						$getPd = $pd->getSingleProduct($id);
						if ($getPd) {
							while ($result = $getPd->fetch_assoc()) {
					?>	
                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1"><img src="admin/<?php echo $result['image']?>"/></div>
                    </div>

                </div>
                <div class="details col-md-6">
                    <div class="panel panel-default text-center">
                        <h3><div class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>   Name</div></h3>
                        <hr>
                    <h4 style="color: black;"><?php echo $result['productName'];?></h4>
                    </div>
                    <div class="panel panel-default text-center">
                        <h3><div class="panel-title"><span class="glyphicon glyphicon-info-sign"></span>  Category</div></h3>
                        <hr>
                        <h4 style="color: black;"><?php echo $result['catName'];?></h4>
                    </div>
                    <div class="panel panel-default text-center">
                        <h3><div class="panel-title"><span class="glyphicon glyphicon-comment"></span>   Description</div></h3>
                        <hr>
                        <h4 style="color: black;"><?php echo ($result['body']);?></h4>
                    </div>
                    <div class="panel panel-default text-center">
                        <h3><div class="panel-title"><span class="glyphicon glyphicon-credit-card"></span>  Money</div></h3>
                        <hr>
                        <h2><?php echo $result['price'];?> BDT/-</h2></div>
                   <span style="color: red; font-size: 18px;">
					<?php
					if (isset($addCart)) {
						echo $addCart;
					}
					?>
				</span>
                    <div class="text-center">
                       <div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
                    </div>
                </div>
            </div>
        </div>
         <?php } } ?>
    </div>
</div>
</div>
</div>
<?php
include 'inc/footer.php';
?>