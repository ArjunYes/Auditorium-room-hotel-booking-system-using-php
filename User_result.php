<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php  
include("connection.php");
session_start();

echo $_SESSION['Total_time'];
$Total_time = $_SESSION['Total_time'];


$Aud_ID = $_SESSION['Aud_ID'];
$User_ID = $_SESSION['User_id'];


$sql = "select * from auditorium_details where Aud_ID = '$Aud_ID'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
	while($rows = mysqli_fetch_assoc($result)){
		$Aud_rate = $rows['Aud_rate'] ;
	}

}

$Total_cost = $Total_time * $Aud_rate;
echo "You have a total of ",$Total_time,"hours";
echo "Total amount payable will be ",$Total_cost;



?>



</body>
</html>