
<?php
function only_number(String $content){ return preg_replace('#[^0-9]#', '', $content); }


$connect=mysqli_connect('localhost','root','0000','testbook');

mysqli_query($connect,"SET NAMES utf8");
$sql="SELECT *FROM board";
$article = array(
    'title'=>'ERROR',
    'description'=>'ERROR'
  );
 if(isset($_GET['id'])){
	 
	$filter=mysqli_real_escape_string($connect,$_GET['id']);
    $sql = "SELECT * FROM board WHERE id='{$filter}'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = $row['board_name'];
    $article['description'] = $row['board_index'];
  }


?>
<!doctype html>
<html>
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <h2><?=$article['title']?></h2>
    <?=$article['description']?>
  </body>
</html>