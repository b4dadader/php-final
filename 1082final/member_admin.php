<?
	include("connMysql.php");
	$sql_query = "SELECT * FROM board ORDER BY bID ASC";
	$result = $db_link->query($sql_query);
	$total = $result->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>留言板管理</title>
	<style>
		*{margin:0 auto;
		  font-family: "微軟正黑體";
		  text-align:center;
		}
	</style>
</head>
<body>
	<h1>學生留言管理平台</h1>
	<p>目前留言筆數<?php echo $total; ?><input type="button" name="" value="前往修改課程資訊" onclick="location.href='course.php'"></p>
<table border="1" cellspacing="0">
		<tr>
			<th>留言者</th>
			<th>留言時間</th>
			<th>科目</th>
			<th>標題</th>
			<th>內容</th>
			<th>功能</th>
		</tr>
<?
	while($row_result = $result->fetch_assoc())
	{ 
		echo "<tr><td>".$row_result['bUser']."</td><td>".$row_result['bTime']."</td><td>".$row_result['bName']."</td><td>".$row_result['bSub']."</td><td>".$row_result['bContent']."</td><td>";
		
		echo"<a href='admin_delete.php?id=".$row_result['bID']."'>刪除</a></td></tr>";
	}
?>
		
</table>

</body>
</html>