<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>登入會員系統</title> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<style>
		*{margin:0 auto;
			font-family: "微軟正黑體";
			text-align:center;
		}
	</style>
</head>
<body>
<?
require_once("connMysql.php");
/*if(isset($_POST["loginMember"]) && ($_POST["loginMember"]!="")){
	if($_POST["memberLevel"] == "member"){
		header("Location :member_center.php");
	}else{
		header("Location: member_admin.php");
	}
}*/	if(isset($_POST["action"])&&($_POST["action"]=="login")){
//if(isset($_POST["username"]) && isset($_POST["password"])){
	$query_RecLogin = "SELECT mUser, mPassword, mLv FROM member WHERE mUser=?";
	$stmt=$db_link->prepare($query_RecLogin);
	$stmt->bind_param("s", $_POST["username"]);
	$stmt->execute();
	$stmt->bind_result($username, $password, $level);
	$stmt->fetch();
	$stmt->close();

//}

if($_POST["password"]==$password){
	/*$query_RecLoginUpdate = "UPDATE member SET mLogin=mLogin+1, mLogintime=NOW() WHERE mUser=?";
	$stmt=$db_link->prepare($query_RecLoginUpdate);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$stmt->close();*/
	$_POST["loginMember"]=$username;
	$_POST["memberLevel"]=$level;
	/*if(isset($_POST["rememberme"]) && ($_POST["rememberme"]=="true")){
		setcookie("remUser", $_POST["username"], time()+24*60);
		setcookie("remPass", $_POST["password"], time()+24*60);
	}else{
		if(isset($_COOKIE["remUser"])){
			setcookie("remUser", $_POST["username"], time()-100);
			setcookie("remPass", $_POST["password"], time()-100);
		}
	}*/
	if($_POST["memberLevel"]=="member"){
		header("Location: member_center.php");
	}else if($_POST["memberLevel"]=="admin"){
		header("Location: member_admin.php");
	}else{
	header("Location :login.php");
	}
}
}
?>
<form method="post" action="">
	<div class="card text-center">
		<div class="card-header">登入會員系統</div>
		<div class="card-body">
			<p class="card-text">帳號
				<input type="text" name="username" id="username" value=""
				<?/*
				if(isset($_COOKIE["remUser"]) && ($_COOKIE["remUser"]!=""))
				{echo $_COOKIE["remUser"];}*/
				?>
				>
			</p>
			<p class="card-text">密碼
				<input type="password" name="password" id="password" value=""
				<?/*
				if(isset($_COOKIE["remPass"]) && ($_COOKIE["remPass"]!=""))
					{echo $_COOKIE["remPass"];}*/
				?>
				>
			</p>
			<input type="hidden" name="action" id="action" value="login">
			<input type="submit" class="btn btn-primary" name="buttom" id="bottom" value="登入系統">
			<a href="admin_passmail.php" class="btn btn-primary">忘記密碼</a>
		</div>
		<div class="card-footer text-muted">
			<p>還沒有會員帳號?</br>
			註冊帳號免費又容易!</p>
			<a class="btn btn-info" href="member_add.php">申請會員</a>
		</div>
	</div>
</form>
<?if(isset($_GET["errMsg"]) && ($_GET["errMsg"]=="1")){?>
	<div class="bg-danger">登入帳號或密碼錯誤</div>
<?}?>
</body>
</html>
<?
	$db_link->close();
?>
		
		