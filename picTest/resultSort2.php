<?php require 'mysql.php';

$all= new info();
$list = array();
if(isset($_GET['NAME'])){
	$list =$all->findSomeOne($_GET['NAME']);

}else {
	$list=$all->findAll();
}

$A1=array();
$A2=array();
$B1=array();
$B2=array();
$C1=array();
$C2=array();

	



function pic2($pic){
	$picName="";
	switch ($pic){
		case "step2/1.jpg":$picName="1";break;
		case "step2/2.jpg":$picName="2";break;
		case "step2/3.jpg":$picName="3";break;
		case "step2/4.jpg":$picName="4";break;
		case "step2/5.jpg":$picName="6";break;
		case "step2/6.jpg":$picName="7";break;
		case "step2/7.jpg":$picName="8";break;
		case "step2/8.jpg":$picName="9";break;
		case "step2/9.jpg":$picName="一";break;
		case "step2/10.jpg":$picName="二";break;
		case "step2/11.jpg":$picName="三";break;
		case "step2/12.jpg":$picName="四";break;
		case "step2/13.jpg":$picName="六";break;
		case "step2/14.jpg":$picName="七";break;
		case "step2/15.jpg":$picName="八";break;
		case "step2/16.jpg":$picName="九";break;
		
	}
	return $picName;
	
}
function pic4($pic){
	$picName="";
	switch ($pic){
		case "step4/1.jpg":$picName="1";break;
		case "step4/2.jpg":$picName="4";break;
		case "step4/3.jpg":$picName="6";break;
		case "step4/4.jpg":$picName="9";break;
		case "step4/5.jpg":$picName="一";break;
		case "step4/6.jpg":$picName="四";break;
		case "step4/7.jpg":$picName="六";break;
		case "step4/8.jpg":$picName="九";break;
		
	}
	return $picName;
	
}
function rule($pic){
	$picName="";
	switch ($pic){
		case "1.png":$picName="F:大于5；J小于5";break;
		case "2.png":$picName="F:小于5；J大于5";break;
	}
	return $picName;
	
}

function echoOne($list){
	echo "<table class='table table-hover tableOrder'>";
	//echo "<th>姓名</th><th>性别</th><th>年龄</th><th>第二步</th><th>第四步</th><th>点击</th><th>耗时</th><th>规则</th>";
	echo "<th>性别</th><th>年龄</th><th>第二步</th><th>第四步</th><th>点击</th><th>耗时</th><th>规则</th>";	
	foreach ($list as $key){
		echo "<tr>";
	//	echo "<td>".$key['NAME']."</td>";
	echo "<td>".$key['SEX']."</td>";
		echo "<td>".$key['AGE']."</td>";
		echo "<td>".pic2($key['PIC2'])."</td>";
		echo "<td>".pic4($key['PIC4'])."</td>";
		echo "<td>".$key['BTN']."</td>";
		echo "<td>".$key['MS']."</td>";
		echo "<td>".rule($key['FJ'])."</td>";
		echo "</tr>";
		
	}
	echo "</table>";
}
function echoTwo($A,$B){
	$list=array();
			foreach ($A as $keyA){
					foreach ($B as $keyB){
						if($keyB['ID']==$keyA['ID']){
							$list[]=$keyA;
						}
				
					}
			}
  return $list;	
}
function echoThree($A,$B,$C){
		$list=array();
		$listAB=echoTwo($A,$B);
			foreach ($listAB as $keyAB){
					foreach ($C as $keyC){
						if($keyC['ID']==$keyAB['ID']){
							$list[]=$keyAB;
						}
				
					}
			}
	return $list;
	
}


