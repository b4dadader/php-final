<?php
require_once("connMysql.php");
if(isset($_POST["action"])&&($_POST["action"]=="add"))
{
	$sql_insert="INSERT INTO board (bUser,bTime,bName,bRec,bSub,bContent)
	VALUES (?,NOW(),?,?,?,?)";
	$stmt=$db_link->prepare($sql_insert);
	$stmt->bind_param("sssss",$_POST["bUser"],$_POST["bName"],$_POST["bRec"],$_POST["bSub"],$_POST["bContent"]);
	$stmt->execute();
	$stmt->close();
	$db_link->close();
	header("Location: member_center.php");
}
$query_RecCourse="SELECT cName FROM course ORDER BY cYear ASC";
$RecCourse=$db_link->query($query_RecCourse);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新增留言</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<style>
		body {
			background: skyblue;
		}
		* {
			font-family:"微軟正黑體";
		}
		.container {
			background: white;
		}
		img.sex {
			width:25px;
		}
		span {
			font-size: 10px;
		}
		img.smIcon {
			border: 0;
			width: 16px;
		}
	</style>
</head>
<body>
	<div class="container border border-secondary rounded">
		<div class="row">
			<div class="col-sm">
				<h1 class="font-weight-bolder text-center">課程評論留言版</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-sm text-right" style="padding: 12px 15px">
				<a class="btn btn-outline-info" href="member_center.php" role="button">瀏覽留言</a>
				<a class="btn btn-outline-warning" href="post.php" role="button">我要留言</a>
				<a class="btn btn-outline-danger" href="login.php" role="button">會員登入</a>
			</div>
		</div>
		<form method="POST" name="formPost" action="" onsubmit="return checkForm();">
			<div class="form-group row">
				<label for="bUser" class="col-sm-2 col-form-label">使用者名稱</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="bUser" id="bUser" placeholder="輸入暱稱" value="開發者" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label for="bSub" class="col-sm-2 col-form-label">標題</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="bSub" id="bSub" placeholder="輸入留言標題">
				</div>
			</div>

			<div class="form-group row">
				<label for="bName" class="col-sm-2 col-form-label">課程</label>
				<div class="col-sm-10">
					<select name="bName" id="bName">
						<?php
						while($row_RecCourse=$RecCourse->fetch_assoc()) { 
						?>
						<option value="<?php echo $row_RecCourse['cName']; ?>"><?php echo $row_RecCourse['cName']; ?></option>
					<?php } ?>
					</select>
				</div>
			</div>

			<fieldset class="form-group">
				<div class="row">
					<legend class="col-form-label col-sm-2 pt-0">推薦</legend>
					<div class="col-sm-10">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="bRec" id="bRec1" value="推" checked>
							<label class="form-check-label" for="bRec1">推</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="bRec" id="bRec2" value="噓">
							<label class="form-check-label" for="bRec2">噓</label>
						</div>
					</div>
				</div>
			</fieldset>
			<div class="form-group row">
				<label for="bContent" class="col-sm-2 col-form-label">留言內容</label>
				<div class="col-sm-10">
					<textarea class="form-control" name="bContent" id="bContent" rows="3"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm text-right">
					<input type="hidden" name="action" id="action" value="add">
					<input class="btn btn-primary" type="submit" name="button" id="button" value="送出留言">
					<input class="btn btn-primary" type="reset" name="button2" id="button2" value="重設資料">
					<input class="btn btn-primary" type="button" name="button3" id="button3" value="回上一頁" onClick="window.history.back();">
				</div>
			</div>
		</form>
	</div>
</body>
</html>