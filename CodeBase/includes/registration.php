<?php
//error_reporting(0);
// $password=$_POST['password'];
// $confirm =$_POST['confirmpassword'];
// if($password == $confirm)
// {
if(isset($_POST['signup']))
{
  $amount=0;
$fname=$_POST['fullname'];
$email=$_POST['emailid']; 
$mobile=$_POST['mobileno'];
$password=md5($_POST['password']);
 $confirm =md5($_POST['confirmpassword']);
 if($email == $_SESSION['emailinfirst'])
 {
 if($password==$confirm){
$sql="INSERT INTO  tblusers(FullName,EmailId,ContactNo,Password) VALUES(:fname,:email,:mobile,:password)";
// $sqli="INSERT INTO wallet(amount,email) VALUES(:amount,:email)";
$query = $dbh->prepare($sql);
// $querym = $dbh->prepare($sqli);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
// $querym->bindParam(':amount',$amount,PDO::PARAM_STR);
// $querym->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
// $querym->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Registration successfull. Now you can login');</script>";
$sqli="INSERT INTO wallet(amount,email) VALUES(:amount,:email)";
$querym = $dbh->prepare($sqli);
$querym->bindParam(':email',$email,PDO::PARAM_STR);
$querym->bindParam(':amount',$amount,PDO::PARAM_STR);
$querym->execute();
$sq="INSERT INTO userpromo(email) VALUES(:email)";
$qum = $dbh->prepare($sq);
$qum->bindParam(':email',$email,PDO::PARAM_STR);
$qum->execute();
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
else
{
   echo "<script>alert('Password is not Matching With Confirm Password');</script>";
 }
}
else{
  echo"<script>alert('Email not matching with registered mail');</script>";
}
}
?>


<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<!-- <script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script> -->
<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Sign Up</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form  method="post" name="signup" >
                <div class="form-group">
                  <input type="text" class="form-control" name="fullname" placeholder="Full Name" pattern="[a-zA-Z ]+" title="enter your name" required="required">
                </div>
                      <div class="form-group">
                  <input type="text" class="form-control" name="mobileno" placeholder="Mobile Number" maxlength="10" pattern="[0-9]{10}" title = "enter a valid ten digit number" required="required">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" pattern = "[a-z0-9A-Z_-.]+[@]{1}[a-z]+[.]{1}com" title="enter a valid email with extension .com" required="required">
                   <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="must contain atleast one number one uppercase and one lower case letters, and atleast 8 or more characaters" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="must contain atleast one number one uppercase and one lower case letters, and atleast 8 or more characaters" required="required">
                </div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="terms_agree" required="required" checked="">
                  <label for="terms_agree">I Agree with <a href="#">Terms and Conditions</a></label>
                </div>
                <div class="form-group">
                  <input type="submit" value="Sign Up" name="signup" id="submit" class="btn btn-block">
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Already got an account? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login Here</a></p>
      </div>
    </div>
  </div>
</div>