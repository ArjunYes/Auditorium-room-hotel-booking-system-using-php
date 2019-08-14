


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
    color: white;
    font-family: 'Abel', sans-serif,bold;
    padding: 2%;

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

<!DOCTYPE html>
<html>
<head>
	<title>TOTAL COST CALCULATION</title>
	<link rel="stylesheet"  href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>

<div class="container1"><br><br><br><br><br>
		<center><h1 class="heading"> THE DETAILS OF CURRENT TRANSACTION </h1></center>
		<div class="container2">


<?php  
	include("connection.php");
	session_start();
	
	$User_ID =  $_SESSION['User_id']; 
	$Aud_ID = $_GET['Aud_ID'];
	#echo  "User ID = ",$User_ID,"<br>";
	echo  "Aud ID = ",$Aud_ID,"<br>";

	$Total_time = 0;

	$sql = "select * from aud_temp where Aud_ID = '$Aud_ID' and User_id = '$User_ID'";
    $result = mysqli_query($conn,$sql);
    #echo "Records found to calculate = ",mysqli_num_rows($result),"<br>";

    if(mysqli_num_rows($result)>0){
    	while($row = mysqli_fetch_assoc($result)) {

            $Start_time = $row['Start_time'];
            $End_time = $row['End_time'];
            $Time_diffrence = $End_time - $Start_time;
            $Total_time = $Total_time + $Time_diffrence;
           
            }
		}else{
			echo "Error";
		}

	$sql2 = "select * from auditorium_details where Aud_ID = '$Aud_ID'";
	$result = mysqli_query($conn,$sql2);
	#echo "Rates found = ",mysqli_num_rows($result),"<br>";

	if(mysqli_num_rows($result)>0){
    	while($row = mysqli_fetch_assoc($result)) {

            $Aud_rate = $row['Aud_rate'];
     
     	}

 }
	echo "Total no of hours that will be charged = ",$Total_time,"<br>";
	echo "Rate per hour is ",$Aud_rate,"<br>";
	echo "Total Amount payable = ",$Total_time*$Aud_rate,"<br>";
	$Total_cost = $Total_time*$Aud_rate;
	$_SESSION['Total_cost'] = $Total_cost;

?>



<br>



<button class = "btn1" onclick=" window.location.href = 'Billing.php?Aud_ID= <?php echo $Aud_ID?> ' "  > BOOK AND PAY <?php  echo $Total_cost   ?> NOW</button>


</div>
</div>


</body>
</html>