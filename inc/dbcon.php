<?php
error_reporting( E_ALL );
ini_set( "display_errors", 1 ); //에러코드 출력

$hostname="localhost";
$dbuserid="Kuality";
$dbpasswd="1111";
$dbname="kuality";

$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);
if ($mysqli->connect_errno) {
    die('Connect Error: '.$mysqli->connect_error);
}

?>