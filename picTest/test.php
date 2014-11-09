<?php 

session_start();
$count=1;
if(isset($_GET['x'])){
	if($_GET['x']==257){
	$count = $_GET['x'];}else {
		echo "<script>alert('别作弊,重新开始');location.href='test.php';</script>";
	}
	
}
?>
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

	function timesetStart(){
		$('#begin').hide();
		var counter=6;
		timer=setInterval(function(){
		if(counter--==0){
			clearInterval(timer);
			$('#play').addClass('display');
			start();
			}else{
				document.getElementById('play').innerHTML="开始倒计时："+counter;
				}},1000);
	};
	function timesetParse(){
		$('#play').removeClass('display');
		var counter=6;
		timer=setInterval(function(){
		if(counter--==0){
			clearInterval(timer);
			$('#play').addClass('display');
			return true;
			}else{
				document.getElementById('play').innerHTML="开始倒计时："+counter;
				}},1000);
	};
	var count=<?php echo $count?>;
	$('#time').hide();
	$('#time').html("time:"+i);
	var then;
	var now;
	var ms;
	// for remember count
	var step2 =new Array();
	for(var i=0;i<19;i++){
			step2[i]=0;
		};
	var step4 =new Array();
	for(var i=0;i<9;i++){
		step4[i]=0;
	};
	
	function forStep2(){
		var rand=Math.floor(Math.random()*16+1);

		while(step2[rand]==32){
			rand=Math.floor(Math.random()*16+1);

			};
		step2[rand]++;
		return rand;
		};
	function forStep4(){
		var rand=Math.floor(Math.random()*8+1);

		while(step4[rand]==64){
			rand=Math.floor(Math.random()*8+1);

			};
		step4[rand]++;
		return rand;
		};
	function setImg2(){
			var rand = forStep2();
			$('#step2img').attr("src","step2/"+rand+".jpg");
		};
	function setImg4(){
		var rand = forStep4();
		$('#step4img').attr("src","step4/"+rand+".jpg");
	};


	
	function do1(){
		setTimeout("$('#step1').addClass('display');$('#step2').removeClass('display');",71);
		};
	function do2(){
		setTimeout("$('#step2').addClass('display');$('#step3').removeClass('display');",71+43);
	};
	function do3(){
		setTimeout("$('#step3').addClass('display');$('#step4').removeClass('display');",71+43+71);
	};
	function do4(){
		setTimeout("$('#step5').removeClass('display');",71+43+71);
	};
	function do5(){
		$('#step4').addClass('display');
		$('#step5').addClass('display');
		};
	
	function start(){
		
		$('#time').show();
		$('#time').html("time:"+count);
		$('#step1').removeClass('display');
		setImg2();
		setImg4();
		do1();
		do2();
		do3();
		then = new Date();
		do4();
	
		
	
		
	};
	$('#beginBtn').click(function(){
		timesetStart();
	});

	
	$('.ok').click(function(){
		var ok=$(this).val();
		var pic2=$('#step2img').attr("src");
		var pic4=$('#step4img').attr("src");
				now = new Date();
				ms = now.getTime() - then.getTime();
				$.ajax({
					  type: 'POST',
					  url: "control.php",
					  data: {ok:ok,
					  			ms:ms,
					  			pic2:pic2,
					  			pic4:pic4
					  			},
					 success: function(da){
						if(count==512){
									alert("实验结束");
									location.href="index.php";
									return false;
							}
						if(count==256){
								alert("稍作休息，点击确定继续实验");
								location.href="test.php?x="+(count+1);
								return false;
							}
						count++;
						do5();
						start();
					 }, 
					 dataType: "text"
			});

		

		});
	
});
function keyUp(e) {
    var keycode = e.which;
   // var realkey = String.fromCharCode(e.which);
    //alert("按键码: "+ keycode + " 字符: " + realkey);
    if(keycode==70||keycode==74){
        $('.ok').attr("value",String.fromCharCode(e.which));
    	$('.ok').click();
    	//alert("123");
        }
    if(keycode==32){
    	$('#beginBtn').click();
        }
    
}
document.onkeyup = keyUp;



</script>
</head>
<div><span id="time"></span>
<span id="">姓名：<?php echo $_SESSION['name']?></span>
<span id=""  style="font-size:20px;">规则：<?php echo $_SESSION['note']?></span>
</div>
<center class="padding-top-100">
						
						<!-- 开始按钮 -->
						<div id="begin" >
						<button type="button" id="beginBtn" class="btn btn-primary">按空格键开始实验</button>
						
						
						   
						</div>
						<div id="play"  style="font-size:22px;">
						
						
						
						   
						</div>
						
						<!-- 步骤1 -->
						<div id="step1" class="display">
						step1
						<img src="step1/1.jpg" id="step1img" alt="" />
						</div>
						
						
						<!-- 步骤2 -->
						<div id="step2" class="display">
						step2
						<img src="step2/1.jpg" id="step2img" alt="" />
						</div>
						
						
						<!-- 步骤3 -->
						<div id="step3" class="display">
						step3
						<img src="step3/1.jpg" id="step3img" alt="" />
						</div>
						
						<!-- 步骤4 -->
						<div id="step4" class="display">
						step4
						<img src="step4/1.jpg" id="step4img" alt="" />
						</div >
						
						<!-- 结束按钮选择 -->
						<div id="step5" class="display">
						<button type="button" class="btn btn-primary ok display" value="" >F</button>
						
						</div>
</center>
</html>
