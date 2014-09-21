<?php

error_reporting(E_ALL ^ E_NOTICE);

/* =========== Database Configuraiton ========== */
if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '192.168.43.189') {
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'Sql577358_3';
} else {
    $db_host = '62.149.150.164';
    $db_user = 'Sql577358';
    $db_pass = 'd3251b37';
    $db_name = 'Sql577358_3';
}


/* =========== Website Configuration ========== */

$serverRoot = "http://".$_SERVER['HTTP_HOST']."/mobile/";
$serverLocalRoot = $_SERVER['DOCUMENT_ROOT']."/mobile/";
?>