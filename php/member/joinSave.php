<?php
include_once $_SERVER['DOCUMENT_ROOT']."/comm/common.php";

$pos = strpos($_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST']);
if($pos === false)	errorMsg("잘못된 경로 입니다.");

if($_POST['mode']=='signup'){
	
	$name		= sql_filter($_POST['name']);
	$email		= sql_filter($_POST['email']);
	$password	= sql_filter($_POST['password']);

	if(!empty($name) && !empty($email) && !empty($password) ){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			
			$statement = $pdo->prepare("SELECT idx FROM app_member WHERE email = :email ");
			$statement->bindValue(":email", $email);
			$statement->execute();

			if($statement->fetchColumn() > 0){
				echo "이미 가입된 이메일(".$email.") 정보입니다.";
			}else{

				$unique_id = rand(time(), 100000000);
				$hashed = base64_encode(hash('sha256',$password, true));

								
				$data = [
					 'unique_id' => $unique_id,
					 'name'		 => $name,
					 'email'	 => $email,
					'password'   => $hashed,
					'img'		=> $new_img_name,
					'wdate'		=> date('Y-m-d H:i:s')
				];

				$insert_query = "INSERT INTO app_member (unique_id,name,email,password,img,wdate) VALUES (:unique_id,:name,:email,:password,:img,:wdate)";
				$statement = $pdo->prepare($insert_query);
				$statement->execute($data);
				echo "success";
			}
		}else{
			echo "이메일 형식이 올바르지 않습니다.";
		}

	}else{
		echo "필수값을 모두 입력해주세요.";
	}
}
?>