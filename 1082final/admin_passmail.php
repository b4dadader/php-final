<?
	include("connMysql.php");
	if(isset($_GET["email"]) && $_GET["email"]!="" ){
		$query_Email = "SELECT mPassword FROM member WHERE mEmail=?";
		$stmt=$db_link->prepare($query_Email);
		$stmt->bind_param("s", $_GET["email"]);
		$stmt->execute();
		$stmt->bind_result($password);
		$stmt->fetch();
		$stmt->close();
	}

	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require '../PHPMailer-master/src/Exception.php';
	require '../PHPMailer-master/src/PHPMailer.php';
	require '../PHPMailer-master/src/SMTP.php';
	if(isset($_GET["sendmail"])&&$_GET["sendmail"]=="true"){
		$mail = new PHPMailer(true);
		try{
			
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 's1062024@g.yzu.edu.tw';
		$mail->Password = 'antonio0310';
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;
		$mail->CharSet="utf-8";
		$mail->setFrom($mail->Username);
		$mail->addAddress($_GET["email"]);
		$mail->addReplyTo($mail->Username,$mail->Username);
		$mail->wordwrap=50;
		$mail->isHTML(true);
		$mail->Subject="關於你的密碼";
		
		
		$mail->Body = 
		
		"你的密碼: ".$password;
		$mail->send();
		echo "郵件已寄出<br>";
		}catch(Exception $e){
			echo "無法發送郵件<br>";
			echo "Mailer Error郵件錯誤<br>".$mail->ErrorInfo;
		}
	}
?>
<body>
<?if(isset($_GET["sendmail"])&&($_GET["sendmail"]=="true")){?>
成功寄出,<a href ="login.php">回到登入處</a><?php }?>
</body>
<head>
	<meta charset="utf-8"> 
	<title>忘記密碼</title> 
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
<form method="get" action="">
	<div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <input type="submit" value="Submit">
  <input type="hidden" name="sendmail" id="sendmail" value="true">
</form>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>

</title></head>
<body>
    <form method="post" action="./File_DownLoad_Wk_zip.aspx?File_name=task1.php&amp;type=3&amp;id=2919829" id="form1">
<div class="aspNetHidden">
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKLTEzNDM3NzkxOWRkwneTr34MFXJYUKyKKda+DU4gQVM=" />
</div>

<div class="aspNetHidden">

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="629601C3" />
</div>
    <div>
    
    </div>
    </form>
</body>
</html>
