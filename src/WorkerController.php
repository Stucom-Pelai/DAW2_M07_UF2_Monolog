<?php
// load dependencies
require './vendor/autoload.php';
// create log
$log = new Monolog\Logger("LogWorkerDB");
// define logs location
$log->pushHandler(new Monolog\Handler\StreamHandler("logs/WorkerDB.log", Monolog\Logger::ERROR));

//ddbb connection
$db = parse_ini_file("conf/miConf.ini");
$mysqli = new mysqli($db["host"], $db["user"], $db["pwd"], $db["db_name"]);

// CRUD operations
if ($mysqli->connect_errno) {
    $log->error("Error connection db: " . $mysqli->connect_error);
} else {
    // CRUD functions
    $log->info("Connection successfully");

    // Create operation
    $sql_sentence = "INSERT INTO worker(dni,name_w,surname_w,salary,tlf) 
        VALUES('144a','juan','gonzález',20000,'1331221')";

    $result = $mysqli->query($sql_sentence);
    $log->info("Record inserted successfully");

    if ($result) {
        $log->info("Record inserted successfully");
    } else {
        $log->error("Error inserting a record");
    }
}
?>