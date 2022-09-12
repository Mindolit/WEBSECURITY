<!DOCTYPE html>
<?php 
 function duplicate_check(){
	 		$id=$_POST['register_id'];
			$dc_sql="SELECT *FROM blogin WHERE login_id='$id'";
		    $connect=mysqli_connect('localhost','root','0000','testbook');
			$d_query=mysqli_query($connect,$dc_sql);
			$d_result=mysqli_num_rows($d_query);
			if($d_result>0)
				{
				return TRUE;}
			else{
				
				return FALSE;}
		}

?>
<html lang="kr">
  <head>
    <meta charset="utf-8">
    <title>회원가입</title>
	  <?php
	  $register_id=$_POST['register_id'];
	  $register_pw=$_POST['register_pwd'];
	  if (isset($register_id)&&isset($register_pw)){
		if(duplicate_check()==TRUE){
			echo"<script>alert('아이디가 이미 존재합니다. 다른 아이디를 사용해주세요');</script>";
		

		}
		else{
			if ($_POST['register_pwd']==$_POST['register_pwd2'])
			{
				
					
		// 			  비밀번호 일치할 때 
					$connect=mysqli_connect('localhost','root','0000','testbook');
					$sql="INSERT INTO blogin (login_id,login_pw,created) 
					VALUES('{$register_id}','{$register_pw}',NOW())";

					$result=mysqli_query($connect,$sql);
						if($result===false){
							echo "저장하는 도중 에러 발생";
						}
						else {
							// echo "회원가입 성공";
							// echo "<a href='https://colony-team-ebmke.run.goorm.io/Colony_team3/welcome.html'>돌아가기</a>";
							header( 'Location: /welcome.html' );
							// https://colony-team-ebmke.run.goorm.io/welcome.html
						}

			}		  

						
			else{
			echo "비밀번호 오류";
			echo "<script>alert('비밀번호가 다릅니다.다시입력해주세요');</script>";
				
			}
		}
	  }
	  
	  ?>
  </head>
  <body>
    <form  method="post">
	<script>alert("경고:아이디와 비밀번호는 개발자의 기술적 한계로 \n데이터베이스에 암호화되지 않은채 저장됩니다 \n실제로 사용하지 않는  아이디, 비밀번호로 가입하세요")</script>
	  
      회원가입</br>
      아이디 : <input type="text" name="register_id" required /></br>
      비밀번호 : <input type="password" name="register_pwd" required /></br>
	  비밀번호 재확인: <input type="password" name="register_pwd2" required /> </br>
      <input type="submit" value="회원가입" />
    </form>

  </body>
</html>