


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
	<title>HOSPITAL ADDING</title>
	<link rel="stylesheet"  href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>

    <?php   
    include("connection.php");

    $sql = "select * from auditorium_details ORDER by Aud_ID DESC LIMIT 1";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)) {
            $last_aud_id = $row['Aud_ID'];
        }

    }else{
        $last_aud_id = 0;
    }

    ?>





	<div class="container1"><br><br><br><br><br>
		<center><h1 class="heading">AUDITORIUM ADDING</h1></center>
		<div class="container2">
		
		
			<br>
		<form action="" method="POST" >
				    <input class="in1" type="number" name="Aud_ID" placeholder="EMPLOYEE ID"  value="<?php echo $last_aud_id+1 ?>" readonly ><br>
    
					<input class="in1" type="text" name="Aud_name" placeholder="AUDITORIUM NAME " required=""><br>
					<input class="in1" type="text" name="Aud_capacity" placeholder="ENTER CAPACITY IN SEATS" required=""><br>
					<input class="in1" type="text" name="Aud_rate" placeholder="RATE PER HOUR" required=""><br>
                    <textarea class="in1" rows="3" cols="21"  name="Aud_about" placeholder="AUDITORIUM DESCRIPTION:"></textarea>  
					<input class="btn1" type="submit" name="btn" value="ADD AUDITORIUM">	
				<br><br>
			</form>
		
			<?php



if(isset($_POST['btn'])){
    $Aud_ID = $_POST['Aud_ID'];
    $Aud_name = $_POST['Aud_name'];
    $Aud_capacity = $_POST['Aud_capacity'];
    $Aud_rate = $_POST['Aud_rate'];
    $Aud_about = $_POST['Aud_about'];
    

    $sql = "insert into auditorium_details (Aud_ID,Aud_name,Aud_capacity,Aud_rate,Aud_about) values('$Aud_ID','$Aud_name','$Aud_capacity','$Aud_rate','$Aud_about')";

    if(mysqli_query($conn,$sql)){
            echo "RECORD INSERTED";
            $message = "Auditorium added!";
            echo "<script> alert('$message'); window.location.href = 'Admin_panel.php' </script>";
            
        }else{
            echo "Error inserting";
        }





}




?>


		</div>
	</div>






</body>
</html>



			





