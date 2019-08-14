
    <style>

    body{
    background: #06beb6;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #48b1bf, #06beb6);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #48b1bf, #06beb6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


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
        margin-top: 3%; 
        outline: 0;
        background: #f2f2f2;
        font-family: 'Abel', sans-serif;
        width: 90%;
        border: 0;
        padding: 13px;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        border-bottom-left-radius: 3px;
        border-bottom-right-radius: 3px;
        font-size: 14px;
        margin-left: 5%;

    }




    </style>

    <!DOCTYPE html>
    <html>
    <head>
    	<title>ITEM SEARCH</title>
        <link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
        
    </head>
    <body>
    	<div class="container">
            <center><h1 class= "new_heading">SEARCH BY AUDITORIUM NAME</h1></center>

    	<form action="Search_aud_name.php" method="POST">
    	<input class="in1" type="text" name="search_text" id="search_text" placeholder="Enter auditorium name : ">
    	<input class="btn1" type="submit" name="submit" value="Search Auditorium">
    	</form>


    <?php 
    session_start();
   
    include("connection.php");

    if(isset($_POST['submit'])){

    echo "<table >";
    echo "<tr>";
    	echo "<th> AUDITORIUM NO  </th>";
    	echo "<th> AUDITORIUM NAME  </th>";
    	echo "<th> CAPACITY  </th>";
    	echo "<th> RATE PER HOUR   </th>";
    echo "</tr>";

    	$searchq = $_POST['search_text'];
    	$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);	
        $sql ="select * from auditorium_details where Aud_name LIKE '%$searchq%'";
    	$result = mysqli_query($conn,$sql);





    if(mysqli_num_rows($result)>0){

    	while($row = mysqli_fetch_assoc($result)) {

    		$Aud_ID = $row['Aud_ID'];
    		$Aud_name =$row['Aud_name'];
    		$Aud_capacity = $row['Aud_capacity'];
    		$Aud_rate = $row['Aud_rate'];





    		echo "<tr>";
    			echo "<td> $Aud_ID  </td>";
    			echo "<td> $Aud_name  </td>";
    			echo "<td> $Aud_capacity  </td>";
    			echo "<td> $Aud_rate  </td>";

    		echo "</tr>";



    		

    	}

    }



    echo "</table>";
    }

    ?>