foreach ($list as $key){
$pic2=pic2($key['PIC2']);
$pic4=pic4($key['PIC4']);
//A1
		if(
		$pic2=="2"||
		$pic2=="3"||
		$pic2=="7"||
		$pic2=="8"||
		$pic2=="二"||
		$pic2=="三"||
		$pic2=="七"||
		$pic2=="八"
		){
			$A1[]=$key;
		}
		
		//a2
if(
		$pic2=="1"||
		$pic2=="4"||
		$pic2=="6"||
		$pic2=="9"||
		$pic2=="一"||
		$pic2=="四"||
		$pic2=="六"||
		$pic2=="九"
		){
			$A2[]=$key;
		}
		//B1
if(
		(($pic2=="1"||
		$pic2=="2"||
		$pic2=="3"||
		$pic2=="4"||
		$pic2=="6"||
		$pic2=="7"||
		$pic2=="8"||
		$pic2=="9")&&
		($pic4=="1"||
		$pic4=="4"||
		$pic4=="6"||
		$pic4=="9"
		))||(
		($pic2=="一"||
		$pic2=="二"||
		$pic2=="三"||
		$pic2=="四"||
		$pic2=="六"||
		$pic2=="七"||
		$pic2=="八"||
		$pic2=="九")&&
		($pic4=="一"||
		$pic4=="四"||
		$pic4=="六"||
		$pic4=="九"
		)
		)
		
		){
			$B1[]=$key;
		}
		//B2
if(
		(($pic2=="1"||
		$pic2=="2"||
		$pic2=="3"||
		$pic2=="4"||
		$pic2=="6"||
		$pic2=="7"||
		$pic2=="8"||
		$pic2=="9")&&
		($pic4=="一"||
		$pic4=="四"||
		$pic4=="六"||
		$pic4=="九"
		))||(
		($pic2=="一"||
		$pic2=="二"||
		$pic2=="三"||
		$pic2=="四"||
		$pic2=="六"||
		$pic2=="七"||
		$pic2=="八"||
		$pic2=="九")&&
		($pic4=="1"||
		$pic4=="4"||
		$pic4=="6"||
		$pic4=="9"
		)
		)
		
		){
			$B2[]=$key;
		}
		//c1
	if(
		(($pic2=="1"||
		$pic2=="2"||
		$pic2=="3"||
		$pic2=="4"||
		$pic2=="一"||
		$pic2=="二"||
		$pic2=="三"||
		$pic2=="四")&&
		($pic4=="一"||
		$pic4=="四"||
		$pic4=="1"||
		$pic4=="4"
		))||(
		($pic2=="6"||
		$pic2=="7"||
		$pic2=="8"||
		$pic2=="9"||
		$pic2=="六"||
		$pic2=="七"||
		$pic2=="八"||
		$pic2=="九")&&
		($pic4=="六"||
		$pic4=="九"||
		$pic4=="6"||
		$pic4=="9"
		)
		)
		
		){
			$C1[]=$key;
		}
		//c2
	if(
		(($pic2=="1"||
		$pic2=="2"||
		$pic2=="3"||
		$pic2=="4"||
		$pic2=="一"||
		$pic2=="二"||
		$pic2=="三"||
		$pic2=="四")&&
		($pic4=="6"||
		$pic4=="9"||
		$pic4=="六"||
		$pic4=="九"
		))||(
		($pic2=="6"||
		$pic2=="7"||
		$pic2=="8"||
		$pic2=="9"||
		$pic2=="六"||
		$pic2=="七"||
		$pic2=="八"||
		$pic2=="九")&&
		($pic4=="1"||
		$pic4=="4"||
		$pic4=="一"||
		$pic4=="四"
		)
		)
		
		){
			$C2[]=$key;
		}
}

	
	class runtime
{
    var $StartTime = 0;
    var $StopTime = 0;
 
    function get_microtime()
    {
        list($usec, $sec) = explode(' ', microtime());
        return ((float)$usec + (float)$sec);
    }
 
    function start()
    {
        $this->StartTime = $this->get_microtime();
    }
 
    function stop()
    {
        $this->StopTime = $this->get_microtime();
    }
 
