<?php
/*
Simple Config class for server files
uses : 
import class like reqiure('config.php');
then,
Config::$DB_SERVER
*/
class Config {
    static $DB_SERVER    = 'http://localhost/phpproject/market/';
    static $GCM_ID    = '';
    static $BANK_ID    = '';
}
?>