			
			<?php 
			$login="<a href='login.php'>登陆</a>";
			if($_SESSION['customer']!=""){
				$login=$_SESSION['customer'];
				$login.="/<a href='logout.php'>退出</a>";
			}
			?>
			<!-- login -->
						<div class="">
								<span class="right"><?php echo $login?>/
								<a href="reg.php">注册</a></span>
								<div class="clear"></div>
						</div>
						
<!-- navbar -->
<div >
<nav class="navbar navbar-default " role="navigation">
  <div class="navbar-header">
  <a class="navbar-brand" href="#"> 
    </a>
    <a class="navbar-brand" href="index.php">帆逗商城
    </a>
  </div>
  <ul class="nav navbar-nav">
      <li><a href="order.php">O2O定制</a></li>
       <li><a href="interact.php">互动吧</a></li>
        <li><a href="myOrder.php">我的定制屋</a></li>
         <li><a href="#">最新资讯</a></li>
          <li><a href="#">关于我们</a></li>
      
    </ul>
<form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="搜索"/>
      </div>
      <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
    </form>
</nav>
</div>
