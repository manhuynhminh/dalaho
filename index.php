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
<div class="your_vote">Question: Should we join the next hackathon <br/>(since it is really interesting)?</div>
<form class="data" name="formdata" method="post" action="result.php">
  <div class="gauge_1">
    <div class="indicator_1">
      <div class="bar_second_1"></div>
    </div>
    <div class="your_input">	
      <input class="input_style intput_1" id="your_number" name="your_number" type="number" placeholder="your number" onkeyup="this.value = minmax(this.value, 0, 100)"/>
	  <br/>
	  <input class="btn_createquestion" type="button" value="Create Question" onclick="javascript:CreateQuestion()" />	  
      <input class="btn_submit" type="button" value="Submit" onclick="javascript:ConfirmVote()" />	  	  
    </div>
  </div>
  <?php
	$sum_no = 0;									//% vote 
	$No_vote = 0;									//so nguoi da vote 			
			
	$fp = fopen("database.txt", "r");
	$current_line = fgets($fp);
	$sum_no += $current_line;							//tinh tong cac gia tri co trong file.
	$No_vote += 1;	 
	while (!feof($fp)) {
	  // process current line
	  $current_line = fgets($fp);
	  $sum_no += $current_line;							//tinh tong cac gia tri co trong file.
	  $No_vote += 1;	 
	}
    fclose($fp);		
	
   ?>
</form>
</div>
</body>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
<script type="text/javascript">
	function ConfirmVote()
    {
		var your_number = document.getElementById('your_number');		
		var strconfirm = confirm("You vote: " + your_number.value);
		if (strconfirm == true)
            {				
				<?php
				$sum_no += your_number.value;
				$avg_vote = (int)($sum_no/$No_vote+1);			//tinh trung binh
				?>				
				window.location.replace("http://camto.tk/dalaho/result.php?your_val="+'<?php echo $avg_vote ;?>'+"&no_vote="+'<?php echo $No_vote ;?>');
                return true;
            }
    }
	// CreateQuestion
	function CreateQuestion()
	{
		window.location.replace("http://camto.tk/dalaho/CreateQuestion.html");
	}

	function minmax(value, min, max) 
	{
		if(parseInt(value) < min || isNaN(value)) 
			return 0; 
		else if(parseInt(value) > max) 
			return 100; 
		else return value;
	}

</script>
</html>
