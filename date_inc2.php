<style type="text/css">


.box1{
	height: 65px;
	width: 95px;
	background-color: lightgreen;
	float: left;
	margin:2px;
	padding: 1%;
	border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    font-family: 'Abel', sans-serif;
    line-height: 1.1em;
}	

.box1:hover{
	background-color: white;
	color: red;
}

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




<!DOCTYPE html>
<html>
<head>
	<title>CHECK DATES</title>
	<link rel="stylesheet"  href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>
	<br>
<center><h1 class="heading">AVAILABLE DATES FOR NEXT 60 DAYS</h1></center>

<div class="container">

<?php  
$Aud_ID = $_GET['Aud_ID'];
$date   = [];
$days = [];
$period = new DatePeriod(
    new DateTime(), // Start date of the period
    new DateInterval('P1D'), // Define the intervals as Periods of 1 Day
    63 // Apply the interval 6 times on top of the starting date
);


foreach ($period as $day){
    $date[] = $day->format('Y-m-d');
}
foreach ($period as $day){
    $days[] = $day->format('l');
}


foreach ($date as $element) {
 	?>

<div class="box1"> 
	<?php  
		echo $element;
		echo "<br>";


		$date = "$element"; 
		//Convert the date string into a unix timestamp.
		$unixTimestamp = strtotime($date);
		//Get the day of the week using PHP's date function.
		$dayOfWeek = date("l", $unixTimestamp);
		//Print out the day that our date fell on.
		#echo $date . ' fell on a ' . $dayOfWeek;
		echo $dayOfWeek;


		include("connection.php");

		$sql = "select * from date_table where Aud_ID = '$Aud_ID'";
		$result = mysqli_query($conn,$sql);

    	if(mysqli_num_rows($result)>0){

    	while($row = mysqli_fetch_assoc($result)) {
    		$Date = $row['Date'];

    		if($element == $Date){
    			echo "<br>";
    			?>
    		 		<b><font color="red" >Date not available</font></b>
    		 	<?php

    		}

    	}

    }
	?> 
</div>


<?php
}





?>


</div>
</body>
</html>