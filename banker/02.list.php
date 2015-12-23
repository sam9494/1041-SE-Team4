
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<script src="jquery.js" type="text/javascript"></script>
<script type="text/javascript">



function bake() {
	DIV='mainDiv';
$.ajax({
		url: 'bake.php',
		dataType: 'html',
		type: 'POST',
		
		error: function(xhr) {
			$('#'+DIV).html(xhr);
			},
		success: function(response) {
			$('#'+DIV).html(response); //set the html content of the object msg
			}
	});
}

function viewstock() {
	DIV='mainDiv';
$.ajax({
		url: '01-viewstock.php',
		dataType: 'html',
		type: 'POST',
		
		error: function(xhr) {
			$('#'+DIV).html(xhr);
			},
		success: function(response) {
			$('#'+DIV).html(response); //set the html content of the object msg
			}
	});
}
</script>
<body>



<?php
	require("config.php");
	$userid=(int)$_SESSION['uid'];
$sql="select * from stock where userid=" . $userid;
if ($results=mysqli_query($conn,$sql) ) {
	$rs=mysqli_fetch_array($results);
	$lv=$rs['lv'];
	
	$money=$rs['money'];
	$ma=$rs['Material'];
	}
	echo "等級：";
	echo $lv;
	
	echo "   金錢:";
	echo $money;
	echo "   材料包";
	echo $ma;
	echo '<br>'

?>
<input type="image" src="oven.jpg"  onclick="bake();" />
<button onclick="bake()">Try it</button>
<button onclick="viewstock()">viewstock</button>
<hr>
</body>
</html>
