<?php
include_once $_SERVER['DOCUMENT_ROOT']."/include/header.php"; 
if(isset($_SESSION['wiz_session']['id'])){
    header("location: /chat/list.php");
	exit;
}

?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>채팅앱 회원가입</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
		<input type="hidden" name="mode" value="signup">
		<div class="error-text"></div>
        <div class="field input">
          <label>이름</label>
          <input type="text" name="name" placeholder="이름을 입력해주세요." required>
        </div>

        <div class="field input">
          <label>이메일</label>
          <input type="text" name="email" placeholder="이메일을 입력해주세요." required>
        </div>
        <div class="field input">
          <label>비밀번호</label>
          <input type="password" name="password" placeholder="비밀번호를 입력해주세요." required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="회원가입">
        </div>
      </form>
      <div class="link">이미 가입하셨습니까? <a href="/index.php">[로그인 하러가기]</a></div>
    </section>
  </div>

  <script src="/js/join.js?ver=<?=rand(1,9999)?>"></script>
	<!--
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>
	-->
</body>