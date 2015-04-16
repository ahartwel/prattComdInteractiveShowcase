<?php
require_once("connection.php");
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);


$workDB->save($_POST);
$toMongo = json_encode($_POST);



foreach ($_FILES as $file) {
    print_r($file);
    $uploaddir = dirname(__FILE__) . '/studentFiles/' . $_POST['name'] . "/";
    $uploadfile = $uploaddir . $file['name'];
    if (!file_exists($uploaddir)) {
        mkdir($uploadfile, 0775, true);
    }
    move_uploaded_file($file['tmp_name'], $uploadfile);
    $zip = new ZipArchive;
    $res = $zip->open($uploadfile);
    if ($res === TRUE) {
      $zip->extractTo($uploaddir);
      $zip->close();
      echo 'woot!';
    } else {
      echo 'doh!';
    }
}

?>