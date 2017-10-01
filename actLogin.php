<?php
include 'config/connection.php';	

$user=$_POST['user'];
$pass=md5($_POST['password']);

$query=mysqli_query($conn,"SELECT * FROM login WHERE username='$user' AND password='$pass' ") 
	   or die (mysqli_error($conn));
$cek=mysqli_num_rows($query);
$row=mysqli_fetch_array($query);
$id = $row['id'];
$TUser=$row['username'];
$nama=$row['nama_dosen'];
$level=$row['level'];


if($cek > 0){

	session_start();
	$_SESSION['id']=$id;
	$_SESSION['username']=$TUser;
	$_SESSION['nama_dosen']=$nama;
	$_SESSION['level']=$level;

	//redirect page
	header('Location:index.php');
		
		
			
}else{
	?>
    
      <div class="alert alert-danger alert-dismissable">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <i class="#"></i><b>&nbsp;Username dan Password Salah</center></b>.
      </div>
	<?php
}
?>