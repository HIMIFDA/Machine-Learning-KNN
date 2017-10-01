<?php

include 'config/connection.php';

$nim	= $_POST['nim'];
$status = $_POST['status'];



$updateStatus	= "UPDATE datasets SET beasiswa = '$status' WHERE nim = '$nim' ";
$query			= mysqli_query($conn,$updateStatus);


header('location:index.php?page=getDetail&nim='.$nim.'&&succses');



?>



