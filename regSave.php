<?php
	header("Content-type:text/html;charset=utf-8");

	//一、获取用户的输入
	$stuid = $_POST['stuid'];
	$stupass = $_POST['stupass'];

	//二、处理

	//1、建立连接（搭桥）
	$conn = mysql_connect('localhost','root','root');
	if(!$conn){
		die("连接失败");
	}
	//2、选择数据库（选择目的地）
	mysql_select_db("mydb1809",$conn);

	//3、执行SQL语句（传输数据）
	//3.1 查询
	$sqlstr="select * from kaola where stuid='$stuid'";
	$result = mysql_query($sqlstr,$conn);

	if(mysql_num_rows($result)>0){
		//4、关闭数据库（过河拆桥）
		mysql_close($conn);
		
		echo "0";
	}else{
		$sqlstr="insert into kaola  values('$stuid','$stupass')";
		$result = mysql_query($sqlstr,$conn);

		//4、关闭数据库（过河拆桥）
		mysql_close($conn);

		//三、响应
		if($result==1){
			echo "1";	
		}else{
			echo "0";	
		}		
	}
?>