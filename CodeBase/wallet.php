<?php
session_start();
error_reporting(0);
$mail=$_SESSION['login'];
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
//header('location:admin/index.php');
		
}
else{ 

$sql="SELECT username from usercards where email='$mail'";
$sqli = "SELECT amount from wallet where email = '$mail'";
$query=$dbh->prepare($sql);
$query2=$dbh->prepare($sqli);
$query->execute();
$query2->execute();
$resultr=$query->fetchAll(PDO::FETCH_OBJ);
foreach($resultr as $result1){

	$_SESSION['username']=$result1->username;
}
$resultp=$query2->fetchAll(PDO::FETCH_OBJ);
foreach($resultp as $result1){

	$_SESSION['amount']=$result1->amount;
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
	
	<title>What The Cab | Wallet Details</title>

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
					
						<h2 class="page-title">ADD CARD</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">YOUR Wallet DETAILS</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group ">
<label class="col-sm-2 control-label">CARD HOLDER NAME:<span style="color:red"></span></label>
<div class="col-sm-4">
<h5> <?php echo htmlentities($_SESSION['username']);?> </h5>
</div>
</div>
											
<div class="form-group">
<label class="col-sm-2 control-label">WALLET BALANCE:<span style="color:red"></span></label>
<div class="col-sm-4">
<h5> <?php echo htmlentities($_SESSION['amount']);?> </h5>
</div>
<div class="col-sm-8 col-sm-offset-2">
														<button class="btn btn-default" type="reset"><a href ="index.php">BACK</a></button>
													
												</div>

</div>


<div class="hr-dashed"></div>


<div class="form-group">
<div class="col-sm-12">
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