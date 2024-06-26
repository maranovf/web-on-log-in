<?php
include ("../security/data_connection.php");
include ("../menu/index.php");
include ("../security/session.php");

$target_dir = "../downloads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$file = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($FileType != "jpg" && $FileType != "png" && $FileType != "docx"
&& $FileType != "zip" ) {
  echo "Sorry, only JPG, PNG, DOCX & ZIP files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

    $sql_upload="insert into data(file,path) values('".$file."', '".$target_file."')";
    $upload_final=mysqli_query($db_upload, $sql_upload);
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>