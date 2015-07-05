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
	<div class="dvNoOfAnswer">
		<label id="lblNoOfVote" class="label_1"/>
	</div>
	<div class="dvContact">
		<label id="lblContact" class="label_2" value = "Email/ Facebook: manglefund@gmail.com <br/>"/>
	</div>
	<div class="dvContact1">		
		<label id="lblContact1" class="label_2" value = "0938583990 (Man)"/>
	</div>
	</div>
  </div>
</div>
</body>
<script src='js/jquery.min.js'></script>
<script src="js/index.js"></script>
<script>
	$(document).ready(function ()
	{
		var val = getParameterByName('your_val');		
		var noOfVote = getParameterByName('no_vote');		
		if(val=="") val = 80;	
		
		angle = (val/100)*180;
    
		$('.indicator_1').css({
			transform: 'rotate(' + angle + 'deg)'
		});
		
		document.getElementById('lblReport').innerHTML = val+'%' +'<br/>';
		document.getElementById('lblNoOfVote').innerHTML = "No Of Answer:  " +noOfVote;
		document.getElementById('lblContact').innerHTML = "Email/ Facebook: manglefund@gmail.com <br/>";
		document.getElementById('lblContact1').innerHTML = "0938583990 (Man)";
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
