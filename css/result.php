<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<title>Vote</title>
</head>

<body>
<div class="wrapp">
<div class="total_vote">Total Vote</div>

  <div class="gauge_1">
    <div class="indicator_1">
      <div class="bar_second_1"></div>
    </div>
	<div class="total_input">
      		<label id="lblReport" class="label_style" value = ""/>
    </div>         
  </div>
</div>
</body>

<?php
	$sum_no = 0;									//% vote 
	$No_vote = 0;									//so nguoi da vote 
	$db_temp = fopen("database.txt" , "a+");			//tao file database.txt
	foreach($_POST as $variable => $value)			//ghi data vao file sau moi lan submit
	{
		fwrite($db_temp, $value);
		fwrite($db_temp,"\n");
	}
	exit;
	fclose($db_temp);								//ket thuc ghi
	
	$calc = fopen("database.txt",'r');				//doc file
	while (!foef($calc))							
	{
		//echo fgetc($calc);
		$temp = (int)fgets($calc);					//doc the tung dong
		$sum_no += $temp;							//tinh tong cac gia tri co trong file.
		$No_vote += 1;
		//echo $sum_no.$No_vote."\n";
	}
	$avg_vote = (int)($sum_no/$No_vote);			//tinh trung binh
	//echo $avg_vote."\n";
	//fwrite($db_temp, $avg_vote);
	fclose($calc);									//ket thuc doc
?>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
<script>
	$(document).ready(function ()
	{
		var val = getParameterByName('your_number');
		if(val=="") return;
		angle = (val/100)*180;
    
		$('.indicator_1').css({
			transform: 'rotate(' + angle + 'deg)'
		});
		
		document.getElementById('lblReport').innerHTML = val+'%'
	});
	
	function getParameterByName( name ) //courtesy Artem
	{
	  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
	  var regexS = "[\\?&]"+name+"=([^&#]*)";
	  var regex = new RegExp( regexS );
	  var results = regex.exec( window.location.href );
	  if( results == null )
		return "";
	  else
		return decodeURIComponent(results[1].replace(/\+/g, " "));
	}
</script>
</html>
