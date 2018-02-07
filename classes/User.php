<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helper/Format.php');
?>
<?php
ob_start();
?>
<?php
class User{
	
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function customerRegistration($data){

		$name    = $this->fm->validation($data['name']);
		$address = $this->fm->validation($data['address']);
		$city    = $this->fm->validation($data['city']);
		$country = $this->fm->validation($data['country']);
		$licence = $this->fm->validation($data['licence']);
		$phone   = $this->fm->validation($data['phone']);
		$email   = $this->fm->validation($data['email']);
		$pass    = $this->fm->validation($data['pass']);

		$name    = mysqli_real_escape_string($this->db->link, $data['name']);
		$address = mysqli_real_escape_string($this->db->link, $data['address']);
		$city    = mysqli_real_escape_string($this->db->link, $data['city']);
		$country = mysqli_real_escape_string($this->db->link, $data['country']);
		$licence = mysqli_real_escape_string($this->db->link, $data['licence']);
		$phone   = mysqli_real_escape_string($this->db->link, $data['phone']);
		$email   = mysqli_real_escape_string($this->db->link, $data['email']);
		$pass    = mysqli_real_escape_string($this->db->link, $data['pass']);

		if ($name == "" || $address == "" || $city == "" || $country == "" || $licence == "" || $phone == "" || $email == "" ||	$pass == "") {
    	 	$msg = "<span class='error'>Fields Must Not Inserted.</span>";
				return $msg;
    	 }

    	 $mailquery = "SELECT * FROM user WHERE email='$email' LIMIT 1";
    	 $mailchk   = $this->db->select($mailquery);

    	 if ($mailchk != false) {
     $msg = "<span class='error'>Email already Exist! </span>";
				return $msg;
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $msg = "<span class='error'>Invalid email format! </span>";
  return $msg;
    }
    	 else{
    $query = "INSERT INTO user(name, address, city, country, licence, phone, email, pass) 
    VALUES('$name','$address','$city','$country','$licence','$phone','$email','$pass')";
    $insert_row = $this->db->insert($query);
			if ($insert_row) {
				$msg = "<span class='success'>User is Registered Successfully.</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>User Data Not Inserted.</span>";
				return $msg;
			}
		}
	}
		public function customerLogin($data){
			$email   = mysqli_real_escape_string($this->db->link, $data['email']);
			$pass    = mysqli_real_escape_string($this->db->link, $data['pass']);
			if (empty($email) || empty($pass)) {
				$msg = "<span class='error'>Fields Must Not Inserted.</span>";
				return $msg;
			}
			$query = "SELECT * FROM user WHERE email = '$email' AND pass = '$pass'";
			$result = $this->db->select($query);
			if ($result != false) {
				$value = $result->fetch_assoc();
				Session::set("cuslogin", true);
				Session::set("cmrId", $value['id']);
				Session::set("cmrName", $value['name']);
				header("location:category.php");
			} else{
				$msg = "<span class='error'>Email or Password Does Not Match.</span>";
				return $msg;
			}
		}
		public function getCustomerData($id){
		$query = "SELECT * FROM user WHERE id = '$id'";
		$result = $this->db->select($query);
		return $result;
		}
		public function Editcustomer($data,$cmrId){
		$name    = $this->fm->validation($data['name']);
		$address = $this->fm->validation($data['address']);
		$city    = $this->fm->validation($data['city']);
		$country = $this->fm->validation($data['country']);
		$licence     = $this->fm->validation($data['licence']);
		$phone   = $this->fm->validation($data['phone']);
		$email   = $this->fm->validation($data['email']);

		$name    = mysqli_real_escape_string($this->db->link, $data['name']);
		$address = mysqli_real_escape_string($this->db->link, $data['address']);
		$city    = mysqli_real_escape_string($this->db->link, $data['city']);
		$country = mysqli_real_escape_string($this->db->link, $data['country']);
		$licence     = mysqli_real_escape_string($this->db->link, $data['licence']);
		$phone   = mysqli_real_escape_string($this->db->link, $data['phone']);
		$email   = mysqli_real_escape_string($this->db->link, $data['email']);

		if ($name == "" || $address == "" || $city == "" || $country == "" || $licence == "" || $phone == "" || $email == "") {
    	 	$msg = "<span class='error'>Fields Must Not empty.</span>";
				return $msg;
    	 }
    	 else{			$query = "UPDATE user SET 
			name    = '$name',
			address = '$address',
			city    = '$city',
			country = '$country',
			licence     = '$licence',
			phone   = '$phone',
			email   = '$email'
			WHERE id = '$cmrId'";

		$update_row = $this->db->update($query);
		if ($update_row) {
				$msg = "<span class='success'>User Data Updated Successfully.</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>User Data Not Updated.</span>";
				return $msg;
			}
		}
		}
	}

?>