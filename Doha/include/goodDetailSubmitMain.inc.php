<?php 
$gid = $_GET['gid'];
$_SESSION['lastgid']=$gid;
if($_SESSION['customer']==""){
	$_SESSION['flag']="loginout";//未登录标记
		echo "<script>location.href='login.php';</script>";
   		exit();
}
$good = new good();
$userlogin = new userlogin();
$user = new user();
$info = $good->getGOne($gid);
$customer=$_SESSION['customer'];
$userone = $userlogin->getOneUid($customer);
$uid = $userone['UID'];
$userinfo = $user->getUOne($uid);//get userinfo
if($_POST['sub']=="sub"){
	$data = new stdClass();
	date_default_timezone_set ( 'PRC' );
	$data->ocreatedate= date ( 'Y-m-d H:i:s' );
	$data->ouname = $_POST['name'];
	$data->ogid = $_POST['gid'];
	$data->ouid = $uid;
	$data->oaddress = $_POST['address'];
	$data->ogprice = $_POST['gprice'];
	
	$data->obookdate = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
	$data->obookservice = $_POST['service'];
	$data->opostselect = $_POST['postselect'];
	$data->ogift = $_POST['gift'];
	$data->oprovince=$_POST['getterprovince'];
	$data->ocity=$_POST['gettercity'];
	$data->oarea=$_POST['getterarea'];
	if($data->ogift=="无偿体型测量机会"){
		$data->ogpricepre = $_POST['gprice']*0.9;
	}else if($data->ogift=="额外设计服务机会"){
		$data->ogpricepre = $_POST['gprice']*0.8;
	}else {
		$data->ogpricepre = $_POST['gprice'];
	}
	
	
	$shoporder= new shopOrder();
	$shoporder->insert($data);
	echo "<script>alert('订单提交成功!请等待工作人员与您联系');</script>";
	
}



?>

<div class="width902  center">
	<!-- 位置 -->
			<!-- 上边标题 -->
			<div class="width902 height-40  "></div>
			<!-- 左边 -->
			<div class="height-400  width-300 left">
						<!-- 图片 -->
						<img alt="" src="http://115.28.133.116/other/Doha/upload_file/<?php echo $info['GPIC0']?>" class="width-300 height-300">
						<!-- 编号 --><div class="alert alert-danger" >
						<span>编号:<?php echo $info['GID']?></span>
						<!-- 价格 -->
						<span>------价格:<?php echo $info['GPRICE']?></span>
			</div>
			</div>
			<!-- 右边 -->
			<div class="  width-600 left ppre" style="height:352px;">
						<!-- 表单 -->
						<form action="goodDetailSubmit.php?gid=<?php echo $gid?>" method="post">
								<input type="hidden" name="gid" value="<?php echo $info['GID']?>"></input>
								<input type="hidden" name="gprice" value="<?php echo $info['GPRICE']?>"></input>
								<dl>
										<dd>姓　　名：<input type="text"  name ="name" class="input" value="<?php echo $userinfo['UNAME']?>"/></dd>
										<dd>电　　话：<input type="text"  name ="tel"  class="input" value="<?php echo $userinfo['UTEL']?>"/></dd>
										<dd>预约地址：<select id="getterprovince" name="getterprovince" class=""></select>
													 <select id="gettercity" name="gettercity" class=""></select>
													 <select id="getterarea" name="getterarea" class=""></select></dd>
										<dd>详细地址：<textarea name = "address"></textarea></dd>			 
										<dd><span class="left">预约时间：</span>
												<!-- 时间选择控件 -->
													 <div id="dateSelector1" class="left">
															<SELECT id="idYear" name="year"></SELECT>年 
															<SELECT id="idMonth" name="month"></SELECT>月 
															<SELECT id="idDay" name="day"></SELECT>日
													</div> 
													<div class="clear"></div>
											    <!-- 时间选择控件结束 -->
										</dd>
										<dd>预约服务：<select name="service"><option>量体</option><option>设计</option></select></dd>
										<dd>配送选择：<select name="postselect"><option> 自取</option><option>快递</option></select>
									   </dd>
										
										<dd>礼包兑换：<select name="gift">
																	<?php if($userinfo['UMEASUREMENTTIME']>0){
																						echo "<option> 无偿体型测量机会</option>";
																				}
																				if($userinfo['UMEASUREMENTTIME']>0){
																						echo "<option> 额外设计服务机会</option>";
																				}
																				if($userinfo['UMEASUREMENTTIME']==0&&$userinfo['UMEASUREMENTTIME']==0){
																						echo "<option> 无可兑换礼包</option>";
																				}
																				
																					?>
																</select>
										</dd>
								</dl>
						
								<!-- 提交 -->
					   					 <div class="submitBtn">
												<button type="button " class="btn btn-primary" name="sub" value="sub">提交</button>
										</div>
						<!-- 表单结束 -->
						</form>
			</div>
					<div class="clear"></div>    		
			</div>

