<?php 
require 'class-upload.php';

define('BASE_PATH', dirname(__file__) . '/');
define('UP_PATH' , BASE_PATH.'upload/' );

$up=new upload( array( 'image/jpeg' => 30000000 , 'image/gif' => 800000 , 'image/png' => 400000 ) , UP_PATH ) ;
$up->uploadfile($_FILES['file']); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Class to upload files safely - wallfa.com</title>
</head>
<body>
<h1>i love php - develop by hasan movahed from iran</h1>
<form enctype="multipart/form-data" action="index.php" method="POST">
<input name="file" type="file" /> <br />
<input type="submit" value="Upload File" />
</form>
</body>
</html>