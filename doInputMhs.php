<?php

include 'config/connection.php';
include 'config/funcGoogleApi.php';


$nim 			= $_POST['nim'];
$nama 			= $_POST['nama'];
$alamat 		= $_POST['alamat'];
$sub 			= substr($nim,0,4);


//distance action
$addressFrom 	= htmlspecialchars($_POST['alamat']);
$addressTo 		= htmlspecialchars("unsada");
$jarak 			= round($distance = getDistance($addressFrom, $addressTo, "K"),1);


$semester 		= $_POST['semester'];
$ipk 			= $_POST['ipk'];
$penghasilan 	= $_POST['penghasilan'];
$jenis 			= $_POST['jenis_kel'];
	if($jk = $_POST['jenis_kel']=='L')
		echo "1";
	elseif ($jk = $_POST['jenis_kel']=='P')
		echo "0";

$beasiswa		= $_POST['beasiswa'];	


$tot = ($jk * $penghasilan * $semester * $ipk) / 4;
	
	if($sub == 2010){
		if($tot > 20){
			echo $res = "0";
		}else{
			echo $res = "1";
		}
	}
	elseif($sub == 2011){
		if($tot > 18){
			echo $res = "0";
		}else{
			echo $res = "1";
		}
	}
	elseif($sub == 2012){
		if($tot > 16){
			echo $res = "0";
		}else{
			echo $res = "1";
		}
	}
	elseif($sub == 2013){
		if($tot > 8.5){
			echo $res = "0";
		}else{
			echo $res = "1";
		}
	}
	elseif($sub == 2014){
		if($tot > 4.5){
			echo $res = "0";
		}else{
			echo $res = "1";
		}
	}
	elseif($sub == 2015){
		if($tot > 2){
			echo $res = "0";
		}else{
			echo $res = "1";
		}
	}
	


$insertMaster = "INSERT INTO master(nim,nama,alamat_rumah,jenis_kelamin,id_penghasilan)
				 VALUES('$nim','$nama','$alamat','$jenis','$penghasilan')";
$queryMaster  = mysqli_query($conn,$insertMaster) or die (mysqli_error($conn));	


$insertDatasets = "INSERT INTO datasets(nim,nama,ipk,semester,id_penghasilan,jarak,jenis_kelamin,beasiswa,d_o)
					VALUES('$nim', '$nama', '$ipk', '$semester', '$penghasilan', '$jarak', '$jenis', '$beasiswa', '$res')";
$queryDatasets  = mysqli_query($conn,$insertDatasets) or die (mysqli_error($conn));		


header('location:index.php?page=formInput&&act');

?>
