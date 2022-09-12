<?php 
session_start();
?>

<!-- <!DOCTYPE html>
<html lang="kr">
<head>
  <meta charset="UTF-8">
  <title>process</title>
	<link href="../static/css/bootstrap.css.min" rel="stylesheet"></link> -->
	<?php 
	if(isset($_POST['user_id'])&&isset($_POST['user_pw'])){
		$connect=mysqli_connect('localhost','root','0000','testbook');
		$userpw=$_POST['user_pw'];
// 		MYSQL 데이터베이스 root 비밀번호 0000$connect=mysqli_connect('localhost','root','0000','testbook');
		$username=mysqli_real_escape_string($connect,$_POST['user_id']);
		
		$sql="SELECT *FROM blogin WHERE login_id='{$username}' AND login_pw='$userpw'";
		
		
		
		
		$query=mysqli_query($connect,$sql);
		
		
		if($result=mysqli_fetch_array($query)){
		
			$_SESSION["login_id"]=$username;
			
			
			 print_r($_SESSION["login_id"]);
			
			?>
			<a href="https://colony-team-ebmke.run.goorm.io/docs/main_board.php">게시판</a>
<?php
			
		}
		else{
			
		    
		 echo "<script> alert('로그인 실패');</script>";	
		 echo "<script> history.back();</script>";
			
		}
		
	}
	
	?>
