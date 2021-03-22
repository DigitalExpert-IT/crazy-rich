<?php

// set default timezone asia/jakarta
date_default_timezone_set("Asia/Jakarta");
$time = time();
$time_now = date("Y-m-d H:i:s", $time);

$pid=$_POST['id_tf'];
$ekstensi_diperbolehkan	= array('png','jpg');
$ekstensi_tidakboleh= array('php');
			$nama = $_FILES['buktitf']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['buktitf']['size'];
			$file_tmp = $_FILES['buktitf']['tmp_name'];	
			
			
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true xor in_array('php', $x) === true) {
				if($ukuran < 104407000 && $ukuran !=0){	
				$lokasi='bukti/';	
				$lokasifile=$lokasi.$pid.'.'.$ekstensi;	
				$namafilepic=$pid.'.'.$ekstensi;
				$foto=	move_uploaded_file($file_tmp,$lokasifile);
				
					
				}else  {
					echo "<script>alert('UKURAN FILE TERLALU BESAR KECILKAN SETTING KAMERA ANDA ATAU SCREENSHOOT HASIL FOTO'); window.location = '?mod=network&cmd=index';</script>";
				}
			}else{
				echo "<script>alert('EKSTENSI FOTO HANYA PNG DAN JPG'); window.location = '?mod=network&cmd=index';</script>";
				
			}
		

$sql2 = "INSERT INTO bukti_tf set user_id_temp='$pid',reff_id='$_SESSION[user_id]',nama_rek='$_POST[nama]',paket='$_POST[paket]',file_foto='$namafilepic',date_upload='$time_now'";
echo $sql2; die();





if(mysqli_query($sql2)){
  echo "<script>alert('FILE BERHASIL DI UPLOAD '); window.location = '?mod=network&cmd=index';</script>";
}else{
 echo "<script>alert('FILE GAGAL HUBUNGI ADMIN'); window.location = '../../index.php?mod=create&cmd=index';</script>";
}
