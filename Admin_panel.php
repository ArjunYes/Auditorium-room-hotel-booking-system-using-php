 


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
	padding: 2%;
	width: 20%; 
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







<?php

#if($_SESSION['login'] != true || $_SESSION['level'] != 'l2'){
#    echo "<script> alert('Please login to continue'); window.location.href = 'Admin_login.php' </script>";
#}



?>

<style type="text/css">

.paragraphx{
    font-family: 'Abel', sans-serif,bold;
    margin-left: 77%;
    font-size: 20px;
    color: #eeeeee;
}

.btnlogout{
    font-weight: bolder;
    width: 100%; max-width: 150px;
    height: 25%; max-height: 50px;
    border: 0;
    font-family: 'Abel', sans-serif,bold;
    margin-left: 78%;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    font-size: 15px;
    background-color: red;
     color: white;
}

.btnlogout:hover{
    background-color: blue;
    color: white;
}


</style>


<!DOCTYPE html>
<html>
<head>
	<title>Admin panel</title>
	<link rel="stylesheet"  href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>


	<div class="container1">
		<br>

        <button class="btnlogout" onclick="window.location.href='logout.php'">LOGOUT</button>
        <b><h1  class="paragraphx">Welcome Administrator  </h1><b>

		<center><h1 class="heading">ADMINISTRATOR PANEL</h1></center>
		<div class="container2">
		
			<button onclick="window.location.href='Auditorium_add.php'" class="btn1" >ADD AUDITORIUM</button>
            <button onclick="window.location.href='Auditorium_delete.php'" class="btn1" >DELETE AUDITORIUM</button>
			<button onclick="window.location.href='Delete_users.php'" class="btn1" >DELETE USERS</button>
            <button  onclick="window.location.href='All_auditorium_history.php'" class="btn1">ALL AUDITORIUM TRANSACTION HISTORY</button>
			
			

		</div>
	</div>






</body>
</html>



			






