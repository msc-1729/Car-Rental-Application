<?php 
session_start();
include('includes/config.php');
error_reporting(0);
$otp = rand(100000 , 999999);
if(isset($_POST['getotp']))
{

   
   $emailf = $_POST['emailid'];
   $_SESSION['emailinfirst'] = $emailf;
   $_SESSION['otpinfirst'] = $otp;
   $sqli = "SELECT id FROM tblusers WHERE EmailId=:email";
   $query= $dbh -> prepare($sqli);
   $query-> bindParam(':email', $emailf, PDO::PARAM_STR);
   
   $tomail = $emailf;
   $query-> execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() == 0)
{
   $subject = "this is the mail from what the cab";
   $body = "your otp is $otp";
   if(mail($tomail,$subject,$body))
   {
   	header("Location:second.php");
   }
}
else{
	echo "<script>alert('mail id already exists');</script>";
}
   
}
 

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Bootstrap Login page</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'><link rel="stylesheet" href="./login.css">
​
</head>
<body>
<!-- partial:index.partial.html -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MAIL REGISTRATION</title>
</head>
<body>
	<!-- Main Content -->
	<div class="container-fluid">
		<div class="row main-content bg-success text-center">
			<div class="col-md-4 text-center company__info">
				<span class="company__logo"><h2><span style="padding-right:1px; padding-top: 1px; display:inline-block;">

  <img class="img-responsive" src="assets/images/blog_img1.jpg" alt="Chania" width="460" height="345"> 

</span></h2></span>
				<h4 class="company_title">What The Cab</h4>
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
					<div class="row">
						<h2>Mail Registration</h2>
					</div>
					<form method = "post" control="" class="form-group">
					   <div class="row">
						
							<div class="row">
								<input type="text" name="emailid" id="emailid" class="form__input" pattern = "[a-z0-9A-Z_-.]+[@]{1}[a-z]+[.]{1}com" title="enter a valid email with extension .com" placeholder="Mailid" required = "required">
							</div>
							<div class="row">
								 <input type="submit" value="getotp" name="getotp" id="submit" class="btn btn-block">
							</div>
													
					    </div>
				    </form>
				</div>
			</div>
		</div>
	</div>
​
<style>
body {
    background-color: #101010;
}
</style>
</body>
  
</body>
</html>