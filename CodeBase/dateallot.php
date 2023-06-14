<?php 
  
// Declare two dates 

$date1=date_create("2020-03-28");
$date2=date_create("2020-04-03");
$diff=date_diff($date1,$date2);
$res= $diff->format("%a");
echo $res;

?> 
<html>
	<head>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	  	<script>
	  		$( function() {
	   			$( "#shootdate" ).datepicker({
	   				minDate: 0
	   			});
	  		});
	  	</script>
          // Get today's date
          <script>
var today = new Date();

$("#datepicker").datepicker({
    changeMonth: true,
    changeYear: true,
    minDate: today // set the minDate to the today's date
    // you can add other options here
    </script>
});
	</head>
    <body>
    	<label for="shootdate">Desired Date:</label>
    	<input required type="text" name="shootdate" id="shootdate" title="Choose your desired date" />
        <p>Date:<input type="text" id="datepicker"></p>
    </body>
</html>