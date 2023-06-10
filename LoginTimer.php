<?php 
	session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <style>
 	p
 	{
 		text-align: center;
 		font-size: 30px;
 		margin-top: 0px;
 		font-color: lavenderblush;
 		font-style: italic
 		
 	}
</style>
 <body>
 	<p id="Timer"></p> 
 	<script>
 		var month =new Date().getMonth()+1;
 		var hour=new Date().getHours();
 		var day=new Date().getDate();
 		var year=new Date().getFullYear();
 		var minutes=new Date().getMinutes()+10;
 		var second=new Date().getSeconds();
 		var time=hour + ":" + minutes + ":" + second;
 		var ResetTime=new Date(month + " " + day + " " + year + " " + time).getTime();
 		var x= setInterval(function()//1000 milliseconds = 1 second
 		{
 			var now=new Date().getTime();
 			var distance= ResetTime - now;
 			var minutes= Math.floor((distance % (1000 * 60 * 60))/ (1000 * 60));//the largest integer less than or equal to a given number.
 			var seconds= Math.floor(( distance % (1000 * 60))/ 1000);
 			document.getElementById("Timer").innerHTML = "<h1>Please try again </h1>" + minutes + "m " + seconds + "s ";
 		if (distance<=0)
 		{
 			clearInterval(x);
 			document.getElementById("Timer").innerHTML="";
 			location="Login.php";
 		}
 	},1000); 
 	</script>
 
 </body>
 </html>