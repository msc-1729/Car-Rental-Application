<?php 
session_start();
include('includes/config.php');
error_reporting(0);
$mail=$_SESSION['login'];
$diff=$_SESSION['diff'];
// $res= $diff->format("%a");
// echo "$res how";
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>What The Cab | promo Listing</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
        

</head>
<body>

 

<!--Header--> 
<?php include('includes/header.php');?>
<!-- /Header --> 

<!--Page Header-->
<section class="page-header listing_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Promo Listing</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li> Listing</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<!--Listing-->
<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="result-sorting-wrapper">
          <div class="sorting-count">
<?php 
//Query for Listing count
// $sql = "SELECT promocode from promo";
// $query = $dbh -> prepare($sql);
// $query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
// $query->execute();
// $results=$query->fetchAll(PDO::FETCH_OBJ);
// $cnt=$query->rowCount();
?>
<p><span> Listings</span></p>
</div>
</div>

<?php
$sql = "SELECT * FROM promo";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
$vhid=$_SESSION['veh'];

// if(isset($_POST['submit']))
// {
// // $l="DELETE FROM payment WHERE (id='$vhid' and email='$mail')";
// // $que =$dbh->prepare($l);
// // if($que->execute())
// // {
//   // header("Location:vehical-details.php");
// //}
// header("Location:promolisting.php");
// //}
// }

$sqll = "SELECT PricePerDay FROM tblvehicles where id='$vhid'";
$queryl = $dbh -> prepare($sqll);
$queryl->execute();
$resultsl=$queryl->fetchAll(PDO::FETCH_OBJ);

session_start();
foreach($resultsl as $resultsh){
$_SESSION['cost']=$resultsh->PricePerDay;
}
$def="SELECT userEmail,COUNT(userEmail) as count FROM tblbooking where userEmail='$mail' GROUP BY userEmail";
$que = $dbh -> prepare($def);
$que->execute();
$res=$que->fetchAll(PDO::FETCH_OBJ);
foreach($res as $riy)
{
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
 
  if($riy->count>$result->number)
    { 
      $kgf=$result->promocode;
      
       $pqr="SELECT * FROM userpromo where email='$mail'";
       $qu=$dbh->prepare($pqr);
       $qu->execute();
       $rs=$qu->fetchAll(PDO::FETCH_OBJ);
      foreach($rs as $ry){ 
      if($ry->$kgf!=1){
      $_SESSION['offer']=$result->offer;   
  ?>
        <div class="product-listing-m gray-bg">
          <div class="product-listing-img"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->promoimg);?>" class="img-responsive" alt="Image" /> </a> 
          </div>
          <div class="product-listing-content">
            <h5>Use Promo Code : <?php echo htmlentities($result->promocode);?> </a></h5>
            <p class="list-price">OFFER : <?php echo htmlentities($result->offer);?>% Per booking</p>
            <p class="list-price">Expires On : <?php echo htmlentities($result->vdate);?></p>

                       <a href="payment.php?promocode=<?php echo htmlentities($result->promocode);?>" class="btn">Apply Promo <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="false"></i></span></a>
          </div>
          

        </div>
      <?php }
      }
      }
    }
  }
 }
    ?>
      <div>
         <a href="payment.php?neta=<?php echo htmlentities($vhid);?>" class="btn">Pay directly <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
         <!-- <button class="btn btn-primary" name="submit" type="submit">BACK</button> -->
         <a class="btn" href="vehical-details.php?vhid=<?php echo htmlentities($vhid);?>">BACK </a>
         <!-- <p class="list-price">Expires On : <?php echo htmlentities($diff);?></p> -->
          </div>
         </div>
         
      
      <!--Side-Bar-->
    <!--   <aside class="col-md-3 col-md-pull-9">
        <div class="sidebar_widget">
          
          <div class="sidebar_filter">
     
          </div>
        </div>

        <div class="sidebar_widget">
          
          <div class="recent_addedcars">
            <ul>

              
            </ul>
          </div>
        </div>
      </aside> -->
      <!--/Side-Bar--> 
    </div>
  </div>
</section>
<!-- /Listing--> 

<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>
