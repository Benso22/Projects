<?php
include 'inc/header.php';
?>
<div class="main">
 <div class="clear"></div>
    <div class="content">
    	<div class="row section group">
               <div class="col-lg-2 rightsidebar span_3_of_1">
        <div class="single category" style="position:right;">
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
	    		    <?php echo "        "?>
	    		       <h3 style="color: #ff0039;">All Liquor</h3>
	    		    </div>
    		        <div class="clear"></div>
	    	    </div>

	            <?php
						$getPd = $pd->getAllProduct2();
						if ($getPd) {
							while ($result = $getPd->fetch_assoc()) {
								
					?>

						<div class="col-lg-3 grid_1_of_4 images_1_of_4 liquor_snippet_width">
							<article class="col-item">
        		<div class="photo">
        			<div class="options">
        				
        				<a href="preview.php?proid=<?php echo $result['productId']?>"><button class="btn btn-default" type="submit" data-toggle="tooltip" data-placement="top" title="Details">
        					<i class="fa fa-eye"></i>
        				</button></a>
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
<?php
include 'inc/footer.php';
?>