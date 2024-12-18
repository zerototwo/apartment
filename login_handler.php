<?php
    session_start();
    	$username=$_POST["username"];
	$_SESSION["uesrname"]=$adminuser;
	$password=$_POST["password"];
	if($username=""||$password="")
	{
      echo "<script>alert('please input something！'); history.go(-1);</script>";  
	}
	else
	{
		$link=mysqli_connect("localhost","root","123456","user_profile_db");//连接数据库
        mysqli_query($link,"set names utf8"); 
        $sql = "select username,password from user where username = '$_POST[username]' and password = '$_POST[password]'";  
		$result=mysqli_query($link,$sql);//执行sql语句
		$num=mysqli_num_rows($result);//统计影响结果行数，作为判断条件
		if($num)
		{
			echo "<script>alert('登录成功！');window.location='index.php';</script>";//登录成功页面跳转  
		}
		else
		{
			echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";  
	    }
	}
?>
