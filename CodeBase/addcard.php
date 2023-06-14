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

if(isset($_POST['submit']))
  {
$username = $_POST['username'];
$bankname = $_POST['bankname'];
$cardtype = $_POST['cardtype'];
$cardnumber = $_POST['cardnumber'];
$expdate = $_POST['expdate'];
$cvv = $_POST['cvv'];
$sql="INSERT INTO usercards(username,cardnumber,expdate,cvv,email,bankname,cardtype,balance) VALUES(:username,:cardnumber,:expdate,:cvv,:email,:bankname,:cardtype,50000)";

$query = $dbh->prepare($sql);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':cardnumber',$cardnumber,PDO::PARAM_STR);
$query->bindParam(':expdate',$expdate,PDO::PARAM_STR);
$query->bindParam(':cvv',$cvv,PDO::PARAM_STR);
$query->bindParam(':email',$mail,PDO::PARAM_STR);
$query->bindParam(':bankname',$bankname,PDO::PARAM_STR);
$query->bindParam(':cardtype',$cardtype,PDO::PARAM_STR);
if($query->execute()){
	$msg="CARD ID ADDED!!!!!!!";
	// $sqli = "INSERT INTO wallet(email,amount) VALUES(:email,'0')";
 //    $queryi = $dbh->prepare($sqli);
 //    $queryi->bindParam(':email',$mail,PDO::PARAM_STR);
 //    $queryi->execute();
}
else{
	$error="Invalid Card Details";
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
					
						<h2 class="page-title">ADD CARD</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">YOUR CARD DETAILS</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group ">
<label class="col-sm-2 control-label">SELECT BANK NAME<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="bankname" required>
<option value=""> Select </option>

<option value="ANDHRA BANK">ANDHRA BANK</option>
<option value="STATE BANK OF INDIA">STATE BANK OF INDIA</option>
<option value="HDFC">HDFC BANK</option>
<option value="UNION">UNION BANK</option>
</select>
</div>
</div>


<div class="form-group ">
<label class="col-sm-2 control-label">SELECT CARD TYPE<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="cardtype" required>
<option value=""> Select </option>
<option value="CREDIT CARD">CREDIT CARD</option>
<option value="DEBIT CARD">DEBIT CARD</option>
</select>
</div>
</div>


<div class="form-group ">
<label class="col-sm-2 control-label">CARD HOLDER NAME<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="username" class="form-control" pattern = "[A-Za-z]+" title ="ENTER THE NAME ON CARD"required>
</div>
</div>
											
<div class="form-group">
<label class="col-sm-2 control-label">CARD NUMBER<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="cardnumber" class="form-control" pattern="[1-9]{1}[0-9]{15}" title="ENTER YOUR CARD NUMBER" required>
</div>

</div>
<div class="form-group">
<label class="col-sm-2 control-label">EXPIRY DATE<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="expdate" class="form-control" placeholder="yy/mm/dd" pattern = "(20)[2-9][0-9]\-((0[0-9])|(1[0-2]))\-(([0-2][0-9])|(3[01]))" title ="ENTER THE EXPIRY DATE"required>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">CVV<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="cvv" class="form-control" pattern = "[0-9]{3}" title ="ENTER A VALID CVV" required>
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