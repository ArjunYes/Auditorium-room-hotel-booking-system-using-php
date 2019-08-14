


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
    font-family: 'Abel', sans-serif;
    color: #eeeeee;
    font-weight: bold;
    padding: 3%;
    float: left;
	width: 23%; 
    left: 0%;
    right: 0%;
    margin-left: auto;
    margin-right: auto;
    border-radius: 10px;
    background: rgba(245, 245, 220, 0.32);
    margin-right: 4%;
    margin-top: 2%;
    min-height: 300px;
   
}


.btn1{
    background: #ff1919;
    width: 90%;
    border: 0;
    font-family: 'Abel', sans-serif,bold;
    font-size: 17px;
    color: #FFFFFF;
    padding: 10px;
    margin-top: 5px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;


}

.btn1:hover{
	background: #6A1B9A;
	
}







</style>




<!DOCTYPE html>
<html>
<head>
	<title>HOME PAGE</title>
    <link rel="stylesheet"  href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>


	<div class="container">
		<center><h1 class="heading">AUDITORIUM DETAILS</h1></center>

		
		<?php
		include("connection.php");
		session_start();


            $sql = "select * from auditorium_details ";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0){

            	
            	
                 while($row = mysqli_fetch_assoc($result)) {
                    print "<div class='container2'>";
                    
                    echo "Auditorium no : "," ",$row["Aud_ID"],"<br>";
                    echo "Name: "," ",$row["Aud_name"],"<br>";
                    echo "Seat capacity : "," ",$row["Aud_capacity"],"<br>";
                    echo "Rate per hour : "," ",$row["Aud_rate"],"/-","<br>";
                    echo "About auditorium :- "," <br>",$row["Aud_about"],"<br>";
        			
                    $Aud_ID = $row['Aud_ID'];
                    $Aud_name = $row['Aud_name'];
                    echo "<br>";
                    #echo "<center> <button class = 'btn1' onclick='window.location.href = 'datecalc.php?Aud_ID=$Aud_ID''>Check Available dates </button> </center>  ";
                    #echo "<center> <button class = 'btn1' onclick='window.location.href = 'datecalc.php';''>BOOK AUDITORIUM $Aud_name </button> </center>  ";

                    ?>

                    <button class="btn1" onclick="window.location.href='No_of_days.php?Aud_ID=<?php echo $Aud_ID ?>'" class="btn" >Book <?php echo  $Aud_name ?> now -> </button>
                    <button class="btn1" onclick="window.location.href='date_inc2.php?Aud_ID=<?php echo $Aud_ID ?>'" class="btn" >View availavle dates</button>


                    <?php
        			#echo "<a href='datecalc.php?Aud_ID=$Aud_ID'> Book Audiorium  $Aud_ID  </a>";


					print "</div>";
				

                 }
			






            }else{
                echo "No database available";
            }




        ?>




	</div>






</body>
</html>



			





