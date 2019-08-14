<style type="text/css">

.Error_msg{
    font-family: 'Abel', sans-serif,bold;
    font-size: 15px;
    color: red;

}


.in1{
   	margin-top: 2%;
    outline: 0;
    background: #f2f2f2;
    font-family: 'Abel', sans-serif;
    width: 90%;
    border: 0;
    padding: 10px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    font-size: 14px;
    margin-left: 5%;

}

.container2{
	padding: 0.5%;
	width: 23%;
    left: 0%;
    right: 0%;
    margin-left: auto;
    margin-right: auto;
    border-radius: 10px;
    background: rgba(245, 245, 220, 0.32);

}


.btn1{
    background: #ff1919;
    width: 90%;
    border: 0;
    font-family: 'Abel', sans-serif,bold;
    font-size: 17px;
    color: #FFFFFF;
    padding: 13px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    margin-left: 5%;
    margin-top: 3%;
}

.btn1:hover{
	background: #6A1B9A;

}



.thumbnail{
	margin: auto;
    background: #E5E8E8;
    width: 150px;
    height: 150px;
    padding: 50px 30px;
    border-top-left-radius: 100%;
    border-top-right-radius: 100%;
    border-bottom-left-radius: 100%;
    border-bottom-right-radius: 100%;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    opacity: 0.9;
    background-image: url("css2/student.gif");
    background-size: 150px 150px;
}



</style>


<script type="text/javascript">

    if(date_cal.Start_time.value >= date_cal.End_time.value){
        alert("Starting time in 24 hour format shoukd be lesser than end time ");
        return false;
    }


</script>


<script type="text/javascript">
	
	function checkDate() {
		var selectedText = document.getElementById('datepicker').value;
		var selectedDate = new Date(selectedText);
		var now = new Date();
			if (selectedDate <= now) {
				alert("You can select only days from tommorow ");
		}
	}

	function validate_inp(){
		var Start_time = User_inp_date_form.Start_time.value;
		var End_time = User_inp_date_form.End_time.value;
		var St = parseInt(Start_time);
		var Et = parseInt(End_time);

		if(St > Et ){
			alert("Enter Start time lesser than end time ")
			return false;
		}
		else if(St == Et){
			alert("Enter Start time lesser than end time ")
			return false;	
		}
		


	}


</script>


<!DOCTYPE html>
<html>
<head>
	<title>CHOOSE DATES</title>
	<link rel="stylesheet"  href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>


<div class="container1"><br><br><br><br><br>
		<center><h1 class="heading">ENTER DETAILS OF DAY    </h1></center>
		<div class="container2">

<?php  
include("connection.php");
session_start();
$Aud_ID = $_GET['Aud_ID'];
$User_ID =  $_SESSION['User_id']; 
#echo  "Aud ID = ",$Aud_ID,"<br>";
#echo  "User ID = ",$User_ID;


if($_SESSION['no_of_pages'] ==0 ){
		 echo "<script>  window.location.href = 'Total_cost.php' </script>";
	}

?>


<form name="User_inp_date_form" action="" method="POST"  onsubmit="return validate_inp()">
	<input class="in1" DATE id="datepicker" onchange="checkDate()"  name="user_date"  type="date" required="" ><br>
	<input class="in1" type="number" name="Start_time" placeholder="Enter Starting time in 24HR"><br>
	<input class="in1" type="number" name="End_time" placeholder="Enter Ending time in 24HR"><br>
	<input class="btn1" type="submit" name="Date_sub" value="GO"><br>
</form>



<?php  

if (isset($_POST['Date_sub'])) {
	
	$User_date = $_POST['user_date'];
	$st = $_POST['Start_time'];
	$et = $_POST['End_time'];

	$sql = "select * from date_table where Aud_ID = '$Aud_ID' and Date = '$User_date'";
    $result = mysqli_query($conn,$sql);


    if(mysqli_num_rows($result)>0){
    	while($row = mysqli_fetch_assoc($result)) {
    		$Collected_date = $row['Date'];
    		$dst = $row['Start_time'];
    		$det = $row['End_time'];
        	   
           	if(($st>=$dst && $st<=$det) || ($et>=$dst && $et<=$det) || ($st<$dst && $et>$det )){
           		$message = "This date or time is not available please check availability in the view page ";
				echo "<script> alert('$message');</script>";
				header("Refresh:0");
				exit(0);	
           	}
           	
		}
		$sql = "insert into aud_temp (Aud_ID,User_id,Date,Start_time,End_time) values('$Aud_ID','$User_ID','$User_date','$st','$et')";

			if(mysqli_query($conn,$sql)){
				$message = "Date entered successfully";
				echo "<script> alert('$message');</script>";		
			}
			else {
			echo "Error inserting";
	 		}
	 		$_SESSION['no_of_pages'] = $_SESSION['no_of_pages'] - 1;
			if($_SESSION['no_of_pages'] ==0 ){
		 		echo "<script>  window.location.href = 'Total_cost.php?Aud_ID=$Aud_ID' </script>";
			}

	}
		else{
			$sql = "insert into aud_temp (Aud_ID,User_id,Date,Start_time,End_time) values('$Aud_ID','$User_ID','$User_date','$st','$et')";

			if(mysqli_query($conn,$sql)){
				$message = "Date entered successfully";
				echo "<script> alert('$message');</script>";		
			}
			else {
			echo "Error inserting";
	 		}


			$_SESSION['no_of_pages'] = $_SESSION['no_of_pages'] - 1;
			if($_SESSION['no_of_pages'] ==0 ){
		 		 echo "<script>  window.location.href = 'Total_cost.php?Aud_ID=$Aud_ID' </script>";
			}
			}




} #Submit_button
print "<center>";
echo "REMAINING DAYS TO ENTER ",$_SESSION['no_of_pages'];
print "</center>";
?>


		</div>
	</div>





</body>
</html>
