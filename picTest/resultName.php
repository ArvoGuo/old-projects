<?php require 'mysql.php';


$info = new info();
$list = array();
$list = $info->findName();
//print_r($list);

?>




		<div>
			<ul>
				<?php 
						foreach ($list as $key ) {
							$name= $key['NAME'];
							echo "<li><a href='resultSort2.php?NAME=".$name."'/>".$name."</a></li>";						
						}


				?>

			</ul>

		</div>
		