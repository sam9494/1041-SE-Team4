<?php
require("config.php");
$id=1;

$userid=(int)$_SESSION['uid'];
$sql="select * from stock where userid=" . $userid;
if ($results=mysqli_query($conn,$sql) ) {
	$rs=mysqli_fetch_array($results);
	$ma=$rs['Material'];
	
}


$oven1=$_SESSION['oven1'];
if($oven1==0){
	
	

	$sql="select * from information where breadid=" . $id;
	if ($results=mysqli_query($conn,$sql) ) {
		$rs=mysqli_fetch_array($results);
		$timeout=(int)$rs['timeout'];
		$price=(int)$rs['price'];
		$exp=(int)$rs['exp'];
		$Material=(int)$rs['Material'];
	
	
	
?>
<script src="jquery.js" type="text/javascript"></script>
<script type="text/javascript">
function myFunction(i,t,p,e,m) {
	//setTimeout('alertFunc()', 3000);
     setTimeout("update("+ i + "," + p + "," + e + "," + m + ")", t);
	
}
function alertFunc() {
  alert("已經在烤了啦！!");
}
function alertFuncb() {
  alert("材料包不足!");
}

function update(i,p,e,m) {
	
  	
$.ajax({
		url: '01-update.php',
		dataType: 'html',
		type: 'POST',
		data: { bi: i , price: p , exp: e, material: m },
		/*
		error: function(xhr) {
			$('#'+DIV).html(xhr);
			},
		success: function(response) {
			$('#'+DIV).html(response); //set the html content of the object msg
			}
			*/
			error: function(xhr) {
			alert(xhr);
			loadlist();
			},
		success: function(response) {
//			$('#'+DIV).html(response); //set the html content of the object msg
			loadlist();
			}
	});
}
</script>


<?php
		if($ma>=$Material){
			echo "<script>myFunction($id,$timeout,$price,$exp,$Material);</script> "; 
			$_SESSION['oven1']=1;
		}
		else{
			echo "<script>alertFuncb();</script> ";
		}

	}
}
else{
	echo "<script>alertFunc();</script> ";
}
?>