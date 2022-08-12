<?
	include("connMysql.php");
	$sql_query = "SELECT * FROM course ORDER BY cID ASC";
	$result = $db_link->query($sql_query);
	$total = $result->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>課程資訊管理</title>
	<style>
		*{margin:0 auto;
		  font-family: "微軟正黑體";
		  text-align:center;
		}
	</style>
</head>
<body>
	<h1>課程資訊管理平台</h1>
	<p>目前課程筆數<?php echo $total; ?></p>
	<p><input type="button" name="" value="返回學生留言管理平台" onclick="location.href='member_admin.php'"></p>
	<p><input type="button" name="" value="新增課程" onclick="location.href='course_add.php'"></p>
<table border="1" cellspacing="0">
		<tr>
			<th>課號</th>
			<th>課程名稱</th>
			<th>修課年級</th>
			<th>教授</th>
			<th>課程資訊</th>
			<th>課程難易度</th>
			<th>功課量</th>
			<th>課程類別</th>
			<th>功能</th>
		</tr>
<?
	while($row_result = $result->fetch_assoc())
	{ 
		echo "<tr><td>".$row_result['cNum']."</td><td>".$row_result['cName']."</td><td>".$row_result['cYear']."</td><td>".$row_result['cTeacher']."</td><td>".$row_result["cInfo"]."</td><td>".$row_result['cHard']."</td><td>".$row_result["cHW"]."</td><td>".$row_result["cRec"]."</td><td>";
		echo "<a href='course_modify.php?id=".$row_result['cID']."'>修改</a>";
		echo"<a href='course_delete.php?id=".$row_result['cID']."'>刪除</a></td></tr>";
	}
?>
		
</table>

</body>
</html>