<?php
define("HOST","localhost");
define("USER","root");
define("PASS","1234");
define("DBNAME","apartment");

@header("Content-type: text/html;charset=utf-8”);
date_default_timezone_set('PRC");
if (!isset($_SESSION)){
    session_start();
}