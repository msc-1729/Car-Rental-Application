<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
$promocode=$_POST['promocode'];
$offer=$_POST['offer'];
$vdate=$_POST['vdate'];
$promoimg=$_POST['promoimg'];

$id=$_GET['id'];

$sql="update promo set promocode=:promo,offer=:offer,vdate=:vdate,promoimg=:promoimg where promocode=:id ";
$query = $dbh->prepare($sql);
$query->bindParam(':promo',$promocode,PDO::PARAM_STR);
$query->bindParam(':offer',$offer,PDO::PARAM_STR);
$query->bindParam(':vdate',$vdate,PDO::PARAM_STR);
$query->bindParam(':promoimg',$promoimg,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

$msg="Data updated successfully";


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
	
	<title>What The Cab | Admin Edit Promo Code</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
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
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Edit PromoCode</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
									<div class="panel-body">
<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
<?php 
$id=$_GET['id'];
$sql ="SELECT * from promo where promocode=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Promo code<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="promocode" class="form-control" value="<?php echo htmlentities($result->promocode)?>" required>
</div>
</div>
											
<div class="hr-dashed"></div>


<div class="form-group">
<label class="col-sm-2 control-label">offer<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="offer" class="form-control" value="<?php echo htmlentities($result->offer);?>" required>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">valid till<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="vdate" class="form-control" value="<?php echo htmlentities($result->vdate);?>" required>
</div>
</div>
<div class="hr-dashed"></div>								
<div class="form-group">
<div class="col-sm-12">
<h4><b>promo Image</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
<img src="img/vehicleimages/<?php echo htmlentities($result->promoimg);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changepromoimg.php?imgid=<?php echo htmlentities($result->promocode)?>">ChangeImage</a>
</div>
<div class="col-sm-8 col-sm-offset-2" >
													
<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Save changes</button>
												</div>
</div>



<div class="hr-dashed"></div>									
</div>
</div>
</div>
</div>
	
							












<?php }} ?>


										

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>