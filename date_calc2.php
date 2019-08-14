


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


<!DOCTYPE html>
<html>
<head>
	<title>HOME PAGE</title>
	<link rel="stylesheet"  href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>

    <?php
    session_start();
    $Total_time = 0;
    $_SESSION['Day_no'] = $_SESSION['Day_no'] +1;
    $Day_no = $_SESSION['Day_no'];
    ?>


	<div class="container1"><br><br><br><br><br>
		<center><h1 class="heading">ENTER DETAILS OF DAY  <?php  echo $Day_no; ?>  </h1></center>
		<div class="container2">

			<?php


    include("connection.php");


    $Aud_ID = $_SESSION['Aud_ID'];
    $User_ID = $_SESSION['User_id'];
    $no_of_days =  $_SESSION['no_of_days'];

    if($_SESSION['no_of_days']!=0){

    ?>

    <form name="date_cal" action="" method="POST" onsubmit="return validate()">
    <input placeholder='DATE' class='in1' type='date' name='date' required='' >
    <input placeholder='STARTING TIME' class='in1' type='number' name='Start_time' required=''>
    <input placeholder='ENDING TIME' class='in1' type='number' name='End_time' required=''>
    <input class='btn1' type='submit' name='sub2'>
    </form>

    <?php

    if (isset($_POST['sub2'])) {
        $temp = $_POST['date'];
        $Start_time = $_POST['Start_time'];
        $End_time = $_POST['End_time'];

        $sql = "insert into aud_temp (Aud_ID,User_id,Date,Start_time,End_time) values('$Aud_ID','$User_ID','$temp','$Start_time','$End_time')";

        if(mysqli_query($conn,$sql)){


                $_SESSION['no_of_days'] = $_SESSION['no_of_days']-1;

                if($_SESSION['no_of_days']==0){

                    $sql2 = "select * from aud_temp where Aud_ID = '$Aud_ID' and User_ID = '$Aud_ID'";

                             $result = mysqli_query($conn,$sql2);

                                if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_assoc($result)) {

                                    $Start_time = $row['Start_time'];
                                    $End_time = $row['End_time'];
                                    $Temp = $End_time -  $Start_time;
                                    $Total_time = $Total_time + $Temp;
                                    $_SESSION['Total_time'] =$Total_time;
                                     }


}


                    echo "<script>  window.location.href = 'User_result.php' </script>";
                    exit();
                }

                echo "RECORD INSERTED";
                $message = "Enter next date!";
                echo "<script> alert('$message'); </script>";

            }else{
            echo "Error inserting";
            }



    }

}



    ?>

		</div>
	</div>






</body>
</html>
