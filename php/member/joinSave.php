<?php
include_once $_SERVER['DOCUMENT_ROOT']."/comm/common.php";

$pos = strpos($_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST']);
if($pos === false)	errorMsg("잘못된 경로 입니다.");

if($_POST['mode']=='signup'){
	
	$name		= sql_filter($_POST['name']);
	$email		= sql_filter($_POST['email']);
	$password	= sql_filter($_POST['password']);

	if(!empty($name) && !empty($email) && !empty($password) ){
		

	}else{

		echo "필수값을 모두 입력해주세요.";
	}
}
?>