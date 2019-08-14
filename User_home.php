     


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





    <?php 
    session_start();
    $User_ID =  $_SESSION['User_id'];  
    include("connection.php");

    $sql = "select * from user_details where User_ID = '$User_ID'";
    $result =   mysqli_query($conn,$sql);
            
     if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)) {

        $First_name = $row['First_name'];
        $Last_name = $row['Last_name'];
        }
     }
     else{
            echo "No database available";
       }




    if($_SESSION['login'] != true || $_SESSION['level'] != 'l2'){
        echo "<script> alert('Please login to continue'); window.location.href = 'User_login.php' </script>";
    }



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
        background: #FFFFFF;
        width: 100%; max-width: 150px;
        height: 25%; max-height: 50px;
        border: 0;
        font-family: 'Abel', sans-serif,bold;
        margin-left: 78%;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        border-bottom-left-radius: 3px;
        border-bottom-right-radius: 3px;
        color: red;
        font-size: 15px;
    }

    .btnlogout:hover{
        background-color: red;
        color: white;
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


    	<div class="container1">

            <button class="btnlogout" onclick="window.location.href='logout.php'">LOGOUT</button>
            <b><h1  class="paragraphx">Welcome <?php echo $First_name," ",$Last_name; ?>  </h1><b>

    		<center><h1 class="heading">HOME PAGE</h1></center>
    		<div class="container2">
    		
    			<button onclick="window.location.href='Aud_view.php'" class="btn1" >VIEW ALL AUDITORIUM DETAILS</button>
    			<button onclick="window.location.href='Aud_book.php'" class="btn1" >BOOK AUDITORIUMS</button>
    			<button onclick="window.location.href='View_bills_reciepts.php'" class="btn1" >ORDER HISTORY AND TRANSACTIONS</button>
    			<button onclick="window.location.href='Search.php'" class="btn1" >SEARCH AUDITORIUM BY CRITERIANS</button>

    		</div>
    	</div>






    </body>
    </html>



    			





