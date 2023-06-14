<!DOCTYPEhtml>
<html>
<head>
<script src="https://code.jquery.com/jquery-2.2.4.js" ></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" rel="stylesheet">
<style> form{width:40%;margin: 150px auto;}</style>
<script>
$(documnet).ready(function(){
    var minDate= new Date();
    $("#pick").datepicker({

        showAnim: 'drop',
        numberOfMonth: 1,
        minDate:minDate,
        dateFormat: 'dd/mm/yy',
        onClose: function (selectedDate)
        {
            $('#drop').datepicker("option","minDate",selectedDate);


        }
    });
    $("#drop").datepicker({

        showAnim: 'drop',
        numberOfMonth: 1,
        minDate:minDate,
        dateFormat: 'dd/mm/yy',
        onClose: function (selectedDate)
    {
            $('#pick').datepicker("option","minDate",selectedDate);


        }
    });



});


</script>

<title>title</title>
</head>
<body>
<form method="POST" action="">
<input type="text" id="pick" placeholder="pick">
<input type="text" id="drop" placeholder="drop">

<input type="submit" value="search">

</form>


</body>
</html>