    function spent()
    {
        return round(($this->StopTime - $this->StartTime) * 1000, 1);
    }
 
}

	//get time 
	function getAve($list){
		$count = count($list);//getcount
		$time = 0;
		foreach ($list  as $key ) {
			$time+=$key['MS'];
		}
		return $time/$count;
	}
	//get right
	function getRightPercent($list){
		$result= array();
		$count = count($list);
		$rule=$list[0]['FJ'];
		$rightCount=0;
		if($rule=="1.png"){//case "1.png":$picName="F:大于5；J小于5";break;
		      foreach ($list as $key ) {
		      	$pic4=pic4($key['PIC4']);
		      	 if($key['BTN']=="F"){
		      	 	if($pic4=="六"||$pic4=="九"||$pic4=="6"||$pic4=="9"){
		      	 		$rightCount++;
		      	 	}
		      	 }
		      	 if($key['BTN']=="J"){
		      	 	if($pic4=="1"||$pic4=="4"||$pic4=="一"||$pic4=="四"){
		      	 		$rightCount++;
		      	 	}
		      	 }
		      }
		

		}
		if($rule =="2.png"){//case "2.png":$picName="F:小于5；J大于5";break;
			 foreach ($list as $key ) {
		      	$pic4=pic4($key['PIC4']);
		      	 if($key['BTN']=="J"){
		      	 	if($pic4=="六"||$pic4=="九"||$pic4=="6"||$pic4=="9"){
		      	 		$rightCount++;
		      	 	}
		      	 }
		      	 if($key['BTN']=="F"){
		      	 	if($pic4=="1"||$pic4=="4"||$pic4=="一"||$pic4=="四"){
		      	 		$rightCount++;
		      	 	}
		      	 }
		      }	

		}
		$result['count']=$count;
		$result['rightCount']=$rightCount/$count;
		return $result;

	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>
<div id="btn">
<dl>
	<?php 
				if(isset($_GET['NAME'])){
					$name = $_GET['NAME'];

	?>
							
								<dd >
							<a href="resultSort2.php?type=A1B1C1&NAME=<?php echo $name?>"><button type="button" class="btn btn-default" id="">A1B1C1</button></a>
					    	<a href="resultSort2.php?type=A1B2C1&NAME=<?php echo $name?>"><button type="button" class="btn btn-default" id="">A1B2C1</button></a>
							<a href="resultSort2.php?type=A1B1C2&NAME=<?php echo $name?>">	<button type="button" class="btn btn-default" id="">A1B1C2</button></a>
							<a href="resultSort2.php?type=A1B2C2&NAME=<?php echo $name?>">	<button type="button" class="btn btn-default" id="">A1B2C2</button></a>
							<a href="resultSort2.php?type=A2B1C1&NAME=<?php echo $name?>">	<button type="button" class="btn btn-default" id="">A2B1C1</button></a>
							<a href="resultSort2.php?type=A2B2C1&NAME=<?php echo $name?>">	<button type="button" class="btn btn-default" id="">A2B2C1</button></a>
							<a href="resultSort2.php?type=A2B1C2&NAME=<?php echo $name?>">	<button type="button" class="btn btn-default" id="">A2B1C2</button></a>
							<a href="resultSort2.php?type=A2B2C2&NAME=<?php echo $name?>">	<button type="button" class="btn btn-default" id="">A2B2C2</button></a>
							</dd>
							
							




	<?php
				}else {
	?>
							
								<dd >
							<a href="resultSort2.php?type=A1B1C1"><button type="button" class="btn btn-default" id="">A1B1C1</button></a>
					    	<a href="resultSort2.php?type=A1B2C1"><button type="button" class="btn btn-default" id="">A1B2C1</button></a>
							<a href="resultSort2.php?type=A1B1C2">	<button type="button" class="btn btn-default" id="">A1B1C2</button></a>
							<a href="resultSort2.php?type=A1B2C2">	<button type="button" class="btn btn-default" id="">A1B2C2</button></a>
							<a href="resultSort2.php?type=A2B1C1">	<button type="button" class="btn btn-default" id="">A2B1C1</button></a>
							<a href="resultSort2.php?type=A2B2C1">	<button type="button" class="btn btn-default" id="">A2B2C1</button></a>
							<a href="resultSort2.php?type=A2B1C2">	<button type="button" class="btn btn-default" id="">A2B1C2</button></a>
							<a href="resultSort2.php?type=A2B2C2">	<button type="button" class="btn btn-default" id="">A2B2C2</button></a>
							</dd>
							
							

	<?php
				}

	?>

</dl>
	
</div>
		<div>


		</div>	
<div id="all">
<?php 
$type=$_GET['type'];
$run_time = new runtime();
$run_time->start();
//begin your code
echo $type;
echo "</br>平均时间：";
switch ($type){
	case "A1B1C1": 
		
		$list = echoThree($A1,$B1,$C1);
		echo getAve($list);
		$result= getRightPercent($list);
		echo "</br>符合条件的记录条数：".$result['count'];
		echo "</br>正确率：";
		echo $result['rightCount']."%"."</br>";
		echoOne($list);
		break;
		case "A1B2C1": 
		$list = echoThree($A1,$B2,$C1);
		echo getAve($list);
		$result= getRightPercent($list);
		echo "</br>符合条件的记录条数：".$result['count'];
		echo "</br>正确率：";
		echo $result['rightCount']."%"."</br>";
		echoOne($list);
		break;
		case "A1B1C2": 
		$list = echoThree($A1,$B1,$C2);
		echo getAve($list);
		$result= getRightPercent($list);
		echo "</br>符合条件的记录条数：".$result['count'];
		echo "</br>正确率：";
		echo $result['rightCount']."%"."</br>";
		echoOne($list);
		break;
		case "A1B2C2": 
		$list = echoThree($A1,$B2,$C2);
		echo getAve($list);
		$result= getRightPercent($list);
		echo "</br>符合条件的记录条数：".$result['count'];
		echo "</br>正确率：";
		echo $result['rightCount']."%"."</br>";
		echoOne($list);
		break;
		case "A2B1C1": 
		$list = echoThree($A2,$B1,$C1);
		echo getAve($list);
		$result= getRightPercent($list);
		echo "</br>符合条件的记录条数：".$result['count'];
		echo "</br>正确率：";
		echo $result['rightCount']."%"."</br>";
		echoOne($list);
		break;
		case "A2B2C1": 
		$list = echoThree($A2,$B2,$C1);
		echo getAve($list);
		$result= getRightPercent($list);
		echo "</br>符合条件的记录条数：".$result['count'];
		echo "</br>正确率：";
		echo $result['rightCount']."%"."</br>";
		echoOne($list);
		break;
		case "A2B1C2": 
		$list = echoThree($A2,$B1,$C2);
		echo getAve($list);
		$result= getRightPercent($list);
		echo "</br>符合条件的记录条数：".$result['count'];
		echo "</br>正确率：";
		echo $result['rightCount']."%"."</br>";
		echoOne($list);
		break;
		case "A2B2C2": 
		$list = echoThree($A2,$B2,$C2);
		echo getAve($list);
		$result= getRightPercent($list);
		echo "</br>符合条件的记录条数：".$result['count'];
		echo "</br>正确率：";
		echo $result['rightCount']."%"."</br>";
		echoOne($list);
		break;
		default:
			echo "A1B1C1";
			echo "</bre>";
			$list = echoThree($A1,$B1,$C1);
			echo getAve($list);
			$result= getRightPercent($list);
		echo "</br>符合条件的记录条数：".$result['count'];
		echo "</br>正确率：";
		echo $result['rightCount']."%"."</br>";
		echoOne($list);
		break;
}

//end your code
$run_time->stop();
echo "Script running time:".$run_time->spent()."ms";



				//echoOne($list);
				//echoOne($B1);
			//	echo count($list)."</br>";
//				echo count($A2)."</br>";
//				echo count($B1)."</br>";
//				echo count($B2)."</br>";
//				echo count($C1)."</br>";
//				echo count($C2)."</br>";
				
?>

</div>


</body>
</html>
