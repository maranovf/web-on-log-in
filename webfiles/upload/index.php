<?php
include ("../menu/index.php");
include ("../security/session.php");

session_start();
?>

<!DOCTYPE html>
<html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../CSS/file_upload.css">
        <title>Upload file</title>
    </head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select file to upload:
  <input type="file" name="fileToUpload" id="fileToUpload"><br />
  <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>