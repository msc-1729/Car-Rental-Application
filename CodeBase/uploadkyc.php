<?php
session_start();
error_reporting(0);
$mail=$_SESSION['login'];
// $_SESSION['check']=1;
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
//header('location:admin/index.php');
	
}
else{ 
$sqli="SELECT checkvalue from tblusers where Emailid='$mail'";
$querys = $dbh->prepare($sqli);
$querys->execute();
$resu=$querys->fetchAll(PDO::FETCH_OBJ);
foreach($resu as $result)
{ 

if(isset($_POST['submit']))
  {
	  if($result->checkvalue<1)
	  {
$pannum=$_POST['pannum'];
$licensenum=$_POST['licensenum'];



$panimg=$_FILES["img1"]["name"];
$licenseimg=$_FILES["img2"]["name"];

move_uploaded_file($_FILES["img1"]["tmp_name"],"img/vehicleimages/".$_FILES["img1"]["name"]);
move_uploaded_file($_FILES["img2"]["tmp_name"],"img/vehicleimages/".$_FILES["img2"]["name"]);
$sql="INSERT INTO kyc(mailid,pannum,licensenum,panimg,licenseimg) VALUES(:id,:pannum,:licensenum,:img1,:img2)";
$query = $dbh->prepare($sql);
$query->bindParam(':id',$mail,PDO::PARAM_STR);
$query->bindParam(':pannum',$pannum,PDO::PARAM_STR);
$query->bindParam(':licensenum',$licensenum,PDO::PARAM_STR);
$query->bindParam(':img1',$panimg,PDO::PARAM_STR);
$query->bindParam(':img2',$licenseimg,PDO::PARAM_STR);
if($query->execute()){
	$msg="KYC SUCCESSFULLY COMPLETED";
	// $_SESSION['check']=0;
	$xyz="UPDATE tblusers SET checkvalue=1 where Emailid='$mail'";
	$qerf=$dbh->prepare($xyz);
	$qerf->execute();
}
else{
	// if($_SESSION['check']=1)
	// {
	$error="Invalid Details";
}
	  }
	else
	{
		$error="AlREADY UPDATED";
	}	
}

}



	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>What The Cab | User KYC</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="admin/css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="admin/css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="admin/css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="admin/css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="admin/css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="admin/css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="admin/css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="admin/css/style.css">
<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	
	<div class="ts-main-content">
	
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">UPDATE KYC</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">KYC Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">PAN NUMBER<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="pannum" class="form-control" pattern = "[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}" title ="not a valid pan no"required>
</div>
</div>
											
<div class="form-group">
<label class="col-sm-2 control-label">LICENSE NUMBER<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="licensenum" class="form-control" pattern="[A-Z]{2}[0-9]{6}[A-Z]{7}"title="not a valid license number" required>
</div>

</div>

<div class="hr-dashed"></div>


<div class="form-group">
<div class="col-sm-12">
<h4><b>Upload Files</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
PAN CARD <span style="color:red">*</span><input type="file" name="img1" required>
</div>

											<div class="col-sm-4">
DRIVING LICENSE <span style="color:red">*</span><input type="file" name="img2" required>
</div>
<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset"><a href ="index.php">Home</a></button>
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
												</div>
											</div>



</div>
</form>

<div class="hr-dashed"></div>									
</div>
</div>
</div>
</div>
							


					

					</div>
				</div>
				
			

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="admin/js/jquery.min.js"></script>
	<script src="admin/js/bootstrap-select.min.js"></script>
	<script src="admin/js/bootstrap.min.js"></script>
	<script src="admin/js/jquery.dataTables.min.js"></script>
	<script src="admin/js/dataTables.bootstrap.min.js"></script>
	<script src="admin/js/Chart.min.js"></script>
	<script src="admin/js/fileinput.js"></script>
	<script src="admin/js/chartData.js"></script>
	<script src="admin/js/main.js"></script>
</body>
</html>
<?php } ?>