<?php

$uploadr   =   new Uploadr();
// initialize Uploadr

$uploadr->setDir('uploads/images/');
// set upload path for Uploadr instance

$uploadr->setExtensions(array('jpg','jpeg','png','gif'));
// set allowed extensions for this instance of Uploadr

$uploadr->setMaxSize(.5);
// set ceiling on file size

if ($uploadr->uploadFile('my_file')) {
    echo $uploadr->getUploadName();
} else {
    echo $uploadr->getMessage();
}


?>