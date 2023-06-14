<?php 
session_start();
include('includes/config.php');
error_reporting(0);

if(isset($_POST['register']))
{
    $otpgenerated = $_SESSION['otpinfirst'];
    $email = $_SESSION['emailinfirst'];
    $otpsubmitted = $_POST['otp'];
    if($otpgenerated == $otpsubmitted)
    {
        // $sql="INSERT INTO  tblusers(EmailId) VALUES(:email)";
        // $query = $dbh->prepare($sql);
        // $query->bindParam(':email',$email,PDO::PARAM_STR);
        // $query->execute();
        // $lastInsertId = $dbh->lastInsertId();
        // if($lastInsertId)
        // {
        //     header("Location:index.php");
        // }
        // else 
        // {
        //     echo "<script>alert('Something went wrong. Please try again');</script>";
        // }
        header("Location:index.php");

    }
    else{
        echo "<script>alert('something went wrong');</script>";
        header("Location:first.php");
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
								<input type="text" name="otp" id="otp" class="form__input" placeholder="otp">
							</div>
							<div class="row">
								 <input type="submit" value="register" name="register" id="register" class="btn btn-block">
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