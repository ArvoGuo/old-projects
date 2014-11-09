<?php 
$gid= $_GET['gid'];
$good = new good();
$info = $good->getGOne($gid);

?>

<div class="goodDetailMain  center">
	<!-- 位置 -->
	<!-- 左边 -->
	<div class="left detailLeft ">
			<!-- 产品明细 -->
				<div class=" detailSmall  "><?php echo "<pre>"."产品明细</br>名称：</br>".$info['GNAME']."</br>"."风格：</br>".$info['GSTYLE']?></div>
				<div class="detailSmall  "><pre>产品评价：</br>很美，质量很好</pre></div>
			<!-- 产品评价 -->
	</div>
	<!-- 中间 -->
	<div class="left detailMiddle ">
	<img src="http://115.28.133.116/other/Doha/upload_file/<?php echo $info['GPIC0']?>" class ="DetailMainPic bigPic"/>
	</div>
	<!-- 右边 -->
	<div class="left detailRight ">
			<!-- 轮播 -->
								<!--  轮播动画开始  -->
								<div id="slider">
										<!-- 切换区域开始 -->
   													 <div class="child" style="display: block; top: 130px;">
   													 <!--200 *130 -->
    														<a href="javascript:;" target="_blank">
    																<img src="http://115.28.133.116/other/Doha/upload_file/<?php echo $info['GPIC1']?>" alt=""  class="DetailSmallPic smallPic"/>
    																<img src="http://115.28.133.116/other/Doha/upload_file/<?php echo $info['GPIC2']?>" alt=""  class="DetailSmallPic smallPic"/>
    																<img src="http://115.28.133.116/other/Doha/upload_file/<?php echo $info['GPIC3']?>" alt=""  class="DetailSmallPic smallPic"/>
    														</a>
   													 </div>
    												<div class="child">
    														<a href="javascript:;" target="_blank">
    																<img src="http://115.28.133.116/other/Doha/upload_file/<?php echo $info['GPIC4']?>" alt="" class="DetailSmallPic smallPic" />
    																<img src="http://115.28.133.116/other/Doha/upload_file/<?php echo $info['GPIC5']?>" alt="" class="DetailSmallPic smallPic" />
    																<img src="http://115.28.133.116/other/Doha/upload_file/<?php echo $info['GPIC6']?>" alt=""  class="DetailSmallPic smallPic"/>
    														</a>
   													 </div>
   													
   													 <!-- 切换区域结束 -->
														<!-- 触发器 -->
   														 <div id="slider-img"></div>
  															  <!-- 上下翻页切换按钮 -->
  																  <div id="btn_prev" class="glyphicon glyphicon-chevron-up"></div>
																  <div id="btn_next" class="glyphicon glyphicon-chevron-down"></div>
							</div>
							<!--  轮播动画结束  -->
	</div>
	<div style="clear:both;"></div>
</div>
<!-- 按钮 -->
<div class="submitBtn">
	<a href="goodDetailSubmit.php?gid=<?php echo $gid ?>" style="color:white;"><button type="button " class="btn btn-primary ">定制</button></a>
</div>