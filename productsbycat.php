<?php
include 'inc/header.php';
?>
<?php
if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
	echo "<script>window.location = '404.php'; </script>";
}else{
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['catId']);
}
?>
<div class="main">
    <div class="content">
    	<div class="row section group">
	        <div class="col-lg-2 rightsidebar span_3_of_1">
		<div class="single category">
		<h3 class="side-title" style="color: #ff0039;">Category</h3>
		<ul class="list-unstyled">

				<?php
					$getcat = $cat->getAlLCat();
					if ($getcat) {
						while ($result = $getcat->fetch_assoc()) {
				?>
			   <li><a href="productsbycat.php?catId=<?php echo $result['catId']?>" title=""><?php echo $result['catName']?><span class="pull-right"></span></a></li>
			      <?php } } ?>
				</ul>    
            </div>
        </div>
            <div class="col-lg-8">
            	<div class="content">
	    		    <div class="heading">
	    		    <?php
					$getcat = $cat->getCatById($id);
					if ($getcat) {
						while ($result = $getcat->fetch_assoc()) {
				?>
	    		       <h3 href="productsbycat.php?catId=<?php echo $result['catId']?>" style="color: #ff0039; font-size: 30px;">All From <?php echo $result['catName']?></h3>
	    		       <?php } } ?>
	    		    </div>
    		        <div class="clear"></div>
	    	    </div>
		        <div class="row section group">
		      		<?php
						$getPdB = $pd->productByCat($id);
						if ($getPdB) {
							while ($result = $getPdB->fetch_assoc()) {
							
					?>
						<div class="col-lg-3 grid_1_of_4 images_1_of_4 liquor_snippet_width">
							<article class="col-item">
        		<div class="photo">
        			<div class="options">
        				<a href="preview.php?proid=<?php echo $result['productId']?>"><button class="btn btn-default" type="submit" data-toggle="tooltip" data-placement="top" title="Details">
        					<i class="fa fa-eye"></i>
        				</button></a>
        			</div>
        			<div class="options-cart">
        				
        			</div>
        			<a href="preview.php?proid=<?php echo $result['productId']?>"> <img src="admin/<?php echo $result['image']?>" class="img-responsive" alt="Product Image" /> </a>
        		</div>
        		<div class="info">
        			<div class="row">
        				<div class="price-details col-md-6">
        					<p class="details">
        						<?php echo $fm->textShorten($result['body'],40);?>
        					</p>
        					<h1><?php echo $result['productName'];?></h1>
        					<span class="price-new"><?php echo $result['price'];?> BDT/-</span>
        				</div>
        			</div>
        		</div>
        	</article>
						</div>
				    <?php } } ?>
	            </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'inc/footer.php';
?>