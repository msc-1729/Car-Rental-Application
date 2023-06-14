<?php
session_start();
error_reporting(0);
$mail=$_SESSION['login'];
$veh=$_SESSION['veh'];
$fromdate = $_SESSION['fromdate'];
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
//header('location:admin/index.php');
		
}
else{ 

    if(isset($_POST['submit']))
    {    $amount = $_POST['amount'];
		//$veh=$_SESSION['veh'];
		
        $cvv =md5($_POST['cvv']);
        $s = "SELECT amount from wallet where email='$mail'";
    $ry = $dbh->prepare($s);
    $ry->execute();
    $retr=$ry->fetchAll(PDO::FETCH_OBJ);
    foreach($retr as $getr)
  { $balance=$getr->amount;
    if($balance>$amount)
    {
        $sql="SELECT * from tblusers where Emailid='$mail' and password='$cvv'";
        $queryr = $dbh->prepare($sql);
        if($queryr->execute()){

            $sqlr = "SELECT amount from payment where email='$mail' and id='$veh' and fromdate = '$fromdate'";
    $query = $dbh->prepare($sqlr);
    $query->execute();
    $resultr=$query->fetchAll(PDO::FETCH_OBJ);
    foreach($resultr as $result1){
  
        $_SESSION['oldamount']=$result1->amount;
    }
    $newamount = $amount + $_SESSION['oldamount'];
    $bamount=$balance-$amount;
    $flag="UPDATE wallet set amount='$bamount' where email='$mail'";
    $glaf="UPDATE payment set amount='$newamount' where email='$mail' and id='$veh' and fromdate = '$fromdate'";
    $ask = $dbh->prepare($flag);
    $aski = $dbh->prepare($glaf);
    if($ask->execute()){
       if($aski->execute()){
		$msg="MONEY ADDED SUCCEESSFULLY!!!!";

        $gun="SELECT amount from payment where email='$mail' and id='$veh' and fromdate = '$fromdate'";
	$ruf = $dbh->prepare($gun);
	$ruf->execute();
	$ts=$ruf->fetchAll(PDO::FETCH_OBJ);
	foreach($ts as $st){
		$sqlc = "UPDATE tblbooking SET fwallet = '$amount' where VehicleId = '$veh' and userEmail ='$mail' and Fromdate = '$fromdate'";
			$queryc = $dbh->prepare($sqlc);
			$queryc->execute();
		if($_SESSION['tcost']<=$st->amount)
		{  $am=$_SESSION['tcost'];
			$sqlb = "UPDATE tblbooking SET bookst =1,tblamount =$am  where VehicleId = '$veh' and userEmail ='$mail' and Fromdate = '$fromdate'";
			$queryb = $dbh->prepare($sqlb);
			$queryb->execute();
            $abc="UPDATE  tblvehicles SET bookingstatus=1 where id='$veh'";
			$queryt = $dbh->prepare($abc);
			if($queryt->execute())
{
			echo "<script>alert('payment successfully done');</script>";
}
        }

	}
        
       }
    }
    else{
        $error="SOMETHING WENT WRONG";
    }
        }
        else
        {
            $error = "Invalid Details";
        }
    }
   else{
    $error = "Insufficient balance";

   }
}

}
   

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
<label class="col-sm-2 control-label">AMOUNT<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="amount" class="form-control" pattern = "[1-9]{1}[0-9]{ ,4}" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">PASSWORD<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="cvv" class="form-control" required>
</div>
</div>
											
<div class="form-group">
<label class="col-sm-2 control-label">WALLET BALANCE:<span style="color:red"></span></label>
<div class="col-sm-4">
<h5> <?php echo htmlentities($_SESSION['amount']);  ?> </h5>
</div>
<div class="col-sm-8 col-sm-offset-2">
														<button class="btn btn-default" type="reset"><a href="payment.php?offer=<?php echo htmlentities($_SESSION['offer']);?>">BACK </a></button>
													    <button class="btn btn-default" name="submit" type="submit">PAY</button>
                                         
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