<head>
<title>新增課程資訊</title>
<style>
		*
		{
			margin:0 auto;
		  	font-family: "微軟正黑體";
		  	text-align:center;
		}
	</style>
</head>
<h1>課程資訊管理平台</h1>
<h3>新增課程資訊</h3>
<p><input type="button" name="" value="回到課程資訊管理平台" onclick="location.href='course.php'"></p>
<form method="POST" action="">
	<table border="1" cellspacing="0">
		<tr>
			<th>欄位</th>
			<th>資料</th>
		</tr>
		<tr>
			<td>課號</td>
			<td><input type="text" name="cNum" ></td>
		</tr>
		<tr>
			<td>課程名稱</td>
			<td><input type="text" name="cName" ></td>
		</tr>
		<tr>
			<td>修課年級</td>
			<td><input type="text" name="cYear" ></td>
		</tr>
		<tr>
			<td>教授</td>
			<td><input type="text" name="cTeacher" ></td>
		</tr>
		<tr>
			<td>課程資訊</td>
			<td><input type="text" name="cInfo" ></td>
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
				<input type="hidden"  name="action" value="add">
				<input type="submit" name="btnSMT" value="新增資料">
				<input type="reset" name="btnRST" value="重新填寫">
			</td>
		</tr>
	</table>
</form>
<?
	if(isset($_POST['action']) && ($_POST['action'] == 'add')){
		include("connMysql.php");
		$sql_query="INSERT INTO course (cNum, cName, cYear, cTeacher, cInfo, cHard, cHW, cRec) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = $db_link->prepare($sql_query);
		$stmt->bind_param("ssssssss", $_POST['cNum'], $_POST['cName'], $_POST['cYear'], $_POST['cTeacher'], $_POST['cInfo'], $_POST['cHard'], $_POST['cHW'], $_POST['cRec']);
		if($stmt->execute()){
			$stmt->close();
			$db_link->close();
			echo "<script>alert('新增成功');location.href='course.php';</script>";
		}
		else{
			die("新增失敗");
		}
	}
?>