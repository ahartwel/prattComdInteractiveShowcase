<?php

require_once("config.php");
$connection = new MongoClient( "mongodb://<username>:<password>@ds055699.mongolab.com:55699/interactiveandmotion" );

$dbName = "interactiveandmotion";

$db = $connection->$dbName;
$GLOBALS['workDB'] = $db->work2015;


function findWork($options = array()) {


    return $GLOBALS['workDB']->find($options);

}



?>