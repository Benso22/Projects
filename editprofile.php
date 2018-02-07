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
$cmrId = Session::get("cmrId");
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
              $updateCmr = $cmr->Editcustomer($_POST,$cmrId);
            }
                    ?>
<div class="main2">
 <div class="row">
  <div class="col-lg-10" style="padding: 10%">
 <h6 style="color:black; font-size: 30px; font:bold;">Personal Information</h6>
  <div class="thumbnail">
<?php
$id = Session::get("cmrId");
$getdata = $cmr->getCustomerData($id);
  if ($getdata) {
    while ($result = $getdata->fetch_assoc()) {
             ?>
  <form action="" method="post">
<table id="customers">
<?php
if (isset($updateCmr)) {
  echo $updateCmr;
}
?>
  <tr>
    <td width="20%">Name :</td>
   <td><input type="text" name="name" value="<?php echo $result['name'];?>"></td>
  </tr>
   <tr>
    <td>Address :</td>
  <td><input type="text" name="address" value="<?php echo $result['address'];?>"></td>
  </tr>
   <tr>
    <td>City :</td>
 <td><input type="text" name="city" value="<?php echo $result['city'];?>"></td>
  </tr>
   <tr>
    <td>Country :</td>
     <td><input type="text" name="country" value="<?php echo $result['country'];?>"></td>
  </tr>
   <tr>
    <td>Licence-Code :</td>
      <td><input type="text" name="licence" value="<?php echo $result['licence'];?>"></td>
  </tr>
   <tr>
    <td>Phone:</td>
     <td><input type="text" name="phone" value="<?php echo $result['phone'];?>"></td>
  </tr>
   <tr>
    <td>Email :</td>
     <td><input type="text" name="email" value="<?php echo $result['email'];?>"></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="submit" name="submit" value="Save"></td>
  </tr>
</table>
</form>
<?php } } ?>
</div>
</div>
</div>
</div>

<?php
include 'inc/footer.php';
?>
