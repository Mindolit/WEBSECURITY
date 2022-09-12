<?php
	session_start();
	$con=mysqli_connect('localhost','root','0000','testbook');
	
	mysqli_set_charset($con,"utf8");
    $sql="SELECT * FROM board ";
    $query=mysqli_query($con,$sql);
   

?>

<!DOCTYPE html>
<table>
	
<tr class="aa">
<th><span> id</span></th>
<th><span>글제목</span></th>
<th><span>글쓴이</span></th>
<th><span>만들어진시간</span></th>
</tr>
<?php while( $result=mysqli_fetch_array($query)){ ?>
	
<tr>
<td><?php echo $result['id'];?></td>
<td><?php echo $result['board_name'];?></td>
<td><?php echo $result['writer'];?></td>
<td><?php echo $result['created_date'];?></td>
<td> <a href="https://colony-team-ebmke.run.goorm.io/docs/read.php?id=<?php echo $result['id'];?>">보기</a>
	
	</td>
<?php }?>
</tr>

</table>
<div>
<p>
	<a href="/docs/create_board.php">글쓰기</a>
</p>

</div>

