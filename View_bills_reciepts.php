 <style>

    body{
    background: #06beb6;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #48b1bf, #06beb6);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #48b1bf, #06beb6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


    }

    .containerx{
    	color: white;
    	padding: 3%;
    	width: 45%;
    	height: 9%;
    	border-radius: 10px;
    	background: rgba(245, 245, 220, 0.32);
    	margin: auto;
    	margin-top: 1%;
    	font-family: 'Abel', sans-serif;

    }


    *{
        margin: 0;
        padding: 0;
    }

    .container{
        padding: 2%;
        
        margin: auto;
        width: 80%;
        margin-top: 5%;
    }

    .butcontainer{
        padding: 2%;
        margin: auto;
        width: 50%;
    }

    .new_heading{
        font-family: 'Abel', sans-serif,bold;
        color: #FFFFFF;
    }

    .btn1{
        background: #ff1919;
        width: 85%;
        border: 0;
        font-family: 'Abel', sans-serif,bold;
        font-size: 17px;
        color: #FFFFFF;
        padding: 13px;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        border-bottom-left-radius: 3px;
        border-bottom-right-radius: 3px;
        
        
    }

    .btn1:hover{
        background: #6A1B9A;
        
    }

    table {  
          margin:auto;
          margin-top: 50px;
        color: #333;
        font-family: 'Abel', sans-serif;
        font-weight: bold;
        width: 640px; 
        border-collapse: 
        collapse; border-spacing: 0; 
    }

    td, th {  
        
        border: 1px solid transparent; /* No more visible border */
        height: 40px; 
        width: 200px;
        transition: all 0.3s;  /* Simple transition for hover effect */
    }

    th {  
        background: #DFDFDF;  /* Darken header a bit */
        font-weight: bold;
    }

    td {  
        background: #FAFAFA;
        text-align: center;
    }

    /* Cells in even rows (2,4,6...) are one color */        
    tr:nth-child(even) td { background: #F1F1F1; }   

    /* Cells in odd rows (1,3,5...) are another (excludes header cells)  */        
    tr:nth-child(odd) td { background: #FEFEFE; }  

    tr td:hover { background: #666; color: #FFF; }  

    .in1{
        margin: 2%;
        outline: 0;
        background: #f2f2f2;
        font-family: 'Abel', sans-serif;
        width: 40%;
        border: 0;
        padding: 13px;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        border-bottom-left-radius: 3px;
        border-bottom-right-radius: 3px;
        font-size: 14px;

    }




    </style>

<!DOCTYPE html>
<html>
<head>
	<title>VIEW TRANSACTIONS</title>
	<link rel="stylesheet"  href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>

<div class="container1"><br>
		<center><h1 class="heading">USER TRANSACTION HISTORY</h1></center>
		<div class="container2">


	<?php
	include("connection.php");
	session_start();
	$User_ID =  $_SESSION['User_id'];
	
	  echo "<table >";
    echo "<tr>";
    	echo "<th> AUDITORIUM NO  </th>";
    	echo "<th> DATES  </th>";
    	echo "<th> START TIME  </th>";
    	echo "<th> END TIME   </th>";
    echo "</tr>";




	$sql = "select * from transactions where User_ID = '$User_ID'";
	$result = mysqli_query($conn,$sql);
	$Transaction_ID = array();
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)) {

			echo "<div class = 'containerx'>";

			$Transaction_temp = $row['Transaction_ID'];
			$Transaction_ID[] = $row['Transaction_ID'];
			$Aud_ID = $row['Aud_ID'];
			$Total_cost = $row['Total_cost'];


			echo "Auditorium ID :  ",$Aud_ID,"<br>";
			echo "Total amount in rupees ",$Total_cost,"<br>";
			echo "Transaction ID ",$Transaction_temp,"<br>";
			echo "User ID ",$User_ID;
			echo "</div>";

		
		}
	}
	else{
		echo "No database available";
	}

	

	foreach ($Transaction_ID as $key ) {
		

	$sql = "select * from date_table where Transaction_ID = '$key' order by Aud_ID";
	$result = mysqli_query($conn,$sql);
	$Transaction_ID = array();
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)) {

			
			$Date = $row['Date'];
			$Start_time = $row['Start_time'];
			$End_time = $row['End_time'];
			$Aud_ID = $row['Aud_ID'];
			
		echo "<tr>";
				echo "<td> $Aud_ID  </td>";
    			echo "<td> $Date  </td>";
    			echo "<td> $Start_time  </td>";
    			echo "<td> $End_time  </td>";
    			

    		echo "</tr>";

			

		
		}
	}
	else{
		echo "No database available";
	}




	}


















	?>

</div>
</div>



</body>
</html>