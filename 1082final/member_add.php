<?php
require_once("connMysql.php");
if(isset($_POST["action"])&&($_POST["action"]=="add"))
{
	$sql_insert="INSERT INTO member (mName, mSex, mBirthday, mUser, mPassword, mEmail)
	VALUES (?, ?, ?, ?, ?, ?)";
	$stmt=$db_link->prepare($sql_insert);
	$stmt->bind_param("ssssss", $_POST['mName'], $_POST['mSex'], $_POST['mBirthday'], $_POST['mUser'], $_POST['mPassword'], $_POST['mEmail']);
	$stmt->execute();
	$stmt->close();
	$db_link->close();
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>加入會員</title>
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
				<h3 class="font-weight-bolder text-center">加入會員</h3>
			</div>
		</div>

		<form method="POST" name="formPost" action="" onsubmit="return checkForm();">
			<div class="form-group row">
				<label for="mName" class="col-sm-2 col-form-label">姓名</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="mName" id="mName" placeholder="輸入真實姓名">
				</div>
			</div>

			<fieldset class="form-group">
				<div class="row">
					<legend class="col-form-label col-sm-2 pt-0">性別</legend>
					<div class="col-sm-10">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="mSex" id="mSex1" value="男" checked>
							<label class="form-check-label" for="mSex1">男</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="mSex" id="mSex2" value="女">
							<label class="form-check-label" for="mSex2">女</label>
						</div>
					</div>
				</div>
			</fieldset>

			<div class="form-group row">
				<label for="mBirthday" class="col-sm-2 col-form-label">生日</label>
				<div class="col-sm-10">
					<input type="date" name="mBirthday">
				</div>
			</div>

			<div class="form-group row">
				<label for="mUser" class="col-sm-2 col-form-label">帳戶名稱</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="mUser" id="mUser" placeholder="輸入帳戶名稱">
				</div>
			</div>

			<div class="form-group row">
				<label for="mPassword" class="col-sm-2 col-form-label">密碼</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="mPassword" id="mPassword" placeholder="輸入密碼">
				</div>
			</div>

			<div class="form-group row">
				<label for="mEmail" class="col-sm-2 col-form-label">電子信箱</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" name="mEmail" id="mEmail" placeholder="請注意，忘記密碼將寄信至此信箱">
				</div>
			</div>

			<div class="form-group row">
				<div class="col-sm text-right">
					<input type="hidden" name="action" id="action" value="add">
					<input class="btn btn-primary" type="submit" name="button" id="button" value="加入會員">
					<input class="btn btn-primary" type="reset" name="button2" id="button2" value="重設資料">
					<input class="btn btn-primary" type="button" name="button3" id="button3" value="回上一頁" onClick="window.history.back();">
				</div>
			</div>
		</form>
	</div>
</body>
</html>
