<?php

@header('P3P: CP="NOI CURa ADMa DEVa TAIa OUR DELa BUS IND PHY ONL UNI COM NAV INT DEM PRE"');

@ini_set("session.use_trans_sid", 0);
@ini_set("url_rewriter.tags","");
@ini_set("session.cache_expire", 1440);
@ini_set("session.gc_maxlifetime", 86400);
@ini_set("session.cookie_domain", "");

session_cache_limiter('private, must-revalidate');
session_set_cookie_params(0, "/");

@session_start();

define('CHARSET', 'UTF-8');
define('ADMIN', 'adm');
define('ADMIN_PATH', $_SERVER['DOCUMENT_ROOT'].'/'.ADMIN);

include $_SERVER['DOCUMENT_ROOT']."/comm/dbcon.php";
$pdo = new PDO("mysql:host={$dbHost};dbname={$dbName};charset={$dbChar}", $dbUser, $dbPass);

function sql_filter($str)
{
  $str = addslashes($str);
  $search = array("--", "#", ";");
  $replace = array("\--", "\#", "\;");
  $str = str_replace($search, $replace, $str);

  return $str;

}

function errorMsg($msg, $go_url=""){

    echo "<meta http-equiv='Content-Type' c&#111;&#110;tent='text/html; charset=utf-8'>";
	if($go_url == "") {
		echo "<script>alert(\"$msg\");history.go(-1);</script>";
		exit;
	} else {
		echo "<script>alert(\"$msg\");document.location=\"$go_url\";</script>";
		exit;
	}


}

?>