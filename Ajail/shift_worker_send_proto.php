<?php
$yearNow = date("Y");
$monthNow = date("m");
$count = 0;

$month = $monthNow;
$year = $yearNow;

if(isset($_POST["month"])){
	$monthPost = $_POST["month"][0];
	if($month-$monthPost>3){
		$year = $yearNow + 1;
		$month = $monthPost;
	}else if($monthPost==12 && $month==1){
		$year = $yearNow - 1;
		$month = $monthPost;
	}else{
	$month = $monthPost;
	}
}else{
	$monthPost = $month;
}
$prev = $month!=1 ? $monthPost-1 : 12;
$next = $month!=12 ? $monthPost+1 : 1;

$day = num_month($year,$month);
$startDay = date_id($year, $month, 1);
?>



<html>
<head><meta charset="utf8"></head>

<body>
<?php 
$name = $_COOKIE['name'];
echo $name;
echo '<br>'.$year.'年'.$month.'月<br>';
?>



<form method="post" action="">
<?php if($monthNow-$monthPost!=4){	?>
<input type = "submit" name="month[]" value="<?php echo $next; ?>">
<?php }if($monthNow-1!=$monthPost){	?>
<input type = "submit" name="month[]" value="<?php echo $prev; ?>">
</form>
<?php }	?>





<form  method="post"  action="" name="test">

<table border=1>


<?php	
for($i=0, $count=0; $i<$day; $i++, $count++){
	if($count==0)
		echo '<tr>';
	if($i==0){
		for($j=0; $j<$startDay; $j++){
			echo '<td></td>';
			$count++;
		}
	}
	echo '<td><input type="checkbox" name="schedule[]" value='.$i .' >'.($i+1).'</td>';
	if($count==6){
		echo '</tr>';
		$count=-1;
	}
}?>

</table>

<input type="hidden" name="month" value="<?php echo $month; ?>">
<input type="submit" name="submit" value="提出">
</form>

	



</body>
</html>
