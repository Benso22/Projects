<?php
include 'inc/header.php';
?>

<?php
$id = Session::get("cmrId");
$getdata = $cmr->getCustomerData($id);
  if ($getdata) {
    while ($result = $getdata->fetch_assoc()) {
                                 
                    ?>
        <div class="main2">
                 <?php } } ?>
                 <?php
$id = Session::get("cmrId");
$getdata = $cmr->getCustomerData($id);
  if ($getdata) {
    while ($result = $getdata->fetch_assoc()) {
                                 
                    ?>
        <div class="container">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           <A href="editprofile.php" >Edit Profile</A>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $result['name'];?></h3>
            </div>
            <div class="panel-body">
              <div class="row">

                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Address :</td>
                        <td><?php echo $result['address'];?></td>
                      </tr>
                      <tr>
                        <td>City :</td>
                        <td><?php echo $result['city'];?></td>
                      </tr>
                      <tr>
                        <td>Licence :</td>
                        <td><?php echo $result['licence'];?></td>
                      </tr>
                   
                             <tr>
                        <td>Phone :</td>
                        <td><?php echo $result['phone'];?></td>
                      </tr>
                       
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:info@support.com"><?php echo $result['email'];?></a></td>
                   </tr>
                     
                    </tbody>
                  </table>
                  
                 
                </div>
              </div>
            </div>
                 
          </div>
        </div>
      </div>
    </div>
</div>
        <?php } } ?>
<?php
include 'inc/footer.php';
?>