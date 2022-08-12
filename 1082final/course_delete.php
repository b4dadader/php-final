<?php
    include("connMysql.php");
    if( isset($_POST['action']) && ($_POST['action'] == 'delete'))
	{
		$sql_query = "DELETE FROM course WHERE cID=?";
		$stmt = $db_link->prepare($sql_query);
		$stmt -> bind_param("i", $_POST['cID']);
		$stmt ->execute();
		$stmt ->close();
		$db_link->close();
		header("location: course.php");
	}
    $sql_select = "SELECT cID, cNum, cName, cYear, cTeacher, cInfo, cHard, cHW, cRec FROM course WHERE cID= ?";
    $stmt = $db_link->prepare($sql_select);
    $stmt -> bind_param("i", $_GET["id"]);
    $stmt -> execute();
    $stmt -> bind_result($cID, $cNum, $cName, $cYear, $cTeacher, $cInfo, $cHard, $cHW, $cRec);
    $stmt -> fetch();
?>
<title>刪除課程資訊</title>
<form method="POST" action="">
	<table border="1" cellspacing="0">
		<tr>
			<th>欄位</th>
			<th>資料</th>
		</tr>
		<tr>
			<td>課號</td>
			<td><input type="text" name="cNum" value="<? echo $cNum ;?>" readonly></td>
		</tr>
		<tr>
			<td>課程名稱</td>
			<td><input type="text" name="cName" value="<? echo $cName ;?>" readonly></td>
		</tr>
		<tr>
			<td>修課年級</td>
			<td><input type="text" name="cYear" value="<? echo $cYear ;?>" readonly></td>
		</tr>
		<tr>
			<td>教授</td>
			<td><input type="text" name="cTeacher" value="<? echo $cTeacher ;?>" readonly></td>
		</tr>
		<tr>
			<td>課程資訊</td>
			<td><input type="text" name="cInfo" value="<? echo $cInfo ;?>" readonly></td>
		</tr>
		<tr>
			<td>課程難易度</td>
			<td><input type="text" name="cHard" value="<? echo $cHard ;?>" readonly></td>
		</tr>
		<tr>
			<td>功課量</td>
			<td><input type="text" name="cHW" value="<? echo $cHW ;?>" readonly></td>
		</tr>
		<tr>
			<td>課程類別</td>
			<td><input type="text" name="cRec" value="<? echo $cRec ;?>" readonly></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center">
				<input type="hidden" name="cID" value="<?php echo $cID; ?>">
				<input type="hidden" name="action" value="delete">
				<input type="submit" name="btnSMT" value="刪除課程資訊">
			</td>
		</tr>
	</table>
</form>
