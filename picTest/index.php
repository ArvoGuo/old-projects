
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="dist/css/bootstrap.min.css"/>
 <script src="dist/js/jquery-1.11.0.min.js"></script>
 <script src="dist/js/bootstrap.min.js"></script>
<title>开始实验</title>
<style >
.display{
  display:none;
}
.padding-top-100{
	padding-top:100px;
}
</style>
<script >
$(document).ready(function(){
	var rand1=Math.floor(Math.random()*10);
	if(rand1>5){
			$('#imgInfo').attr("src","info/1.png");
			$('#fj').attr("value","1.png");
		}else{
			$('#imgInfo').attr("src","info/2.png");
			$('#fj').attr("value","2.png");
			}
	
});
</script>

</head>
<div><span id="time"></span>
</div>
<center><img src="info/1.png"  id = "imgInfo" style="width:600px;" alt="" /></center>
<center class="">
						<form action="preTest.php" method="post">
							
						<input  type="hidden" id="fj" name="fj" value=""/>
							姓名：<input type="text" name ="name"></input>
								年龄：<input type="text" name ="age"></input>
									性别：<input type="text" name ="sex"></input>
									<input  type="submit"/>
							</form>
</center>
</html>1
