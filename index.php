<?php
    include 'inc/header.php';
    ?>

    <div id="promo">
        <div class="jumbotron" id="LearnMoreLayer">
            <h1 style="color: #ff0039;">Fantastic Offer !</h1>
            <p>We have a great discount to our new customers. Order now and get a big discount on your order !</p>
            <p><a role="button" href="category.php" style="color: #ff0039;">Learn more</a></p>
        </div>
    </div>

<!-- FlexSlider -->
 <div class="container site-section" id="welcome">
        <h1 style="color: #ff0039;">Latest Liquor</h1>
        <div class="main6">
        <div class="row">
        <?php
                        $getPd = $pd->getAllProduct3();
                        if ($getPd) {
                            while ($result = $getPd->fetch_assoc()) {
                                
                    ?>
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="preview.php?proid=<?php echo $result['productId']?>"><img class="img-responsive" src="admin/<?php echo $result['image']?>" id="ChocoStraw" ></a>
                </div>
                <p><?php echo $result['productName'];?> </p>
            </div>
             <?php } } ?>
        </div>
    </div>
</div>

    
  <?php
    include 'inc/footer.php';
    ?>