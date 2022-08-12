<?php
    include("connMysql.php");
    if( isset($_POST['action']) && ($_POST['action'] == 'delete'))
	{
		$sql_query = "DELETE FROM board WHERE bID=?";
		$stmt = $db_link->prepare($sql_query);
		$stmt -> bind_param("i", $_POST['bID']);
		$stmt ->execute();
		$stmt ->close();
		$db_link->close();
		header("location: member_admin.php");
	}
    $sql_select = "SELECT bID, bUser, bTime, bName, bSub, bContent FROM board WHERE bID= ?";
    $stmt = $db_link->prepare($sql_select);
    $stmt -> bind_param("i", $_GET["id"]);
    $stmt -> execute();
    $stmt -> bind_result($bID, $bUser, $bTime, $bName, $bSub, $bContent);
    $stmt -> fetch();
?>
<title>刪除留言</title>
<form method="POST" action="">
	<table border="1" cellspacing="0">
		<tr>
			<th>欄位</th>
			<th>資料</th>
		</tr>
		<tr>
			<td>留言者</td>
			<td><input type="text" name="bUser" value="<? echo $bUser ;?>" readonly></td>
		</tr>
		<tr>
			<td>留言時間</td>
			<td><input type="text" name="bTime" value="<? echo $bTime ;?>" readonly></td>
		</tr>
		<tr>
			<td>科目</td>
			<td><input type="text" name="bName" value="<? echo $bName ;?>" readonly></td>
		</tr>
		<tr>
			<td>標題</td>
			<td><input type="text" name="bSub" value="<? echo $bSub ;?>" readonly></td>
		</tr>
		<tr>
			<td>內容</td>
			<td><textarea type="text" name="bContent" rows="3" readonly><?php echo $bContent; ?></textarea></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center">
				<input type="hidden" name="bID" value="<?php echo $bID; ?>">
				<input type="hidden" name="action" value="delete">
				<input type="submit" name="btnSMT" value="刪除留言">
			</td>
		</tr>
	</table>
</form>
