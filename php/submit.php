<?php 
header("Content-Type: text/html;charset=utf-8"); 

$x = $_POST['x']; 
$y = $_POST['y'];
$width = $_POST['width'];
$height = $_POST['height'];
$startTime = $_POST['startTime']; 
$endTime = $_POST['endTime']; 
$url1 = $_POST['url1']; 
$url2 = $_POST['url2']; 
$vid = $_POST['vid']; 
$interact = $_POST['interact']; 

// echo $x."<br/>";
// echo $y."<br/>";
// echo $width."<br/>";
// echo $height."<br/>";
// echo $startTime."<br/>";
// echo $endTime."<br/>";
// echo $url1."<br/>";
// echo $url2."<br/>";
// echo $vid."<br/>";
// echo $interact."<br/>";

if($startTime<$endTime){
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
	  echo "<script>
		history.go(-1);
		alert('数据库连接失败！');
		</script>";
	}else{
		$sql = "insert into test2".
			   "(x,y,width,height,startTime,endTime,url1,url2,vid,interact)".
			   "values".
			   "('$x','$y','$width','$height','$startTime','$endTime','$url1','$url2','$vid','$interact')";
		mysql_select_db( 'select' );
		$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
			  	echo "<script>
				history.go(-1);
				alert('插入数据失败！');
				</script>";
			}else{
				mysql_close($conn);
				echo "<script>
				history.go(-1);
				alert('成功插入一条数据！');
				</script>";
			}
		}
}else{
		echo "<script>
		history.go(-1);
		alert('截取开始时间不能大于截取终止时间!');
		</script>";
}
