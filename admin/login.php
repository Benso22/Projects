<?php
include '../classes/Adminlogin.php';
?>
<?php
  $al = new Adminlogin();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminUser = $_POST['adminUser'];
    $adminPass = $_POST['adminPass'];

    $loginChk = $al->adminLogin($adminUser,$adminPass);
  }
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<form action="login.php" method="post">
  
  <label>Sign in</label>
  <br/>
<?php
        if (isset($loginChk)) {
          echo $loginChk;
        }
        ?>
    <input name="adminUser" placeholder='User Name' type='text'>
    <input name="adminPass" placeholder='Password' type='password'>
  </div>
  <button type='submit'>
    <span>
      Sign in
    </span>
  </button>
</form>

</body>
</html>
