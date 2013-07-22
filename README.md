upload
======

php upload safely class , 

...php
$format= array( 'image/jpeg' => 30000000 , 'image/gif' => 800000 , 'image/png' => 400000 ) ; //all format allow upload

$up=new upload( $format , UP_PATH ) ;
$up->uploadfile($_FILES['file']);
...

//thank you , for read bed typing english









