<?php
	include("connMysql.php");
	$pageRow_records= 5;
	$num_pages=1;
	if(isset($_GET['page']))
		$num_pages=$_GET['page'];
	$startRow_records=($num_pages-1)*$pageRow_records;

	$test="";
	if(isset($_POST["test"]))
	{
		$test=$_POST["test"];
		$query_info="SELECT * FROM course WHERE cName like'$test%'";
		$result = $db_link->query($query_info);
	}
	$query_info="SELECT * FROM course WHERE cName like'$test%'";
	$result = $db_link->query($query_info);
	$query_RecBoard="SELECT * FROM board WHERE bName like'$test%' ORDER BY bTime DESC";


	$query_limit_RecBoard=$query_RecBoard." LIMIT {$startRow_records},{$pageRow_records}";
	$RecBoard=$db_link->query($query_limit_RecBoard);
	$all_RecBoard=$db_link->query($query_RecBoard);
	$total_records=$all_RecBoard -> num_rows;
	$total_pages=ceil($total_records/$pageRow_records);

	$query_RecCourse="SELECT * FROM course ORDER BY cYear ASC";
	$RecCourse=$db_link->query($query_RecCourse);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>課程評論留言板</title>
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
				<form action="" id="carform" method="post">
				<label for="board_class">搜尋課程名稱</label>
					<select id="board_class" name="test" form="carform">
					<option value=""></option>
				  	<?php
					while($row_RecCourse=$RecCourse->fetch_assoc()) { 
					?>
					<option value="<?php echo $row_RecCourse['cName']; ?>"><?php echo $row_RecCourse['cName']; ?></option>
					<?php } ?>
					</select>
					<input class="btn btn-primary" type="submit" >
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-sm">
				<div class="card border-primary mb-3">
					<div class="card-header">
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
							</tr>
						<?
						while($row_result = $result->fetch_assoc())
						{ 
							echo "<tr><td>".$row_result['cNum']."</td><td>".$row_result['cName']."</td><td>".$row_result['cYear']."</td><td>".$row_result['cTeacher']."</td><td>".$row_result["cInfo"]."</td><td>".$row_result['cHard']."</td><td>".$row_result["cHW"]."</td><td>".$row_result["cRec"]."</td>";
						}
						?>		
						</table>
					</div>
				</div>
			</div>
		</div>
		<?php while($row_RecBoard=$RecBoard->fetch_assoc()) { ?>
		<div class="row">
			<div class="col-sm">
				<div class="card border-primary mb-3">
					
					<div class="card-header">
						<span class="badge badge-primary"><?php echo $row_RecBoard['bUser'];?></span>
						<span class="badge badge-pill badge-secondary"><?php echo $row_RecBoard['bTime'];?></span>
						<span class="badge badge-pill badge-secondary"><?php echo $row_RecBoard['bName'];?></span>
						<span class="btn btn-outline-info"><a href="update.php?id=<?php echo $row_RecBoard["bID"]; ?>">編輯</a></span>
						<span class="btn btn-outline-info"><a href="member_delete.php?id=<?php echo $row_RecBoard["bID"]; ?>">刪除</a></span>
					</div>
					<div class="card-body text-secondary">
						<h5 class="card-title text-dark font-weight-bold"><?php echo $row_RecBoard['bSub'];?></h5>
						<span class="badge badge-primary"><?php echo $row_RecBoard['bRec'];?></span>
						<p class="card-text">
							<?php echo $row_RecBoard['bContent'];?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>

		<div class="row">
			<div class="col-sm-2">資料筆數：<?php echo $total_records; ?></div>
			<div class="col-sm-10">
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item <?php if($num_pages==1) echo 'disabled'?>">
							<a class="page-link" href="admin.php?page=<?php echo $num_pages-1?>">Previous</a></li>
						<!--<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>-->
						<?php
							for($i=1; $i<=$total_pages; $i++)
							{
								$str1=""; 
								$str2="";
								if($i==$num_pages)
									$str1='<li class="page-item disabled">';
								else
									$str1='<li class="page-item">';
								$str2="<a class='page-link' href='admin.php?page={$i}'>{$i}</a></li>";
								echo $str1.$str2;
							}
						?>
						<li class="page-item <?php if($num_pages>=$total_pages) echo 'disabled'?>">
							<a class="page-link" href="admin.php?page=<?php echo $num_pages+1 ?>">Next</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</body>
</html>


