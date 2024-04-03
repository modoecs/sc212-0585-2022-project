<?php
	 $bankBalance = $_POST['bankBalance'];
     $category = $_POST['category'];
     $amount = $_POST['amount'];
   


	$conn = new mysqli('localhost','root','','bank_database');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into expense_tables(bankBalance, category, amount) values(?, ?, ?)");
		$stmt->bind_param("i si", $bankBalance, $category, $amount);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>