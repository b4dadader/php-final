<?php
    include("connMysql.php");
    if( isset($_POST['action']) && ($_POST['action'] == 'update'))
	{
		$sql_query = "UPDATE course SET cNum=?, cName=?, cYear=?, cTeacher=?, cInfo=?, cHard=?, cHW=?, cRec=? WHERE cID=?";
		$stmt = $db_link->prepare($sql_query);
		$stmt -> bind_param("ssssssssi", $_POST['cNum'], $_POST['cName'], $_POST['cYear'], $_POST['cTeacher'], $_POST['cInfo'], $_POST['cHard'], $_POST['cHW'], $_POST['cRec'], $_POST['cID']);
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
<title>編輯課程資訊</title>
<form method="POST" action="">
	<table border="1" cellspacing="0">
		<tr>
			<th>欄位</th>
			<th>資料</th>
		</tr>
		<tr>
			<td>課號</td>
			<td><input type="text" name="cNum" value="<? echo $cNum ;?>"></td>
		</tr>
		<tr>
			<td>課程名稱</td>
			<td><input type="text" name="cName" value="<? echo $cName ;?>"></td>
		</tr>
		<tr>
			<td>修課年級</td>
			<td><input type="text" name="cYear" value="<? echo $cYear ;?>"></td>
		</tr>
		<tr>
			<td>教授</td>
			<td><input type="text" name="cTeacher" value="<? echo $cTeacher ;?>"></td>
		</tr>
		<tr>
			<td>課程資訊</td>
			<td><input type="text" name="cInfo" value="<? echo $cInfo ;?>"></td>
		</tr>
		<tr>
			<td>課程難易度</td>
			<td>
				<div>
		  		<input type="radio"  name="cHard" value="困難" checked>
		  		<label for="cHW">困難</label>
				</div>
				<div>
		  		<input type="radio"  name="cHard" value="適中" >
		  		<label for="cHW">適中</label>
				</div>
				<div>
		  		<input type="radio"  name="cHard" value="簡單" >
		  		<label for="cHW">簡單</label>
				</div>
			</td>
		</tr>
		<tr>
			<td>功課量</td>
			<td>
				<div>
		  		<input type="radio"  name="cHW" value="多" checked>
		  		<label for="cHW">多</label>
				</div>
				<div>
		  		<input type="radio"  name="cHW" value="適中" >
		  		<label for="cHW">適中</label>
				</div>
				<div>
		  		<input type="radio"  name="cHW" value="少" >
		  		<label for="cHW">少</label>
				</div>
			</td>
		</tr>
		<tr>
			<td>課程類別</td>
			<td>
				<div>
		  		<input type="radio"  name="cRec" value="推薦" checked>
		  		<label for="cHW">推薦</label>
				</div>
				<div>
		  		<input type="radio"  name="cRec" value="不建議" >
		  		<label for="cHW">不建議</label>
		  		<div>
		  		<input type="radio"  name="cRec" value="必修" >
		  		<label for="cHW">必修</label>
				</div>
				</div>
			</td>
		</tr>
		<tr>                                        
			<td colspan="2" style="text-align: center">
				<input type="hidden" name="cID" value="<?php echo $cID; ?>">
				<input type="hidden" name="action" value="update">
				<input type="submit" name="btnSMT" value="更新資料">
				<input type="reset" name="btnRST" value="重新填寫">
			</td>
		</tr>
	</table>
</form>