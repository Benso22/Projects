<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helper/Format.php');
?>
<?php
class Cart{
	
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function addToCart($quantity, $id){
		$quantity = $this->fm->validation($quantity);

		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$productId = mysqli_real_escape_string($this->db->link, $id);
		$sId       = session_id();

		$zquery = "SELECT * FROM liquor WHERE productId = '$productId'";
		$result = $this->db->select($zquery)->fetch_assoc();

		$productName = $result['productName'];
		$price       = $result['price'];
		$image       = $result['image'];

		$chkquery = "SELECT * FROM cart WHERE productId = '$productId' AND sId = '$sId'";
		$getPro = $this->db->select($chkquery);
		if ($getPro) {
			$msg = "<span class='error'>Product Already Added.</span>";
		return $msg;
		} else {

		$query = "INSERT INTO cart(sId, productId, productName, price, quantity, image) 
    VALUES('$sId','$productId','$productName','$price', '$quantity', '$image')";

    $inserted_row = $this->db->insert($query);
			if ($inserted_row) {
				header("Location:cart.php");
			} else{
				header("Location:404.php");
			}
		}
	}
	
	public function UpdateCart($cartId, $quantity){
		$cartId = mysqli_real_escape_string($this->db->link, $cartId);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);

		$query = "UPDATE cart SET quantity = '$quantity' WHERE cartId = '$cartId'";

		$update_row = $this->db->update($query);
		if ($update_row) {
				$msg = "<span class='success'>Quantity Updated Successfully.</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>Quantity Not Updated.</span>";
				return $msg;
			}
	}

	public function getCartProduct(){
		$sId = session_id();
		$query = "SELECT * FROM cart WHERE sId = '$sId'";
		$result = $this->db->select($query);
		return $result;
	}

	public function delCustomerCart(){
		$sId = session_id();
		$query = "DELETE FROM cart WHERE sId = '$sId'";
		$result = $this->db->delete($query);
	}

	public function	delproductbycart($delId){
		$delId = mysqli_real_escape_string($this->db->link, $delId);
		$query = "DELETE FROM cart WHERE cartId = '$delId'";
		$result = $this->db->delete($query);
		if ($result) {
			echo "<script>window.location:'cart.php';</script>";
		} else {
			$msg = "<span class='error'>Product Not deleted.</span>";
				return $msg;
		}
	}
		public function CheckCartTable(){
		$sId = session_id();
		$query = "SELECT * FROM cart WHERE sId = '$sId'";
		$result = $this->db->select($query);
		return $result;
		}
		public function	orderProduct($cmrId){
			$sId = session_id();
			$query = "SELECT * FROM cart WHERE sId = '$sId'";
		$getPro = $this->db->select($query);
		if ($getPro) {
			while ($result = $getPro->fetch_assoc()) {
				$productId = $result['productId'];
				$productName = $result['productName'];
				$quantity = $result['quantity'];
				$price       = $result['price'];
				$image       = $result['image'];

				$query = "INSERT INTO tbl_order(cmrId, productId, productName, quantity, price, image) 
    VALUES('$cmrId','$productId','$productName', '$quantity', '$price', '$image')";

    $inserted_row = $this->db->insert($query);
		}
			}
		}

		public function getOrderProduct($cmrId){
			$query = "SELECT * FROM tbl_order WHERE cmrId = '$cmrId' ORDER BY productId DESC";
		$result = $this->db->select($query);
		return $result;
		}
		public function getAllOrderProduct(){
			$query = "SELECT tbl_order.*, user.*
					FROM tbl_order
					JOIN user
					ON tbl_order.id = user.id
		 			ORDER BY cmrId DESC";
		$result = $this->db->select($query);
		return $result;
		}
		}
?>