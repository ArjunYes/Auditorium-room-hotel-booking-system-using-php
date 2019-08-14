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
	width: 23%; 
	;
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
	<title>NO of days</title>
	<link rel="stylesheet"  href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>

	<div class="container1"><br><br><br><br><br>
		<center><h1 class="heading">NO OF DAYS YOU WANT?</h1></center>
		<div class="container2">
			
			
			<br>

			<form action="" method="POST">
				<input class="in1" type="number" name="no_of_pages" placeholder="ENTER NO OF DAYS">
				<input class="btn1" type="submit" name="sub1" value="ENTER NO OF DAYS"><br><br><br>
			</form>


			<?php  

			session_start();
			$User_ID =  $_SESSION['User_id'];  
			$Aud_ID = $_GET['Aud_ID'];
#echo  "Aud ID = ",$Aud_ID,"<br>";
#echo  "User ID = ",$User_ID;


			if(isset($_POST['sub1'])){
				$_SESSION['no_of_pages'] = $_POST['no_of_pages'];
				echo "<script> window.location.href = 'Choose_dates.php?Aud_ID=$Aud_ID' </script>";

			}

			?>




		</div>
	</div>





</body>
</html>