<?php
session_start();
error_reporting(0);
$mail=$_SESSION['login'];
$diff=$_SESSION['diff'];

//echo $_SESSION['tcost'];
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
//header('location:admin/index.php');
		
}
else{ 

if(isset($_POST['submit']))
  {
 $cid = $_GET['cid'];
$amount = $_POST['amount'];
$username = $_POST['username'];
$cardnumber = $_POST['cardnumber'];
$expdate = $_POST['expdate'];
$cvv = $_POST['cvv'];
$sql="SELECT * from usercards where email='$mail' and cardnumber='$cid' and cvv='$cvv'";
$sqlr = "SELECT amount from wallet where email='$mail'";
$queryr = $dbh->prepare($sqlr);
$queryr->execute();
$resultr=$queryr->fetchAll(PDO::FETCH_OBJ);
foreach($resultr as $result1){

	$_SESSION['oldamount']=$result1->amount;
}

$query = $dbh->prepare($sql);
$query->execute();
if($query->rowCount() > 0)
{
$results=$query->fetchAll(PDO::FETCH_OBJ);
$newamount = $amount + $_SESSION['oldamount'];
$_SESSION['netamount']=$newamount;
foreach($results as $result){


$sqli="UPDATE wallet set amount=:amount where email=:email";
$queryi = $dbh->prepare($sqli);
$queryi->bindParam(':email',$mail,PDO::PARAM_STR);
$queryi->bindParam(':amount',$newamount,PDO::PARAM_STR);
if($queryi->execute()){
	$msg="MONEY ADDED SUCCEESSFULLY!!!!";
}
else{
	$error="SOMETHING WENT WRONG";
}
}


}else{
	$error = "invalid details";
}


}





	?>
	<?php
	$promo = $_GET['promocode'];
 $sql="UPDATE userpromo SET $promo=1 where email='$mail'";
 $qu=$dbh->prepare($sql);
 $qu->execute();

	$from = $_SESSION['fromdate'];
	$guess=$_SESSION['veh'];
	$efg="INSERT INTO payment (id,email,amount,fromdate) VALUES ('$guess','$mail',0,'$from')";
	$queryt = $dbh->prepare($efg);
	$queryt->execute();
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
	
	<title>What The Cab | Add money to wallet</title>

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
					
						<h2 class="page-title">BOOK CAR</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">YOUR CARD DETAILS</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
				<?php $vhide=$_SESSION['cost'];
				$promo = $_GET['promocode'];
				$sql="SELECT * FROM promo where promocode='$promo'";
				$dh=$dbh->prepare($sql);
				$dh->execute();
				$rer=$dh->fetchAll(PDO::FETCH_OBJ);
                foreach($rer as $result1){
				$offer=$result1->offer;
				$_SESSION['offer']=$offer;  
				}		 	
				
    ?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group ">
<label class="col-sm-2 control-label">NET AMOUNT<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="username" class="form-control" pattern = "[A-Za-z]+"value="<?php  $effective = $_SESSION['cost'] - ($_SESSION['offer']/100)*$_SESSION['cost'];$fin=$effective*$_SESSION['diff'];$_SESSION['tcost']=$fin;echo htmlentities($_SESSION['tcost']);?>" title ="Net Amount"required readonly>
</div>
</div>
<div class="form-group ">
<label class="col-sm-2 control-label">PAY THROUGH<span style="color:red"></span></label>
<div class="col-sm-4">
<button class="btn btn-primary" name="submit" type="reset"><a href ="cardpay.php">CREDIT CARD</a></button>
</div>
<div class="col-sm-4">
<button class="btn btn-primary" name="submit" type="reset"><a href ="walletpay.php">WALLET</a></button>
</div>
</div>

<div class="hr-dashed"></div>


<div class="form-group">
<div class="col-sm-12">
</div>
</div>


<div class="form-group">

<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
														<button class="btn btn-default" type="reset"><a href ="index.php">Home</a></button>
													
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