<?php
include_once $_SERVER['DOCUMENT_ROOT']."/comm/common.php";

$pos = strpos($_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST']);
if($pos === false)	errorMsg("잘못된 경로 입니다.");

if($_POST['mode']=='loginCheck'){
	
	$email		= sql_filter($_POST['email']);
	$password	= sql_filter($_POST['password']);
	
	if(!empty($email) && !empty($password) ){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			
		}else{
			echo "이메일 형식이 올바르지 않습니다.";
		}
	}else{
		echo "필수값을 모두 입력해주세요.";
	}
}
?>