<?php

/*
  //000webhost
  $hostname = "mysql5.000webhost.com";
  $database = "a9743288_store";
  $user = "a9743288_store";
  $password = "tej9860637720";
 */


  //hostinger
 /*
  $hostname = "mysql.hostinger.in";
  $database = "u790027247_store";
  $user = "u790027247_store";
  $password = "9860637720";
 */

// freehostingnoads
/*$user = "u230326583_onest";
$password = "9860637720";
$database = "u230326583_onest";
$hostname = "mysql.freehostingnoads.net";*/


$user = "root";
$password = "";
$database = "tej";
$hostname = "localhost";


mysql_connect ( $hostname, $user, $password );
@mysql_select_db ( $database ) or die ( "Unable to select database" );
?>