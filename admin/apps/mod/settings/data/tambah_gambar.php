<?php
require '../../../../../public_html/assets/dbconnect.php';
$original_banner = $_FILES['ori'];
$more_banner = $_FILES['more_banner'];

if ($more_banner == null) {
  $random = rand();
  $extensi = array('png', 'jpg', 'jpeg');
  $name_img = $original_banner['name'];
  $size_img = $original_banner['size'];
  $ext = pathinfo($name_img, PATHINFO_EXTENSION);
  if (!in_array($ext, $extensi)) {
    echo 'Ekstensi harus PNG,JPG atau JPEG';
  }
  if ($size_img < 2458962) {
    $upload = $random . '.' . $ext;
    move_uploaded_file($original_banner['tmp_name'], '../../../../assets/images/banners/' . $upload);
    $insert = "insert into banners set nama_gambar = '$upload'";
    $koneksi = mysqli_query($con, $insert);
  }
} else {
  // $more_file = $_FILES['gambar_banyak'];
  $count_file = count($more_banner['name']);
  $path = realpath('../../../../assets/images/banners/');
  $extensi = array('png', 'jpg', 'jpeg');

  $random = rand();
  $extensi = array('png', 'jpg', 'jpeg');
  $name_img = $original_banner['name'];
  $size_img = $original_banner['size'];
  $ext = pathinfo($name_img, PATHINFO_EXTENSION);
  if (!in_array($ext, $extensi)) {
    echo 'Ekstensi harus PNG,JPG atau JPEG';
  }

  if ($size_img < 2458962) {
    $upload = $random . '.' . $ext;
    move_uploaded_file($original_banner['tmp_name'], '../../../../assets/images/banners/' . $upload);
    $insert = "insert into banners set nama_gambar = '$upload'";
    $koneksi = mysqli_query($con, $insert);
    if ($koneksi) {
      $arr = json_encode(array('status' => 'error'));
    } else {
      $arr = json_encode(array('status' => 'success'));
    }
  } else {
    $arr = json_encode(array('status' => 'failed'));
  }

  // Loop through each file
  for ($i = 0; $i < $count_file; $i++) {
    // make random string
    $random = rand();

    //Get the temp file path
    $tmpFilePath = $more_banner['tmp_name'][$i];
    $name_file = $more_banner['name'][$i];
    $size_moreBanner = $more_banner['size'][$i];
    $ext_moreBanner = pathinfo($name_file, PATHINFO_EXTENSION);
    if (!in_array($ext_moreBanner, $extensi)) {
      echo 'Ekstensi harus PNG,JPG atau JPEG';
    }

    if ($size_moreBanner < 2458962) {
      $newFileName = $random . "." . $ext_moreBanner;

      //Make sure we have a file path
      if ($tmpFilePath != "") {
        //Setup our new file path
        $newFilePath = $path . '/' . $newFileName;

        //Upload the file into the temp dir
        if (move_uploaded_file($tmpFilePath, $newFilePath)) {

          //Handle other code here
          $insert_file = "insert into banners set nama_gambar = '$newFileName'";
          $query = mysqli_query($con, $insert_file);
          if (!$query) {
            $arr = json_encode(array('status' => 'error'));
          } else {
            $arr = json_encode(array('status' => 'success'));
          }
        }
      }
    } else {
      $arr = json_encode(array('status' => 'failed'));
    }
  }
}
