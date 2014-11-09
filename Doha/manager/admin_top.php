<?php 
require '../include/include.inc.php';
//if ($_SESSION['manager']==""){
//	echo "<script type='text/javascript'>alert('ILLEGAL！');location.href='index.php';</script>";
//		exit();
//}
?>
<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.css"/>
<body style="padding-top:0px;background-color:#EED3D7;">
<div >

<div class=""></div>

<ul class="nav nav-pills pull-right">
  <li class="active"><a href="#">您好！管理员<?php echo  $_SESSION['manager']?></a></li>
  <li><a href="admin_main.php" target="main" style="text-decoration:none;">后台首页</a></li>
  <li><a href="admin_logout.php" target="_parent" style="text-decoration:none">退出后台</a></li>
</ul>


</div>
</body>