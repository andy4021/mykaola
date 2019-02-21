<?php
	header("Content-type:text/html;charset=utf-8");

	$stuid = $_POST['stuid'];
	$stupass = $_POST['stupass'];

	//建立连接
	$conn = mysql_connect('localhost','root','root');
	if(!$conn){
		die("连接失败");
	}
	mysql_select_db("mydb1809",$conn);

	
	$sqlstr="select * from kaola where stuid='$stuid' and stupass='$stupass'";
	$result = mysql_query($sqlstr,$conn);


	if(mysql_num_rows($result)>0){
		mysql_close($conn);
		echo "1";
	}else{		
		
		$sqlstr1="select * from kaola where stuid='$stuid'";
		$result1 = mysql_query($sqlstr1,$conn);

		if(mysql_num_rows($result1)>0){
			//4、关闭数据库（过河拆桥）
			mysql_close($conn);			
			echo "2";
		}else{
			echo "0";
		}
	}


?>