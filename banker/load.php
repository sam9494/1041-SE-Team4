
<?php
	require("config.php");
	
	
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<script src="jquery.js" type="text/javascript"></script>
<script type="text/javascript">
function myFunction(i,t,p,e,m) {
	//setTimeout('alertFunc()', 3000);
     setTimeout("update("+ i + "," + p + "," + e + "," + m + ")", t);
	
}
function alertFunc() {
  alert("Hello!");
}

function update(i,p,e,m) {
	
  	DIV='mainDiv';
$.ajax({
		url: '01-update.php',
		dataType: 'html',
		type: 'POST',
		data: { bi: i , price: p , exp: e, material: m },
		error: function(xhr) {
			$('#'+DIV).html(xhr);
			},
		success: function(response) {
			$('#'+DIV).html(response); //set the html content of the object msg
			}
	});
}

function loadlist() {
	DIV='div001';
$.ajax({
		url: '02.list.php',
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
<?php
	
	echo "<script>loadlist();</script> ";
?>
<body>



<div id='div001'></div>
<div id='mainDiv'></div>


</body>
</html>
