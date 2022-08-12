<?php
require_once("connMysql.php");
if( isset($_POST['action']) && ($_POST['action'] == 'delete'))
	{
		$sql_query = "DELETE FROM board WHERE bID=?";
		$stmt = $db_link->prepare($sql_query);
		$stmt -> bind_param("i", $_GET['id']);
		$stmt ->execute();
		$stmt ->close();
		$db_link->close();
		header("location: member_center.php");
	}
$sql_record="SELECT bID, bUser,bName,bRec,bSub,bContent FROM board WHERE bID=?";
$stmt=$db_link->prepare($sql_record);
$stmt->bind_param("i",$_GET["id"]);
$stmt->execute();
$stmt->bind_result($bID,$bUser,$bName,$bRec,$bSub,$bContent);
$stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言刪除</title>
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
				<h3 class="font-weight-bolder text-center">留言刪除</h3>
			</div>
		</div>

		<form method="POST" name="formPost" action="" onsubmit="return checkForm();">
			<div class="form-group row">
				<label for="boardsubject" class="col-sm-2 col-form-label">標題</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="bSub" id="bSub" placeholder="輸入留言標題" value="<?php echo $bSub; ?>" readonly>
				</div>
			</div>

			<fieldset class="form-group">
				<div class="row">
					<legend class="col-form-label col-sm-2 pt-0">推薦</legend>
					<div class="col-sm-10">
						<?php
							if($bRec=="推")
							{
						?>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="bRec" id="bRec1" value="推" checked disabled>
							<label class="form-check-label" for="bRec1">推</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="bRec" id="bRec2" value="噓" disabled>
							<label class="form-check-label" for="bRec2">噓</label>
						</div>
						<?php 
							}
							else
							{
						?>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="bRec" id="bRec1" value="推" disabled>
							<label class="form-check-label" for="bRec1">推</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="bRec" id="bRec2" value="噓" checked disabled>
							<label class="form-check-label" for="bRec2">噓</label>
						</div>
						<?php } ?>
					</div>
				</div>
			</fieldset>
			<div class="form-group row">
				<label for="bContent" class="col-sm-2 col-form-label">留言內容</label>
				<div class="col-sm-10">
					<textarea class="form-control" name="bContent" id="bContent" rows="3" value="<?php echo nl2br($bContent); ?>" readonly><?php echo $bContent; ?></textarea>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm text-right">
					<input type="hidden" name="bID" id="bID" value="<?php echo $bID; ?>">
					<input type="hidden" name="action" id="action" value="delete">
					<input class="btn btn-primary" type="submit" name="button" id="button" value="刪除留言">
				</div>
			</div>
		</form>
	</div>
</body>
</html>
<?php
	$stmt->close();
	$db_link->close();
?>