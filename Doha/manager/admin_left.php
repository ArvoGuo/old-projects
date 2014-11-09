<?php 
//session_start();
//if ($_SESSION['manager']==""){
//	echo "<script type='text/javascript'>alert('ILLEGAL！');location.href='index.php';</script>";
//		exit();
//}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.css"/>
<title>Dz</title>

<style >
body{
	background-color:#FDF7F7;
}
dd{
	margin-left:50px;
	margin-top:10px;
}
</style>
</head>
<body>
				<div id = "leftselect">
					<dl>
							<dd><button type="button" class="btn btn-danger" disabled="disabled">商品管理</button></dd>
							
										<dd><a href="admin_good.php?op=add" target="main"><button type="button" class="btn btn-default" >添加商品</button></a></dd>
										<dd><a href="admin_good.php?op=search" target="main"><button type="button" class="btn btn-default" >查询商品</button></a></dd>
							</br>
							<dd><button type="button" class="btn btn-danger" disabled="disabled">用户管理</button></dd>
										<dd><a href="admin_user.php?type=2" target="main"><button type="button" class="btn btn-default" >潜在客户</button></a></dd>
										<dd><a href="admin_user.php?type=0" target="main"><button type="button" class="btn btn-default" >普通客户</button></a></dd>
										<dd><a href="admin_user.php?type=1" target="main"><button type="button" class="btn btn-default" >VIP-客户</button></a></dd>
							</br>
							<dd><button type="button" class="btn btn-danger" disabled="disabled">订单管理</button></dd>
										
										<dd><a href="admin_order.php?op=search" target="main"><button type="button" class="btn btn-default" >查询订单</button></a></dd>
										<dd><button type="button" class="btn btn-default" >管理订单</button></dd>
					</dl>
				</div>
</body>				
</html>

 <script src="../dist/js/jquery-1.11.0.min.js"></script>
 <script src="../dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	$('div#leftselect .btn').click(function(){
		if($('div#leftselect  .btn').hasClass('btn-primary')){
				$('div#leftselect  .btn-primary').addClass('btn-default').removeClass('btn-primary');
			
			}
		$(this).removeClass('btn-default').addClass('btn-primary');
		
		});
	
});

</script>