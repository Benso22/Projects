<?php
include 'inc/header.php';
?>
<?php
 $login = Session::get("cuslogin");
 if ($login == true) {
 	header("Location:category.php");
 }
?>
<?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
							$custLog = $cmr->customerLogin($_POST);
						}
                    ?>

 <div class="main2">
   
    	 <?php
    	if (isset($urLog)) {
    		echo $urLog;
    	}
    	?>
        	<div class="header" >
			<h1>Login or Create a Free Account!</h1>
		</div>
                   
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
							$customerReg = $cmr->customerRegistration($_POST);
						}
                    ?>
    	<?php
    	if (isset($customerReg)) {
    		echo $customerReg;
    	}
    	?>
    	<div class="row">
    	  <div class="col-md-6">
    		<form action="" method="POST">
				<ul class="left-form">
					<h2>New Account:</h2>

            <div class="form-group"> 	 
                <label style="color: black;"><span class="req">* </span> Name: </label>
                    <input class="form-control" type="text" name="name" id = "txt" onkeyup = "Validate(this)" placeholder="Name" required /> 
                        <div id="errFirst"></div>    
            </div>

            <div class="form-group">
                <label style="color: black;"><span class="req">* </span> City: </label> 
                    <input class="form-control" type="text" name="city" id = "txt" onkeyup = "Validate(this)" placeholder="City" required />  
                        <div id="errLast"></div>
            </div>


  			<div class="form-group">
                <label style="color: black;"><span class="req">* </span> Licence-Code: </label> 
                    <input class="form-control" type="text" name="licence" id = "txt" onkeyup = "Validate(this)" placeholder="Licence-Code" required />  
                        <div id="errLast"></div>
            </div>


            <div class="form-group">
                <label style="color: black;""><span class="req">* </span> Email Address: </label> 
                    <input class="form-control" required type="text" name="email" id = "email"  onchange="email_validate(this.value);" />   
                        <div class="status" id="status"></div>
            </div>

           <div class="form-group">
                <label  style="color: black;"><span class="req">* </span> Address: </label> 
                    <input class="form-control" type="text" name="address" id = "txt" onkeyup = "Validate(this)" placeholder="Address" required />  
                        <div id="errLast"></div>
            </div>

            <div class="form-group">
                <label  style="color: black;"><span class="req">* </span> Country: </label> 
                    <input class="form-control" type="text" name="country" id = "txt" onkeyup = "Validate(this)" placeholder="Country" required />  
                        <div id="errLast"></div>
            </div>


            <div class="form-group">
            <label  style="color: black;"><span class="req">* </span> Phone Number: </label>
                    <input required type="text" name="phone" id="phone" class="form-control phone" maxlength="28" onkeyup="validatephone(this);" placeholder="not used for marketing"/> 
            </div>


            <div class="form-group">
                <label  style="color: black;"><span class="req">* </span> Password: </label>
                    <input required name="pass" type="password" class="form-control inputpass" minlength="4" maxlength="16" placeholder="Enter A Passoword" id="pass1" /> 
                </div>
                <div>

                <label  style="color: black;"><span class="req">* </span> Password Confirm: </label>
                    <input required name="pass" type="password" class="form-control inputpass" minlength="4" maxlength="16" placeholder="Enter again to validate"  id="pass2" onkeyup="checkPass(); return false;" />
                        <span id="confirmMessage" class="confirmMessage"></span>
            </div>

            <div class="form-group">
                <input name="register" type="submit"  value="Create Account">
            </div>
						<div class="clear"> </div>

					</ul>
				</form>
			</div>
				<form action="" method="post">
				<ul class="right-form">
					<h3>Login:</h3>
					<div>
						<li><input name="email" placeholder="E-Mail" type="text"></li>
						<li><input name="pass" placeholder="Passoword" type="password"></li>
						<h4>I forgot my Password!</h4>
							<input type="submit" onclick="myFunction()" name="login" value="Login" >
					</div>
					<div class="clear"> </div>
				</ul>
				<div class="clear"> </div>
					
			</form>
    	</div>  	
       <div class="clear"></div>
   
</div>

<script type="text/javascript">
  document.getElementById("field_terms").setCustomValidity("Please indicate that you accept the Terms and Conditions");
</script>
 <?php
include 'inc/footer.php';
?>