<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Billing</title>
	<link rel="stylesheet" type="text/css" href="css/billing.css">
</head>
<body>


	<form method="post" action="">
		<div class="container">
			<h3 class="l1">CARD NUMBER</h3>
			<input type="text" name="t1" class="tb1" required placeholder="CARD NUMBER">
			<h3 class="l2">EXPIRATION DATE</h3>
			<input type="text" class="tb2" name="t2" id="frmCCExp" required placeholder="MM-YYYY" autocomplete="cc-exp">
			<h3 class="l3">CV CODE</h3>
			<input type="text" name="t3" class="tb3" class="tb3" required placeholder="ÇVC">
			<input type="submit" name="PAY" value="PAY" class="btn1"> 
		</div>
	</form>

	<?php  

	include("connection.php");
	
	$User_ID =  $_SESSION['User_id']; 
	$Aud_ID = $_GET['Aud_ID'];
	$Total_cost = $_SESSION['Total_cost'];

	#echo $Total_cost;

	$sql_trans = "select * from transactions ORDER by Transaction_id DESC LIMIT 1";
	$result = mysqli_query($conn,$sql_trans);

	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)) {
			$last_transact_id = $row['Transaction_ID'];
		}

	}else{
		$last_transact_id = 0;
	}


	 
	if(isset($_POST['PAY'])){
		$new_transaction_id = $last_transact_id+1;
		#echo  "User ID = ",$User_ID,"<br>";
		#echo  "Aud ID = ",$Aud_ID;

		$sql_aud_temp = "select * from aud_temp where Aud_ID = '$Aud_ID' and User_ID = '$User_ID'  ";
		$result = mysqli_query($conn,$sql_aud_temp);

		if(mysqli_num_rows($result)>0){
    	while($row = mysqli_fetch_assoc($result)) {

        	$Date = $row['Date'];
        	$Starting_time = $row['Start_time'];
        	$Ending_time = $row['End_time'];
     

       $sql_insert = "insert into date_table (Transaction_id,Date,Start_time,End_time,Aud_ID) values('$new_transaction_id','$Date','$Starting_time','$Ending_time','$Aud_ID')";
       if(mysqli_query($conn,$sql_insert)){
			#echo "RECORD INSERTED";
			
		}else{
			#echo "Error inserting1";
		}
     	}


     	$sql_trans = "insert into transactions (Transaction_id,User_ID,Aud_ID,Total_cost) values('$new_transaction_id','$User_ID','$Aud_ID','$Total_cost')";
     	if(mysqli_query($conn,$sql_trans)){
			#echo "RECORD trans";
			
		}else{
			#echo "Error Deleting";
		}




     	$sql_del = "delete from aud_temp where User_id = '$User_ID' ";
     	if(mysqli_query($conn,$sql_del)){
			#echo "RECORD DELETED";
			$message = "Your auditorium has been booked";
			echo "<script> alert('$message');</script>";
			 echo "<script>  window.location.href = 'User_home.php' </script>";
			
		}else{
			#echo "Error Deleting";
		}





 }



















		/*
		$sql = "insert into transactions (Transaction_id,User_ID,Aud_ID,Date,Start_time,End_time) values('$Transaction_id','$User_ID','$Aud_ID','$date','$emp_id','$email')";

		if(mysqli_query($conn,$sql)){
			echo "RECORD INSERTED";
			$message = "successfully added staff";
			echo "<script> alert('$message'); window.location.href = 'index.php' </script>";
			
		}else{
			echo "Error inserting";
		}
		*/ 


	}

	?>




</body>
</html>