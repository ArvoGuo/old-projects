<?php require 'mysql.php';
$all= new info();
$list = array();
$list=$all->findAll();
$listSize=count($list);
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
	$size=count($list);
	echo "<table class='table table-hover tableOrder'>";
	echo "<th>姓名</th><th>性别</th><th>年龄</th><th>第二步</th><th>第四步</th><th>点击</th><th>耗时</th><th>规则</th>";
	for ($index = 0; $index < $size; $index++) {
		echo "<tr>";
		echo "<td>".$list[$index]['NAME']."</td>";
		echo "<td>".$list[$index]['SEX']."</td>";
		echo "<td>".$list[$index]['AGE']."</td>";
		echo "<td>".pic2($list[$index]['PIC2'])."</td>";
		echo "<td>".pic4($list[$index]['PIC4'])."</td>";
		echo "<td>".$list[$index]['BTN']."</td>";
		echo "<td>".$list[$index]['MS']."</td>";
		echo "<td>".rule($list[$index]['FJ'])."</td>";
		echo "</tr>";
		
	}
	echo "</table>";
}
function echoTwo($A,$B){
	$list=array();
	$Asize=count($A);
	$Bsize=count($B);
	for ($i = 0; $i < $Asize; $i++) {
		for ($j = 0; $j < $Bsize; $j++) {
			if($A[$i]['ID']==$B[$j]['ID']){
				$list[]=$A[$i];
			}
		}
		
	}
  return $list;	
}
function echoThree($A,$B,$C){
		$list=array();
		$Csize=count($C);
		$listAB=echoTwo($A,$B);
		$ABsize=count($listAB);
	for ($i = 0; $i < $ABsize; $i++) {
		for ($j = 0; $j <$Csize; $j++) {
			if($listAB[$i]['ID']==$C[$j]['ID']){
				$list[]=$listAB[$i];
			}
		}
	}
//	for ($i = 0; $i < count($A); $i++) {
//		for ($j = 0; $j < count($B); $j++) {
//			for ($index = 0; $index < count($C); $index++) {
//				if($A[$i]['ID']==$B[$j]['ID']&&$B[$j]['ID']==$C[$index]['ID']){
//					$list[]=$A[$i];
//				}
//			}
//		}
//	}
	return $list;
	
}

//A1
for ($index = 0; $index < $listSize; $index++) {
		$pic2=pic2($list[$index]['PIC2']);
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
			$A1[]=$list[$index];
		}
	}
	//A2
	for ($index = 0; $index < $listSize; $index++) {
		$pic2=pic2($list[$index]['PIC2']);
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
			$A2[]=$list[$index];
		}
	}
	//B1
		for ($index = 0; $index < $listSize; $index++) {
			$pic2=pic2($list[$index]['PIC2']);
			$pic4=pic4($list[$index]['PIC4']);
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
			$B1[]=$list[$index];
		}
	}

	//B2
		for ($index = 0; $index < $listSize; $index++) {
			$pic2=pic2($list[$index]['PIC2']);
			$pic4=pic4($list[$index]['PIC4']);
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
			$B2[]=$list[$index];
		}
	}
	
	//C1
		for ($index = 0; $index < $listSize; $index++) {
			$pic2=pic2($list[$index]['PIC2']);
			$pic4=pic4($list[$index]['PIC4']);
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
			$C1[]=$list[$index];
		}
	}
	//C2
		for ($index = 0; $index <$listSize; $index++) {
			$pic2=pic2($list[$index]['PIC2']);
			$pic4=pic4($list[$index]['PIC4']);
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
			$C2[]=$list[$index];
		}
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
								<dd ><button type="button" class="btn btn-default" id="">A1B1C1</button>
							<button type="button" class="btn btn-default" id="">A1B1C1</button>
							<button type="button" class="btn btn-default" id="">A1B1C1</button>
							<button type="button" class="btn btn-default" id="">A1B1C1</button>
							<button type="button" class="btn btn-default" id="">A1B1C1</button>
							<button type="button" class="btn btn-default" id="">A1B1C1</button>
							<button type="button" class="btn btn-default" id="">A1B1C1</button>
							<button type="button" class="btn btn-default" id="">A1B1C1</button>
							</dd>
							
							</dl>
</div>
<div id="all">
<?php  $list = echoThree($A1,$B1,$C1);echoOne($list);?>

</div>


</body>
</html>
