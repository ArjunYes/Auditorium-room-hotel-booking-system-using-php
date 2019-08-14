


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
	<title>SELECT AUDITORIUM</title>
	<link rel="stylesheet"  href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>


	<div class="container1"><br><br><br><br><br>
		<center><h1 class="heading">DELETE AUDITORIUM</h1></center>
		<div class="container2">
		
		
			<br>
		<form method="POST" >

        
        <select class="in1" name="selectbox1" required="">
            <option  value="">Select Item </option>
                <?php
                include("connection.php");
                $sql = "select * from auditorium_details";


                $result = mysqli_query($conn,$sql);
              
                while ($row = mysqli_fetch_assoc($result)){
                    $Aud_ID =  $row['Aud_ID'];
                    $Aud_name = $row['Aud_name'];
                    $Aud_capacity = $row['Aud_capacity'];
                ?>
                <option value="<?php echo $Aud_ID ?>"><?php echo $Aud_ID," - ",$Aud_name," -Capacity(",$Aud_capacity,")" ?></option>
                <?php
            }
            ?>
        </select>
        
        <input class="btn1" type="submit" name="sub1" value="DELETE AUDITORIM">

    </form>
		
			<?php
				
				include("connection.php");

				if(isset($_POST['sub1'])){

                    $temp = $_POST["selectbox1"];
    
                        $sql2 = "DELETE FROM auditorium_details WHERE Aud_ID = '$temp'";
                        
                        if(mysqli_query($conn,$sql2)){
                         $message = "Auditorium succesfully deleted";
                         echo "<script> alert('$message'); window.location.href = 'Admin_panel.php' </script>";			
				  		

				}
            }
?>


		</div>
	</div>






</body>
</html>



			





