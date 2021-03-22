<?php
require '../../../../public_html/assets/dbconnect.php';

$id = $_POST['id'];
$img = $_FILES['ori'];

// unlink old image
$query_img = "SELECT nama_gambar FROM banners where autono='$id'";
$process_img = mysqli_query($con, $query_img);
$result_img = mysqli_fetch_array($process_img);

$old_img = $result_img['nama_gambar'];

unlink('../../../assets/images/banners/' . $old_img);

$random = rand();
$extensi = array('png', 'jpg', 'jpeg');

$name_img = $img['name'];
$size_img = $img['size'];
$ext = pathinfo($name_img, PATHINFO_EXTENSION);
if (!in_array($ext, $extensi)) {
  echo 'Ekstensi harus PNG,JPG atau JPEG';
}
if ($size_img < 2458962) {
  $upload = $random . '.' . $ext;
  move_uploaded_file($img['tmp_name'], '../../../assets/images/banners/' . $upload);
  $insert = "UPDATE banners SET nama_gambar='$upload' WHERE autono='$id'";
  $koneksi = mysqli_query($con, $insert);
}
