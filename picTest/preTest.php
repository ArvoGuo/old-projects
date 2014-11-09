<?php
 session_start();
 $_SESSION['name']=$_POST['name'];
 
  $_SESSION['age']=$_POST['age'];
  $_SESSION['sex']=$_POST['sex'];
    $_SESSION['fj']=$_POST['fj'];
    
    
    if(!is_numeric($_SESSION['age'])){
    	echo "<script>alert('年龄必须为数字 请重新输入');location.href='index.php';</script>";
    }
       if($_SESSION['fj']=="1.png"){
       	$_SESSION['note']="按F  大于5         ;      按J小于5";
       	
       }
          if($_SESSION['fj']=="2.png"){
       	$_SESSION['note']="按J 大于5        ;       按F小于5";
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
	var count=1;
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
		$('#begin').hide();
		$('#time').show();
		$('#time').html("time:"+count);
		$('#step1').removeClass('display');
		$('#beginBtn').addClass('display');
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
				if(count>32){
					alert("练习结束，稍作休息，点击确定则进入正式实验");
					location.href="test.php";
					}
						count++;
					do5();
					start();

		

		});
	
});
function keyUp(e) {
    var keycode = e.which;
   // var realkey = String.fromCharCode(e.which);
    //alert("按键码: "+ keycode + " 字符: " + realkey);
    if(keycode==70||keycode==74){
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
<span style="font-size:20px;"><?php echo $_SESSION['note']?></span>
</div>
<center class="padding-top-100">
						
						<!-- 开始按钮 -->
						<div id="begin" >
					
						<button type="button" id="beginBtn" class="btn btn-primary ">按空格键开始</button>
						
						
						   
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
						<button type="button" class="btn btn-primary ok display" value="F" >F</button>
						
						</div>
</center>
</html>
